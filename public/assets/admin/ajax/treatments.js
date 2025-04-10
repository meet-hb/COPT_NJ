$(document).ready(function () {
    // Global AJAX Setup
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    function getPage() {
        return $("body").attr("data-page"); // Set this in each Blade file
    }

    let page = getPage();
    // function handleShow() {
    //     $(document).ready(function () {
    //         const columns = [
    //             { data: "id", name: "id", visible: false },
    //             {
    //                 data: "no",
    //                 name: "no",
    //             },
    //             {
    //                 data: "image",
    //                 name: "image",
    //             },
    //             {
    //                 data: "treatment_name",
    //                 name: "treatment_name",
    //             },
    //             {
    //                 data: "action",
    //                 name: "action",
    //                 orderable: false,
    //                 searchable: false,
    //             },
    //         ];

    //         $("#treatment_table").DataTable({
    //             responsive: true,
    //             scrollCollapse: true,
    //             processing: true,
    //             serverSide: true,
    //             ajax: {
    //                 url: treatmentTable,
    //                 type: "POST",
    //                 error: function (xhr, status, error) {
    //                     console.error("DataTable AJAX error:", status, error);
    //                 },
    //             },
    //             columns: columns,
    //             drawCallback: function () {
    //                 console.log("DataTable redrawn");
    //             },
    //         });
    //     });
    // }
    function handleShow() {
        const table = $("#treatment_table").DataTable({
            responsive: true,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            order: [[4, "asc"]],
            ajax: {
                url: treatmentTable, // make sure this variable is globally available
                type: "POST",
                error: function (xhr, status, error) {
                    console.error("DataTable AJAX error:", status, error);
                },
            },
            columns: [
                { data: "id", name: "id", visible: false },
                { data: "no", name: "no" },
                { data: "image", name: "image" },
                { data: "treatment_name", name: "treatment_name" },
                { data: "sequence", name: "sequence" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
            rowReorder: {
                dataSrc: "no",
                update: false,
            },
            drawCallback: function () {
                console.log("DataTable redrawn");
            },
        });

        // Handle row reorder events
        table.on("row-reorder", function (e, diff, edit) {
            let positions = [];

            diff.forEach(function (change) {
                const rowData = table.row(change.node).data();
                positions.push({
                    id: rowData.id,
                    position: change.newPosition + 1,
                });
            });

            if (positions.length) {
                updatePositions(positions);
            }
        });

        function updatePositions(positions) {
            $.ajax({
                url: updateTreatmentPositionUrl, // <-- define this URL globally
                type: "POST",
                data: {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    positions: positions,
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire(
                            "Updated!",
                            "Treatment positions have been updated.",
                            "success"
                        );
                        table.ajax.reload();
                    } else {
                        Swal.fire(
                            "Error!",
                            response.message || "Unable to update positions.",
                            "error"
                        );
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire(
                        "Error!",
                        "An error occurred while updating positions.",
                        "error"
                    );
                    console.error("Update Error:", xhr.responseText);
                },
            });
        }
    }

    function handleAdd() {
        $(document).ready(function () {
            // Cache elements
            const $treatmentForm = $("#treatmentForm");
            const $submitButton = $("#submitTreatment");
            const $causesData = $("#treatment-causes-data");
            const $errorElements = {};

            // Pre-cache error elements to avoid DOM queries
            $('small[id$="_error"]').each(function () {
                $errorElements[this.id] = $(this);
            });

            // Quill editor configuration
            const editorOptions = {
                theme: "snow",
                placeholder: "Enter content...",
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ["bold", "italic", "underline"],
                        ["link", "blockquote"],
                        [{ list: "ordered" }, { list: "bullet" }],
                    ],
                },
            };

            const editors = {};
            function initializeEditors() {
                const editorIds = [
                    "description-quill",
                    "symptoms-quill",
                    "extra_information-quill",
                    "causes_summary-quill",
                    "causes_note-quill",
                ];

                let index = 0;
                function createNextEditor() {
                    if (index < editorIds.length) {
                        const editorId = editorIds[index];
                        editors[editorId.split("-")[0]] = new Quill(
                            `#${editorId}`,
                            editorOptions
                        );
                        index++;
                        requestAnimationFrame(createNextEditor);
                    }
                }
                requestAnimationFrame(createNextEditor);
            }
            initializeEditors();

            // Custom validation methods
            $.validator.addMethod("filesize", function (value, element, param) {
                return (
                    this.optional(element) || element.files[0]?.size <= param
                );
            });

            $.validator.addMethod("quillRequired", function (value, element) {
                const editor = editors[element.id.split("-")[0]];
                return editor && editor.getLength() > 1;
            });

            $.validator.addMethod("causesFilled", function (value, element) {
                const $questions = $('textarea[name="causes_question[]"]');
                if ($questions.length === 0) return true;
                return $questions
                    .toArray()
                    .every(
                        (q, i) =>
                            q.value.trim() &&
                            $('textarea[name="causes_answer[]"]')
                                .eq(i)
                                .val()
                                .trim()
                    );
            });

            // Form validation with batched DOM updates
            $treatmentForm.validate({
                ignore: [],
                rules: {
                    treatment_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 100,
                    },
                    "description-quill": { quillRequired: true },
                    "symptoms-quill": { quillRequired: true },
                    "extra_information-quill": { quillRequired: true },
                    "causes_summary-quill": { quillRequired: true },
                    "causes_note-quill": { quillRequired: true },
                    banner: {
                        required: true,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5242880,
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5242880,
                    },
                    "causes_question[]": { causesFilled: true },
                },
                messages: {
                    treatment_name: {
                        required: "Treatment name is required",
                        minlength: "Must be at least 3 characters",
                        maxlength: "Must not exceed 100 characters",
                    },
                    "description-quill": {
                        quillRequired: "Description is required",
                    },
                    "symptoms-quill": {
                        quillRequired: "Symptoms are required",
                    },
                    "extra_information-quill": {
                        quillRequired: "Extra information is required",
                    },
                    "causes_summary-quill": {
                        quillRequired: "Causes summary is required",
                    },
                    "causes_note-quill": {
                        quillRequired: "Causes note is required",
                    },
                    banner: {
                        required: "Banner image is required",
                        extension: "Only jpg, jpeg, png, gif allowed",
                        filesize: "File must not exceed 5MB",
                    },
                    image: {
                        required: "Image is required",
                        extension: "Only jpg, jpeg, png, gif allowed",
                        filesize: "File must not exceed 5MB",
                    },
                    "causes_question[]": {
                        causesFilled:
                            "All cause questions and answers must be filled",
                    },
                },
                errorElement: "small",
                errorClass: "text-danger",
                errorPlacement: function (error, element) {
                    // Batch DOM updates
                    requestAnimationFrame(() => {
                        const errorElementId = element.attr("id") + "_error";
                        $errorElements[errorElementId].html(error).show();
                    });
                },
                highlight: function (element) {
                    requestAnimationFrame(() => {
                        element.classList.add("is-invalid");
                    });
                },
                unhighlight: function (element) {
                    requestAnimationFrame(() => {
                        element.classList.remove("is-invalid");
                        $errorElements[element.id + "_error"].hide();
                    });
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    const formData = new FormData(form);

                    let causesSet = new Set(); // Store unique causes
                    let causesDescriptionSet = new Set();

                    $("input[name='causes[]']").each(function () {
                        let value = $(this).val().trim();
                        if (value && !causesSet.has(value)) {
                            causesSet.add(value);
                            formData.append("causes[]", value);
                        }
                    });

                    $("textarea[name='causes_description[]']").each(
                        function () {
                            let value = $(this).val().trim();
                            if (value && !causesDescriptionSet.has(value)) {
                                causesDescriptionSet.add(value);
                                formData.append("causes_description[]", value);
                            }
                        }
                    );

                    // Batch editor updates
                    Object.entries(editors).forEach(([key, editor]) => {
                        formData.append(key, editor.root.innerHTML);
                    });

                    $.ajax({
                        url: treatmentAddOp,
                        type: "POST",
                        data: formData,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            requestAnimationFrame(() => {
                                $submitButton
                                    .prop("disabled", true)
                                    .html(
                                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                    );
                            });
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Treatment added successfully!",
                                timer: 2000,
                                willClose: () => {
                                    requestAnimationFrame(() => {
                                        form.reset();
                                        Object.values(editors).forEach(
                                            (editor) => editor.setContents([])
                                        );
                                        $causesData.empty();
                                        $(
                                            "#treatment_name, #banner, #image"
                                        ).val("");
                                        $(
                                            'textarea[name="causes_question[]"], textarea[name="causes_answer[]"]'
                                        ).val("");
                                        window.location.href = treatmentshome;
                                    });
                                },
                            });
                        },
                        error: function (xhr) {
                            requestAnimationFrame(() => {
                                $submitButton
                                    .prop("disabled", false)
                                    .html("Submit");
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text:
                                        xhr.responseJSON?.message ||
                                        "An error occurred while adding the treatment",
                                });
                            });
                        },
                    });
                },
            });
        });
    }

    function handleEdit() {
        $(document).ready(function () {
            // Cache elements
            const $treatmentForm = $("#treatmentForm");
            const $submitButton = $("#submitTreatment");
            const $causesData = $("#treatment-causes-data");
            const $errorElements = {};

            // Pre-cache error elements to avoid DOM queries
            $('small[id$="_error"]').each(function () {
                $errorElements[this.id] = $(this);
            });

            // Quill editor configuration
            const editorOptions = {
                theme: "snow",
                placeholder: "Enter content...",
                modules: {
                    toolbar: [
                        [
                            {
                                header: [1, 2, 3, false],
                            },
                        ],
                        ["bold", "italic", "underline"],
                        ["link", "blockquote"],
                        [
                            {
                                list: "ordered",
                            },
                            {
                                list: "bullet",
                            },
                        ],
                    ],
                },
            };

            const editors = {};

            function initializeEditors() {
                const editorIds = [
                    "description-quill",
                    "symptoms-quill",
                    "extra_information-quill",
                    "causes_summary-quill",
                    "causes_note-quill",
                ];

                let index = 0;

                function createNextEditor() {
                    if (index < editorIds.length) {
                        const editorId = editorIds[index];
                        editors[editorId.split("-")[0]] = new Quill(
                            `#${editorId}`,
                            editorOptions
                        );
                        index++;
                        requestAnimationFrame(createNextEditor);
                    }
                }
                requestAnimationFrame(createNextEditor);
            }
            initializeEditors();

            // Custom validation methods
            $.validator.addMethod("filesize", function (value, element, param) {
                return (
                    this.optional(element) || element.files[0]?.size <= param
                );
            });

            $.validator.addMethod("quillRequired", function (value, element) {
                const editor = editors[element.id.split("-")[0]];
                return editor && editor.getLength() > 1;
            });

            $.validator.addMethod("causesFilled", function (value, element) {
                const $questions = $('textarea[name="causes_question[]"]');
                if ($questions.length === 0) return true;
                return $questions
                    .toArray()
                    .every(
                        (q, i) =>
                            q.value.trim() &&
                            $('textarea[name="causes_answer[]"]')
                                .eq(i)
                                .val()
                                .trim()
                    );
            });

            // Form validation with batched DOM updates
            $treatmentForm.validate({
                ignore: [],
                rules: {
                    treatment_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 100,
                    },
                    "description-quill": {
                        quillRequired: true,
                    },
                    "symptoms-quill": {
                        quillRequired: true,
                    },
                    "extra_information-quill": {
                        quillRequired: true,
                    },
                    "causes_summary-quill": {
                        quillRequired: true,
                    },
                    "causes_note-quill": {
                        quillRequired: true,
                    },
                    banner: {
                        required: false,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5242880,
                    },
                    image: {
                        required: false,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5242880,
                    },
                    "causes_question[]": {
                        causesFilled: true,
                    },
                },
                messages: {
                    treatment_name: {
                        required: "Treatment name is required",
                        minlength: "Must be at least 3 characters",
                        maxlength: "Must not exceed 100 characters",
                    },
                    "description-quill": {
                        quillRequired: "Description is required",
                    },
                    "symptoms-quill": {
                        quillRequired: "Symptoms are required",
                    },
                    "extra_information-quill": {
                        quillRequired: "Extra information is required",
                    },
                    "causes_summary-quill": {
                        quillRequired: "Causes summary is required",
                    },
                    "causes_note-quill": {
                        quillRequired: "Causes note is required",
                    },
                    banner: {
                        required: "Banner image is required",
                        extension: "Only jpg, jpeg, png, gif allowed",
                        filesize: "File must not exceed 5MB",
                    },
                    image: {
                        required: "Image is required",
                        extension: "Only jpg, jpeg, png, gif allowed",
                        filesize: "File must not exceed 5MB",
                    },
                    "causes_question[]": {
                        causesFilled:
                            "All cause questions and answers must be filled",
                    },
                },
                errorElement: "small",
                errorClass: "text-danger",
                errorPlacement: function (error, element) {
                    // Batch DOM updates
                    requestAnimationFrame(() => {
                        const errorElementId = element.attr("id") + "_error";
                        $errorElements[errorElementId].html(error).show();
                    });
                },
                highlight: function (element) {
                    requestAnimationFrame(() => {
                        element.classList.add("is-invalid");
                    });
                },
                unhighlight: function (element) {
                    requestAnimationFrame(() => {
                        element.classList.remove("is-invalid");
                        $errorElements[element.id + "_error"].hide();
                    });
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    const formData = new FormData(form);

                    // Batch editor updates
                    Object.entries(editors).forEach(([key, editor]) => {
                        formData.append(key, editor.root.innerHTML);
                    });

                    $.ajax({
                        url: treatmentEditOp,
                        type: "POST",
                        data: formData,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            requestAnimationFrame(() => {
                                $submitButton
                                    .prop("disabled", true)
                                    .html(
                                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                    );
                            });
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Treatment updated successfully!",
                                timer: 2000,
                                willClose: () => {
                                    requestAnimationFrame(() => {
                                        form.reset();
                                        Object.values(editors).forEach(
                                            (editor) => editor.setContents([])
                                        );
                                        $causesData.empty();
                                        $(
                                            "#treatment_name, #banner, #image"
                                        ).val("");
                                        $(
                                            'textarea[name="causes_question[]"], textarea[name="causes_answer[]"]'
                                        ).val("");
                                        window.location.href = treatmentshome;
                                    });
                                },
                            });
                        },
                        error: function (xhr) {
                            requestAnimationFrame(() => {
                                $submitButton
                                    .prop("disabled", false)
                                    .html("Submit");
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text:
                                        xhr.responseJSON?.message ||
                                        "An error occurred while adding the treatment",
                                });
                            });
                        },
                    });
                },
            });
        });
    }

    if (page === "show-treatment") handleShow();
    if (page === "add-treatment") handleAdd();
    if (page === "edit-treatment") handleEdit();
});

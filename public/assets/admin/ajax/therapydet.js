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

    function handleShow() {
        $(document).ready(function () {
            const columns = [
                {
                    data: "no",
                    name: "no",
                },
                {
                    data: "image",
                    name: "image",
                },
                {
                    data: "therapy_name",
                    name: "therapy_name",
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ];

            $("#therapy_table").DataTable({
                responsive: true,
                scrollCollapse: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: therapyTable,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    error: function (xhr, status, error) {
                        console.error("DataTable AJAX error:", status, error);
                    },
                },
                columns: columns,
                drawCallback: function () {
                    console.log("DataTable redrawn");
                },
            });
        });
    }

    function handleAdd() {
        $(document).ready(function () {
            const editorOptions = {
                theme: "snow",
                placeholder: "Enter content...",
            };

            const descriptionEditor = new Quill(
                "#description-quill",
                editorOptions
            );

            const extraInfoEditor = new Quill(
                "#extra-information-quill",
                editorOptions
            );
            // Custom validation methods
            $.validator.addMethod(
                "filesize",
                function (value, element, param) {
                    return (
                        this.optional(element) ||
                        element.files[0]?.size <= param
                    );
                },
                "File size must not exceed {0} bytes"
            );

            // Initialize form validation
            $("#treatmentForm").validate({
                ignore: [],
                rules: {
                    therapy_name: {
                        required: true,
                    },
                    image: {
                        required: false,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                    banner: {
                        required: true,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                },
                messages: {
                    therapy_name: {
                        required: "Please enter the treatment name",
                    },
                    image: {
                        required: "Please upload an image",
                        extension: "Allowed file types: jpg, jpeg, png, gif",
                        filesize: "Image size must not exceed 5 MB",
                    },
                    banner: {
                        required: "Please upload a banner",
                        extension: "Allowed file types: jpg, jpeg, png, gif",
                        filesize: "Banner size must not exceed 5 MB",
                    },
                },
                errorElement: "small",
                errorClass: "text-danger",
                errorPlacement: function (error, element) {
                    const errorElementId = element.attr("id") + "_error";
                    $("#" + errorElementId)
                        .html(error)
                        .show();
                },
                highlight: function (element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element) {
                    $(element).removeClass("is-invalid");
                    const errorElementId = element.id + "_error";
                    $("#" + errorElementId).hide();
                },
                submitHandler: function (form, event) {
                    event.preventDefault();

                    const formData = new FormData(form);
                    formData.append(
                        "description",
                        descriptionEditor.root.innerHTML
                    );
                    formData.append(
                        "extra_information",
                        extraInfoEditor.root.innerHTML
                    );

                    $.ajax({
                        url: therapyDetailAddOp,
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
                            $("#submitTherapy")
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                );
                        },
                        success: function (response) {
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "success",
                                title: "Success",
                                content: "Therapy added successfully!",
                            });
                            form.reset();
                            descriptionEditor.root.innerHTML = "";
                            extraInfoEditor.root.innerHTML = "";
                            $("small.text-danger").hide();
                            window.location.href = therapyDetailshome;
                        },
                        error: function (xhr, status, error) {
                            $.alert({
                                type: "error",
                                title: "Oops!",
                                content: "Invalid Information!",
                            });
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                        },
                    });
                },
            });
        });
    }

    function handleEdit() {
        $(document).ready(function () {
            const editorOptions = {
                theme: "snow",
                placeholder: "Enter content...",
            };

            const descriptionEditor = new Quill(
                "#description-quill",
                editorOptions
            );

            const extraInfoEditor = new Quill(
                "#extra-information-quill",
                editorOptions
            );
            // Custom validation methods
            $.validator.addMethod(
                "filesize",
                function (value, element, param) {
                    return (
                        this.optional(element) ||
                        element.files[0]?.size <= param
                    );
                },
                "File size must not exceed {0} bytes"
            );

            // Initialize form validation
            $("#treatmentForm").validate({
                ignore: [],
                rules: {
                    therapy_name: {
                        required: true,
                    },
                    // image: {
                    //     required: false,
                    //     extension: "jpg|jpeg|png|gif",
                    //     filesize: 5 * 1024 * 1024, // 5 MB max file size
                    // },
                    banner: {
                        required: false,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                },
                messages: {
                    therapy_name: {
                        required: "Please enter the treatment name",
                    },
                    // image: {
                    //     required: "Please upload an image",
                    //     extension: "Allowed file types: jpg, jpeg, png, gif",
                    //     filesize: "Image size must not exceed 5 MB",
                    // },
                    banner: {
                        required: "Please upload a banner",
                        extension: "Allowed file types: jpg, jpeg, png, gif",
                        filesize: "Banner size must not exceed 5 MB",
                    },
                },
                errorElement: "small",
                errorClass: "text-danger",
                errorPlacement: function (error, element) {
                    const errorElementId = element.attr("id") + "_error";
                    $("#" + errorElementId)
                        .html(error)
                        .show();
                },
                highlight: function (element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element) {
                    $(element).removeClass("is-invalid");
                    const errorElementId = element.id + "_error";
                    $("#" + errorElementId).hide();
                },
                submitHandler: function (form, event) {
                    event.preventDefault();

                    const formData = new FormData(form);
                    formData.append(
                        "description",
                        descriptionEditor.root.innerHTML
                    );
                    formData.append(
                        "extra_information",
                        extraInfoEditor.root.innerHTML
                    );

                    $.ajax({
                        url: therapyDetailEditOp,
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
                            $("#submitTherapy")
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                );
                        },
                        success: function (response) {
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "success",
                                title: "Success",
                                content: "Therapy updated successfully!",
                            });
                            form.reset();
                            descriptionEditor.root.innerHTML = "";
                            extraInfoEditor.root.innerHTML = "";
                            $("small.text-danger").hide();
                            window.location.href = therapyDetailshome;
                        },
                        error: function (xhr, status, error) {
                            $.alert({
                                type: "error",
                                title: "Oops!",
                                content: "Invalid Information!",
                            });
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                        },
                    });
                },
            });
        });
    }

    if (page === "show-therapydet") handleShow();
    if (page === "add-therapydet") handleAdd();
    if (page === "edit-therapydet") handleEdit();
});

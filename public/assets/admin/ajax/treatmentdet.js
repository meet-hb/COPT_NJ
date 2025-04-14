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
                    data: "name",
                    name: "name",
                },
                {
                    data: "type",
                    name: "type",
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ];

            $("#treatmentdet_table").DataTable({
                responsive: true,
                scrollCollapse: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: treatmentdetTable,
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

            // const extraInfoEditor = new Quill(
            //     "#extra-information-quill",
            //     editorOptions
            // );
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
                    name: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the treatment name",
                    },
                    type: {
                        required: "Please enter the Treatment Type",
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
                    // formData.append(
                    //     "extra_information",
                    //     extraInfoEditor.root.innerHTML
                    // );

                    $.ajax({
                        url: treatmentsDetailAddOp,
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
                                content: "Treatment Detail added successfully!",
                            });
                            form.reset();
                            descriptionEditor.root.innerHTML = "";
                            // extraInfoEditor.root.innerHTML = "";
                            $("small.text-danger").hide();
                            window.location.href = treatmentsDetailshome;
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

            // const extraInfoEditor = new Quill(
            //     "#extra-information-quill",
            //     editorOptions
            // );
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
                    name: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the treatment name",
                    },
                    type: {
                        required: "Please enter the Treatment Type",
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
                    // formData.append(
                    //     "extra_information",
                    //     extraInfoEditor.root.innerHTML
                    // );

                    $.ajax({
                        url: treatmentsDetailEditOp,
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
                                content: "Treatment Details updated successfully!",
                            });
                            form.reset();
                            descriptionEditor.root.innerHTML = "";
                            // extraInfoEditor.root.innerHTML = "";
                            $("small.text-danger").hide();
                            window.location.href = treatmentsDetailshome;
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

    if (page === "show-treatmentdet") handleShow();
    if (page === "add-treatmentdet") handleAdd();
    if (page === "edit-treatmentdet") handleEdit();
});

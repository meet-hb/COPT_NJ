$(document).ready(function () {
    // Global AJAX Setup
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    function getPage() {
        return $("body").attr("data-page");
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
                    data: "name",
                    name: "name",
                },
                {
                    data: "position",
                    name: "position",
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ];

            $("#team_table").DataTable({
                responsive: true,
                scrollCollapse: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: teamTable,
                    type: "POST",

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
            $("#TeamForm").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                    position: {
                        required: true,
                        minlength: 3,
                    },
                    category: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "name is required",
                        minlength: "min length 3 char",
                    },
                    image: {
                        required: "image is required",
                        extension: "jpg|jpeg|png|gif",
                        filesize: "max file size 5MB",
                    },
                    position: {
                        required: " position is required",
                        minlength: " min length 3 char",
                    },
                    category: {
                        required: " category is required",
                    },
                    description: {
                        required: " description is required",
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

                    $.ajax({
                        url: teamAddOp,
                        type: "POST",
                        data: formData,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        beforeSend: function () {
                            $("#submitTherapy")
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                );
                        },
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "success",
                                title: "Success",
                                content: "Team added successfully!",
                            });
                            form.reset();
                            $("small.text-danger").hide();
                            window.location.href = teamshome;
                        },
                        error: function (xhr, status, error) {
                            $.alert({
                                type: "error",
                                title: "Oops!",
                                content: "Invalid Information!",
                            });
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
            $("#TeamForm").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                    image: {
                        required: false,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                    position: {
                        required: true,
                        minlength: 3,
                    },
                    category: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "name is required",
                        minlength: "min length 3 char",
                    },
                    image: {
                        required: "image is required",
                        extension: "jpg|jpeg|png|gif",
                        filesize: "max file size 5MB",
                    },
                    position: {
                        required: " position is required",
                        minlength: " min length 3 char",
                    },
                    category: {
                        required: "category is required",
                    },
                    description: {
                        required: " description is required",
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

                    $.ajax({
                        url: teamEditOp,
                        type: "POST",
                        data: formData,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        beforeSend: function () {
                            $("#submitTherapy")
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                );
                        },
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "success",
                                title: "Success",
                                content: "Team Edited successfully!",
                            });
                            form.reset();
                            $("small.text-danger").hide();
                            window.location.href = teamshome;
                        },
                        error: function (xhr, status, error) {
                            $.alert({
                                type: "error",
                                title: "Oops!",
                                content: "Invalid Information!",
                            });
                        },
                    });
                },
            });
        });
    }

    if (page === "show-team") handleShow();
    if (page === "add-team") handleAdd();
    if (page === "edit-team") handleEdit();
});

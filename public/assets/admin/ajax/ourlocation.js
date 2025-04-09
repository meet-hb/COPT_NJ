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

    // function handleShow() {
    //     $(document).ready(function () {
    //         const columns = [
    //             {
    //                 data: "no",
    //                 name: "no",
    //             },
    //             {
    //                 data: "image",
    //                 name: "image",
    //             },
    //             {
    //                 data: "location_name",
    //                 name: "location_name",
    //             },
    //             {
    //                 data: "description",
    //                 name: "description",
    //             },
    //             {
    //                 data: "address",
    //                 name: "address",
    //             },
    //             {
    //                 data: "phone",
    //                 name: "phone",
    //             },
    //             {
    //                 data: "fax",
    //                 name: "fax",
    //             },
    //             {
    //                 data: "email",
    //                 name: "email",
    //             },
    //             {
    //                 data: "expertise",
    //                 name: "expertise",
    //             },
    //             {
    //                 data: "action",
    //                 name: "action",
    //                 orderable: false,
    //                 searchable: false,
    //             },
    //         ];

    //         $("#ourlocation_table").DataTable({
    //             responsive: true,
    //             scrollCollapse: true,
    //             processing: true,
    //             serverSide: true,
    //             ajax: {
    //                 url: ourlocationTable,
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
            const expertiseEditor = new Quill(
                "#extra_information-quill",
                editorOptions
            );
            const extra_information = new Quill(
                "#expertise-quill",
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
            $("#OurLocationForm").validate({
                ignore: [],
                rules: {
                    locationname: {
                        required: true,
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                    locationdetail: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        // digits: true,
                        // minlength: 10,
                        // maxlength: 10,
                    },
                    // fax: {
                    //     // required: true,
                    // },
                    email: {
                        required: true,
                    },
                    expertise: {
                        required: true,
                    },
                    extra_information: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    "other_images[]": {
                        required: true,
                        extension: "jpg|jpeg|png|gif",
                        filesize: 5 * 1024 * 1024, // 5 MB max file size
                    },
                },
                messages: {
                    locationname: {
                        required: "Locationname is required",
                    },
                    image: {
                        required: "image is required",
                        extension: "jpg|jpeg|png|gif",
                        filesize: "max file size 5MB",
                    },
                    locationdetail: {
                        required: " Location Link is required",
                    },
                    address: {
                        required: " Address is required",
                    },
                    phone: {
                        required: " Phone is required",
                    },
                    // fax: {
                    //     required: " Fax is required",
                    // },
                    email: {
                        required: " Email is required",
                    },
                    expertise: {
                        required: " Expertise is required",
                    },
                    extra_information: {
                        required: " Extra Information is required",
                    },
                    description: {
                        required: " Description is required",
                    },
                    "other_images[]": {
                        required: "image is required",
                        extension: "jpg|jpeg|png|gif",
                        filesize: "max file size 5MB",
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
                        "expertise",
                        expertiseEditor.root.innerHTML
                    );
                    formData.append(
                        "extrainformation",
                        extra_information.root.innerHTML
                    );

                    // Collect only checked business hours
                    let businessHours = {};

                    $(".bh-day-toggle:checked").each(function () {
                        let day = $(this).data("day");
                        let from = $('.bh-from[data-day="' + day + '"]').val();
                        let to = $('.bh-to[data-day="' + day + '"]').val();

                        businessHours[day] = {
                            from: from,
                            to: to,
                        };
                    });

                    formData.append(
                        "business_hours",
                        JSON.stringify(businessHours)
                    );

                    $.ajax({
                        url: ourlocationAddOp,
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
                            window.location.href = ourlocationhome;
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
            const extra_information = new Quill(
                "#extra_information-quill",
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
            $("#OurLocationForm").validate({
                ignore: [],
                rules: {
                    locationname: {
                        required: true,
                    },
                    // image: {
                    //     required: true,
                    //     extension: "jpg|jpeg|png|gif",
                    //     filesize: 5 * 1024 * 1024, // 5 MB max file size
                    // },
                    locationdetail: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        // digits: true,
                        // minlength: 10,
                        // maxlength: 10,
                    },
                    // fax: {
                    //     required: true,
                    // },
                    email: {
                        required: true,
                    },
                    expertise: {
                        required: true,
                    },
                    extra_information: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    locationname: {
                        required: "Locationname is required",
                    },
                    // image: {
                    //     required: "image is required",
                    //     extension: "jpg|jpeg|png|gif",
                    //     filesize: "max file size 5MB",
                    // },
                    locationdetail: {
                        required: " Location Link is required",
                    },
                    address: {
                        required: " Address is required",
                    },
                    phone: {
                        required: " Phone is required",
                    },
                    // fax: {
                    //     required: " Fax is required",
                    // },
                    email: {
                        required: " Email is required",
                    },
                    expertise: {
                        required: " Expertise is required",
                    },
                    extra_information: {
                        required: " Extra Information is required",
                    },
                    description: {
                        required: " Description is required",
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
                        "extrainformation",
                        extra_information.root.innerHTML
                    );
                    let businessHours = {};

                    $(".bh-day-toggle:checked").each(function () {
                        let day = $(this).data("day");
                        let from = $('.bh-from[data-day="' + day + '"]').val();
                        let to = $('.bh-to[data-day="' + day + '"]').val();

                        businessHours[day] = {
                            from: from,
                            to: to,
                        };
                    });

                    formData.append(
                        "business_hours",
                        JSON.stringify(businessHours)
                    );

                    $.ajax({
                        url: ourlocationeditOp,
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
                            window.location.href = ourlocationhome;
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

    if (page === "show-ourlocation") handleShow();
    if (page === "add-ourlocation") handleAdd();
    if (page === "edit-ourlocation") handleEdit();
});

$(document).ready(function () {
    $("#mailSettingsForm").validate({
        ignore: [],
        rules: {
            mail_from_address: {
                required: true,
                email: true,
            },
            mail_from_name: {
                required: true,
            },
            mail_to: {
                required: true,
                email: true,
            },
        },
        messages: {
            mail_from_address: {
                required: "Please enter mail from address",
                email: "Please enter valid mail from address",
            },
            mail_from_name: {
                required: "Please enter mail from name",
            },
            mail_to: {
                required: "Please enter mail to address",
                email: "Please enter valid mail to address",
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

            $.ajax({
                url: updateMailSettings,
                type: "POST",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                beforeSend: function () {
                    $("#updateSettings")
                        .prop("disabled", true)
                        .html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        );
                },
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#updateSettings")
                        .prop("disabled", false)
                        .html("Update");
                    $.alert({
                        type: "success",
                        title: "Success",
                        content: "Mail Settings Updated successfully!",
                        buttons: {
                            ok: function () {
                                window.location.reload(true);
                            }
                        }
                    });
                    form.reset();
                    $("small.text-danger").hide();
                },
                error: function (xhr, status, error) {
                    $.alert({
                        type: "error",
                        title: "Oops!",
                        content: "Something Went Wrong Try Again!",
                    });
                },
            });
        },
    });
});
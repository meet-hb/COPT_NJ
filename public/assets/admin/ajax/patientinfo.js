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
            // Ensure required variables are defined

            const editorOptions = {
                theme: "snow",
                placeholder: "Enter content...",
                // modules: {
                //     toolbar: [
                //         ["bold", "italic", "underline"],
                //         ["link", "blockquote"],
                //         [{ list: "ordered" }, { list: "bullet" }],
                //     ],
                // },
            };

            const descriptionEditor = new Quill(
                "#description-quill",
                editorOptions
            );

            $.validator.addMethod(
                "quillRequired",
                function (value, element) {
                    return descriptionEditor.getLength() > 1;
                },
                "Description is required"
            );

            $("#patientinfoForm").validate({
                ignore: [],
                rules: {
                    "description-quill": {
                        quillRequired: true,
                    },
                },
                errorPlacement: function (error, element) {
                    error.appendTo("#description_error");
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    const formData = new FormData(form);
                    formData.append(
                        "description",
                        descriptionEditor.root.innerHTML
                    );

                    $.ajax({
                        url: patientinfoDetailOp,
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
                                content:
                                    response.message ||
                                    "Data added successfully!",
                            });
                            form.reset();
                            descriptionEditor.setContents([]);
                            $("small.text-danger").hide();
                            setTimeout(() => {
                                window.location.href = patientinfoDetailshome;
                            }, 1000);
                        },
                        error: function (xhr) {
                            $("#submitTherapy")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "error",
                                title: "Error",
                                content:
                                    xhr.responseJSON?.message ||
                                    "An error occurred while submitting",
                            });
                        },
                    });
                },
            });
        });
    }

    if (page === "show-patientinfo") handleShow();
});

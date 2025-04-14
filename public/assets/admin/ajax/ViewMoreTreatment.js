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
        const table = $("#ViewMoreTreatment_table").DataTable({
            responsive: true,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            order: [[3, "asc"]],
            ajax: {
                url: ViewMoreTreatmentTable,
                type: "POST",
                error: function (xhr, status, error) {
                    console.error("DataTable AJAX error:", status, error);
                },
            },
            columns: [
                { data: "id", name: "id", visible: false },
                { data: "no", name: "no" },
                { data: "name", name: "name" },
                // { data: "sequence", name: "sequence" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
            rowReorder: {
                dataSrc: "no", // Column that acts as drag handle
                update: false, // We will handle reordering manually
            },
            drawCallback: function () {
                console.log("DataTable redrawn");
            },
        });

        // // Row reorder handler
        // table.on("row-reorder", function (e, diff, edit) {
        //     let positions = [];

        //     diff.forEach(function (change) {
        //         const rowData = table.row(change.node).data();
        //         positions.push({
        //             id: rowData.id,
        //             position: change.newPosition + 1,
        //         });
        //     });

        //     if (positions.length) {
        //         updatePositions(positions);
        //     }
        // });

        // function updatePositions(positions) {
        //     // alert('hello');
        //     $.ajax({
        //         url: updatePositionUrl, // Make sure this variable is defined globally
        //         type: "POST",
        //         data: {
        //             _token: $("meta[name='csrf-token']").attr("content"),

        //             positions: positions,
        //         },
        //         success: function (response) {
        //             if (response.success) {
        //                 Swal.fire(
        //                     "Updated!",
        //                     "ViewMoreTreatment positions have been updated.",
        //                     "success"
        //                 );
        //                 table.ajax.reload();
        //             } else {
        //                 Swal.fire(
        //                     "Error!",
        //                     response.message || "Unable to update positions.",
        //                     "error"
        //                 );
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             Swal.fire(
        //                 "Error!",
        //                 "An error occurred while updating positions.",
        //                 "error"
        //             );
        //             console.error("Update Error:", xhr.responseText);
        //         },
        //     });
        // }
    }

    function handleAdd() {
        $(document).ready(function () {
            $("#ViewMoreTreatmentForm").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the Treatment name",
                        minlength:
                            "Treatment name must be at least 3 characters long",
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
                        url: ViewMoreTreatmentAddOp,
                        type: "POST",
                        data: formData,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        beforeSend: function () {
                            $("#submitViewMoreTreatment")
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                );
                        },
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $("#submitViewMoreTreatment")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "success",
                                title: "Success",
                                content: "Treatment added successfully!",
                            });
                            form.reset();
                            $("small.text-danger").hide();
                            window.location.href = ViewMoreTreatmentshome;
                        },
                        error: function (xhr, status, error) {
                            $("#submitViewMoreTreatment")
                            .prop("disabled", false)
                            .html("Submit");
                            const response = xhr.responseJSON;

                            if (response?.error) {
                                $.alert({
                                    type: "error",
                                    title: "Oops!",
                                    content: response.error,
                                });
                            } else {
                                $.alert({
                                    type: "error",
                                    title: "Oops!",
                                    content: "Invalid Information!",
                                });
                            }
                        },
                    });
                },
            });
        });
    }

    function handleEdit() {
        $(document).ready(function () {
            // alert("hello");
            $("#ViewMoreTreatmentForm").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the treatment name",
                        minlength:
                            "Treatment name must be at least 3 characters long",
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
                        url: ViewMoreTreatmentEditOp,
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
                            $("#submitViewMoreTreatment")
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                                );
                        },
                        success: function (response) {
                            $("#submitViewMoreTreatment")
                                .prop("disabled", false)
                                .html("Submit");
                            $.alert({
                                type: "success",
                                title: "Success",
                                content: "Treatment updated successfully!",
                            });
                            form.reset();
                            $("small.text-danger").hide();
                            window.location.href = ViewMoreTreatmentshome;
                        },
                        error: function (xhr, status, error) {
                            $("#submitViewMoreTreatment")
                            .prop("disabled", false)
                            .html("Submit");
                            const response = xhr.responseJSON;

                            if (response?.error) {
                                $.alert({
                                    type: "error",
                                    title: "Oops!",
                                    content: response.error,
                                });
                            } else {
                                $.alert({
                                    type: "error",
                                    title: "Oops!",
                                    content: "Invalid Information!",
                                });
                            }
                        },
                    });
                },
            });
        });
    }

    if (page === "show-ViewMoreTreatment") handleShow();
    if (page === "add-ViewMoreTreatment") handleAdd();
    if (page === "edit-ViewMoreTreatment") handleEdit();
});

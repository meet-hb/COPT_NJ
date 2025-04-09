@section('jobs')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">

    @include('admin.assets.links')
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-page="show-jobs">
    <div class="wrapper">

        @include('admin.layout')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Jobs</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Jobs</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Jobs</h3>
                                    <a href="{{ route('admin.jobAdd') }}" class="btn btn-primary float-right">Add
                                        Jobs</a>
                                </div>

                                <div class="card-body">
                                    <table id="jobsTable" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>#</th>
                                                <th>Job Tiltle</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('admin.footer')

    </div>

    @include('admin.assets.scripts')

    <!-- DataTables and RowReorder Scripts -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var jobsTableUrl = '{{ route('admin.jobList') }}';
        var updatePositionUrl = '{{ route('admin.jobUpdatePosition') }}';
        var jobDelete = '{{ route('admin.jobDelete') }}';

        function deletejobs(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: jobDelete,
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
                                    "success"
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        $("#jobsTable")
                                            .DataTable()
                                            .ajax.reload();
                                    }
                                });
                            } else {
                                Swal.fire(
                                    "Error!",
                                    "An error occurred while deleting the therapy.",
                                    "error"
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX error:", status, error);
                        },
                    });
                }
            });
        }

        $(document).ready(function() {
            // alert('hello');
            const jobsTable = $("#jobsTable").DataTable({
                responsive: true,
                scrollCollapse: true,
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ], // Order by sequence (index 5)
                ajax: {
                    url: jobsTableUrl,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    error: function(xhr, status, error) {
                        console.error("DataTable AJAX error:", status, error);
                    },
                },
                columns: [{
                        data: "id",
                        name: "id",
                        visible: false
                    }, // Hidden id column
                    {
                        data: "no",
                        name: "no",
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false
                    },
                ],

                rowReorder: {
                    dataSrc: 'no', // Correct source
                    update: false, // Don't auto-update, we handle it
                },
                drawCallback: function() {
                    console.log("DataTable redrawn");
                },
            });

            jobsTable.on('row-reorder', function(e, diff, edit) {
                let positions = [];

                diff.forEach(function(change) {
                    let rowData = jobsTable.row(change.node).data();
                    positions.push({
                        id: rowData.id,
                        position: change.newPosition + 1
                    });
                });

                if (positions.length) {
                    updatePositions(positions);
                }
            });

            function updatePositions(positions) {
                $.ajax({
                    url: updatePositionUrl, // URL to the route handling position updates
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        positions: positions
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire("Updated!", "Job positions have been updated.", "success");
                            $("#jobsTable").DataTable().ajax.reload(); // Reload DataTable
                        } else {
                            Swal.fire("Error!", response.message || "Unable to update positions.",
                                "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire("Error!", "An error occurred while updating positions.", "error");
                        console.error("Update Error:", xhr.responseText);
                    },
                });
            }



        });
    </script>

</body>

</html>

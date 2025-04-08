@section('team')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">

    @include('admin.assets.links')
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-page="show-team">
    <div class="wrapper">

        @include('admin.layout')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Team</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Team</li>
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
                                    <h3 class="card-title">Team List</h3>
                                    <a href="{{ route('admin.teamAdd') }}" class="btn btn-primary float-right">Add
                                        Team</a>
                                </div>

                                <div class="card-body">
                                    <table id="team_table" class="table table-bordered table-striped"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Sequence</th>
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
        var teamTableUrl = '{{ route('admin.teamList') }}';
        var updatePositionUrl = '{{ route('admin.teamUpdatePosition') }}';
        var teamDelete = '{{ route('admin.teamDelete') }}';

        function deleteteam(id) {
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
                        url: teamDelete,
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
                                        $("#team_table")
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
            const teamTable = $("#team_table").DataTable({
                responsive: true,
                scrollCollapse: true,
                processing: true,
                serverSide: true,
                order: [
                    [5, 'asc']
                ], // Order by sequence (index 5)
                ajax: {
                    url: teamTableUrl,
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
                        name: "no"
                    },
                    {
                        data: "image",
                        name: "image"
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "position",
                        name: "position"
                    },
                    {
                        data: "sequence",
                        name: "sequence"
                    }, // Ensure this column exists
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

            teamTable.on('row-reorder', function(e, diff, edit) {
                let positions = [];

                diff.forEach(function(change) {
                    let rowData = teamTable.row(change.node).data();
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
                            Swal.fire("Updated!", "Team positions have been updated.", "success");
                            $("#team_table").DataTable().ajax.reload(); // Reload DataTable
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

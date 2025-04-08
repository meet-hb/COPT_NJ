@section('ourlocations')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Location</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">

    @include('admin.assets.links')
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-page="show-ourlocation">
    <div class="wrapper">

        @include('admin.layout')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Our Location</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Our Location</li>
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
                                    <h3 class="card-title">Our Location List</h3>
                                    <a href="{{ route('admin.ourlocationAdd') }}"
                                        class="btn btn-primary float-right">Add Location</a>
                                </div>

                                <div class="card-body">
                                    <table id="ourlocation_table" class="table table-bordered table-striped"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Location Name</th>
                                                <th>Description</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Fax</th>
                                                <th>Email</th>
                                                <th>Expertise</th>
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
        var ourlocationTableUrl = '{{ route('admin.ourlocationList') }}';
        var ourlocationDelete = '{{ route('admin.ourlocationDelete') }}';

        function deleteourlocation(id) {
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
                        url: ourlocationDelete,
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
                                        $("#ourlocation_table")
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
            const ourlocationTable = $("#ourlocation_table").DataTable({
                responsive: true,
                scrollCollapse: true,
                processing: true,
                serverSide: true,
                order: [
                    [5, 'asc']
                ], // Order by sequence (index 5)
                ajax: {
                    url: ourlocationTableUrl,
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
                        data: "image",
                        name: "image",
                    },
                    {
                        data: "location_name",
                        name: "location_name",
                    },
                    {
                        data: "description",
                        name: "description",
                    },
                    {
                        data: "address",
                        name: "address",
                    },
                    {
                        data: "phone",
                        name: "phone",
                    },
                    {
                        data: "fax",
                        name: "fax",
                    },
                    {
                        data: "email",
                        name: "email",
                    },
                    {
                        data: "expertise",
                        name: "expertise",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false
                    },
                ],

                drawCallback: function() {
                    console.log("DataTable redrawn");
                },
            });

        });
    </script>

</body>

</html>

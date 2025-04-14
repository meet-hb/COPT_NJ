@section('treatmentsDetails')
    active
@endsection
@section('addvmctreatments')
    active
@endsection
@php
    $vmctreatments = true;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Treatment Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/css/jquery.dataTables.min.css"
        integrity="sha256-YY1izqyhIj4W3iyJOaGWOpXDSwrHWFL4Nfk+W0LyCHE=" crossorigin="anonymous">

    @include('admin.assets.links')
</head>


<body class="hold-transition sidebar-mini layout-fixed" data-page="show-treatmentdet">
    <div class="wrapper">

        @include('admin.layout')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Treatment Details</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Treatment Details</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Treatment Details List</h3>
                                    <a href="{{ route('admin.treatmentsDetailAdd') }}"
                                        class="btn btn-primary float-right">Add
                                        Treatment Details</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="treatmentdet_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Treatment Name</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.footer')


    </div>
    <!-- ./wrapper -->

    @include('admin.assets.scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"
        integrity="sha256-3aHVku6TxTRUkkiibvwTz5k8wc7xuEr1QqTB+Oo5Q7I=" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/assets/admin/ajax/treatmentdet.js"></script>
    <script>
        var treatmentdetTable = '{{ route('admin.treatmentsDetailList') }}';
        var treatmentdetDelete = '{{ route('admin.treatmentsDetailDelete') }}';

        function deletetreatmentdetail(id) {
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
                        url: treatmentdetDelete,
                        type: "POST",
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
                                        $("#treatmentdet_table")
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
    </script>
</body>

</html>

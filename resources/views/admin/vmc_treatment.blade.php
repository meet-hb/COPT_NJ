@section('add_vmctreatments')
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

    <title>Treatment</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
    @include('admin.assets.links')
</head>


<body class="hold-transition sidebar-mini layout-fixed" data-page="show-ViewMoreTreatment">
    <div class="wrapper">

        @include('admin.layout')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Treatment</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Treatment</li>
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
                                    <h3 class="card-title">Treatment List</h3>
                                    <a href="{{ route('admin.treatmentsAdd') }}" class="btn btn-primary float-right">Add
                                        Treatment</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="ViewMoreTreatment_table" class="table table-bordered table-striped"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>#</th>
                                                <th>Name</th>
                                                {{-- <th>ViewMoreTreatment Sequence</th> --}}
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ url('/') }}/assets/admin/ajax/ViewMoreTreatment.js"></script>
    <script>
        var ViewMoreTreatmentTable = '{{ route('admin.treatmentsList') }}';
        var ViewMoreTreatmentDelete = '{{ route('admin.treatmentsDelete') }}';

        function deleteViewMoreTreatment(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this! And the related data in Treatment detail will also get deleted.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: ViewMoreTreatmentDelete,
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
                                        $("#ViewMoreTreatment_table")
                                            .DataTable()
                                            .ajax.reload();
                                    }
                                });
                            } else {
                                Swal.fire(
                                    "Error!",
                                    "An error occurred while deleting the ViewMoreTreatment.",
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

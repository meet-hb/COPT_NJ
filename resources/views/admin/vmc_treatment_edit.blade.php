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
    <title>Treatment | Edit</title>

    @include('admin.assets.links')
</head>
{{-- <style>
    .nav-link {
        width: 250px
    }

    @media (min-width: 768px) {

        .content-wrapper,
        .main-header {
            transition: margin-left .3s ease-in-out;
            margin-left: 330px !important;
        }


    }
</style> --}}

<body class="hold-transition sidebar-mini layout-fixed" data-page="edit-ViewMoreTreatment">
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
                                    <h3 class="card-title">Edit Treatment</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="ViewMoreTreatmentForm" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id"
                                            value="{{ $ViewMoreTreatment->id }}">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter Treatment Name"
                                                value="{{ $ViewMoreTreatment->name }}">
                                            <small id="name_error"></small>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" id="submitViewMoreTreatmentForm"
                                                class="btn btn-success mr-2">Submit</button>
                                            <a href="{{ route('admin.vmctreatments') }}"><button type="button"
                                                    class="btn btn-danger">Close</button></a>
                                        </div>
                                    </form>
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
    {{-- <script src="{{ url('/') }}/assets/admin/ajax/Therapys.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/additional-methods.min.js"></script>
    <script src="{{ url('/') }}/assets/admin/ajax/ViewMoreTreatment.js"></script>

    <script>
        var ViewMoreTreatmentEditOp = '{{ route('admin.treatmentsEditOp') }}';
        var ViewMoreTreatmentshome = '{{ route('admin.vmctreatments') }}';
    </script>
</body>

</html>

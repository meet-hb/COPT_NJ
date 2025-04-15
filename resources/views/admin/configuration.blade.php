@section('configuration')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration</title>


    @include('admin.assets.links')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />


    <style>
        .ql-container {
            min-height: 100px;
        }
    </style>
</head>


@php
    $config = $data->keyBy('type');
@endphp

<body class="hold-transition sidebar-mini layout-fixed" data-page="show-configuration">
    <div class="wrapper">

        @include('admin.layout')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Configuration</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Configuration</li>
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
                                    <h3 class="card-title">Configuration</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="configurationForm" enctype="multipart/form-data">
                                        <div class="form-group mb-3">

                                            <label for="websitelogo1" class="form-label">WebSite Logo 1</label>
                                            <input type="file" name="websitelogo1" id="websitelogo1" class="">
                                            <div id="image_preview_1">
                                                @if (!empty($config['websitelogo1']))
                                                    <img class="mt-2"
                                                        src="{{ Storage::url($config['websitelogo1']->image) }}"
                                                        style="width: 200px; height: 100px;">
                                                @endif
                                            </div>
                                            <small id="image_error"></small>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="websitelogo2" class="form-label">WebSite Logo 2</label>
                                            <input type="file" name="websitelogo2" id="websitelogo2" class="">
                                            <div id="image_preview_2">
                                                @if (!empty($config['websitelogo2']))
                                                    <img class="mt-2"
                                                        src="{{ Storage::url($config['websitelogo2']->image) }}"
                                                        style="width: 200px; height: 100px;">
                                                @endif
                                            </div>
                                            <small id="image_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="adminlogo" class="form-label">Admin Logo</label>
                                            <input type="file" name="adminlogo" id="adminlogo" class="">
                                            <div id="image_preview_3">
                                                @if (!empty($config['adminlogo']))
                                                    <img class="mt-2"
                                                        src="{{ Storage::url($config['adminlogo']->image) }}"
                                                        style="width: 200px; height: 100px;">
                                                @endif
                                            </div>
                                            <small id="image_error"></small>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" id="submitTherapy"
                                                class="btn btn-success mr-2">Submit</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"
        integrity="sha512-owaCKNpctt4R4oShUTTraMPFKQWG9UdWTtG6GRzBjFV4VypcFi6+M3yc4Jk85s3ioQmkYWJbUl1b2b2r41RTjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('/') }}/assets/admin/ajax/configuration.js"></script>

    <script>
        var configurationOp = '{{ route('admin.configurationOp') }}';
        var configurationshome = '{{ route('admin.configuration') }}';
    </script>
</body>

</html>

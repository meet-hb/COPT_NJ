@section('mailsettings')
    active
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mail Settings</title>


    @include('admin.assets.links')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

</head>


<body class="hold-transition sidebar-mini layout-fixed" data-page="add-ourlocation">
    <div class="wrapper">

        @include('admin.layout')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Mail Settings</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Mail Settings</li>
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
                                    <h3 class="card-title">Mail Settings</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="mailSettingsForm" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="hostname" class="form-label">Mail Host</label>
                                                <input type="text" class="form-control" name="hostname"
                                                    id="hostname" placeholder="Enter Mail Hostname"
                                                    value="{{ env('MAIL_HOST') }}" disabled>
                                                <small id="hostname_error"></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="port" class="form-label">Mail Port</label>
                                                <input type="text" class="form-control" name="port" id="port"
                                                    placeholder="Enter Mail Port" value="{{ env('MAIL_PORT') }}"
                                                    disabled>
                                                <small id="port_error"></small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="username" class="form-label">Mail Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    id="username" placeholder="Enter Mail Username"
                                                    value="{{ env('MAIL_USERNAME') }}" disabled>
                                                <small id="username_error"></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password" class="form-label">Mail Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Enter Mail Username"
                                                    value="{{ env('MAIL_PASSWORD') }}" disabled>
                                                <small id="password_error"></small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="mail_from_address" class="form-label">Mail From
                                                    Address</label>
                                                <input type="text" class="form-control" name="mail_from_address"
                                                    id="mail_from_address" placeholder="Mail From Address"
                                                    value="{{ env('MAIL_FROM_ADDRESS') }}">
                                                <small id="mail_from_address_error"></small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="mail_from_name" class="form-label">Mail From Name</label>
                                                <input type="text" class="form-control" name="mail_from_name"
                                                    id="mail_from_name" placeholder="Mail From Name"
                                                    value="{{ env('MAIL_FROM_NAME') }}">
                                                <small id="mail_from_name_error"></small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="email" class="form-label">Mail To</label>
                                                <input type="email" class="form-control" name="mail_to"
                                                    id="mail_to" placeholder="Mail to Address"
                                                    value="{{ env('MAIL_TO') }}">
                                                <small id="mail_to_error"></small>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" id="updateSettings"
                                                class="btn btn-primary mr-2"><i class="fa fa-refresh"
                                                    aria-hidden="true"></i> Update</button>
                                            <a href="{{ route('admin.therapys') }}"><button type="button"
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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"
        integrity="sha512-owaCKNpctt4R4oShUTTraMPFKQWG9UdWTtG6GRzBjFV4VypcFi6+M3yc4Jk85s3ioQmkYWJbUl1b2b2r41RTjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('/') }}/assets/admin/ajax/mailsettings.js"></script>

    {{-- <script src="{{ url('/') }}/assets/admin/ajax/Therapys.js"></script> --}}
    <script>
        const updateMailSettings = '{{ route('admin.updateMailSettings') }}';
    </script>
</body>

</html>

@section('team')
    active
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Profile</title>


    @include('admin.assets.links')

</head>


<body class="hold-transition sidebar-mini layout-fixed" data-page="add-team">
    <div class="wrapper">

        @include('admin.layout')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                                    <h3 class="card-title">Profile</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="TeamForm" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter Name" value="{{ $admin->name }}">
                                            <small id="name_error"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Contact Number</label>
                                            <input type="number" class="form-control" name="phone" id="phone"
                                                placeholder="Enter Phone Number" value="{{ $admin->phone }}">
                                            <small id="phone_error"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Enter Phone Number" value="{{ $admin->email }}">
                                            <small id="email_error"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Change Password</label>
                                            <input type="password" class="form-control" name="change_password"
                                                id="change_password" placeholder="Change your Password">
                                            <small id="change_password_error"></small>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"
        integrity="sha512-owaCKNpctt4R4oShUTTraMPFKQWG9UdWTtG6GRzBjFV4VypcFi6+M3yc4Jk85s3ioQmkYWJbUl1b2b2r41RTjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('/') }}/assets/admin/ajax/team.js"></script>

    {{-- <script src="{{ url('/') }}/assets/admin/ajax/Therapys.js"></script> --}}
    <script>
        var teamAddOp = '{{ route('admin.teamAdd') }}';
        var teamshome = '{{ route('admin.TeamDetails') }}';
    </script>
</body>

</html>

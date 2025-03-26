@section('team')
    active
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team</title>


    @include('admin.assets.links')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

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
                            <h1 class="m-0">Team</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Team</li>
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
                                    <h3 class="card-title">Add New Team</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="TeamForm" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter Name">
                                            <small id="name_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                            <small id="image_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="position" class="form-label">Category</label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="" selected disabled>Select Category</option>
                                                <option value="Physical Therapists">Physical Therapists</option>
                                                <option value="Occupational Therapist">Occupational Therapist</option>
                                                <option value="Acupuncturist">Acupuncturist</option>
                                                <option value="Administration">Administration</option>
                                            </select>
                                            <small id="category_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" class="form-control" name="position" id="position"
                                                placeholder="Enter position">
                                            <small id="position_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div id="description-quill" class="quill-editor"></div>
                                            <small id="description_error"></small>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" id="submitTherapy"
                                                    class="btn btn-success mr-2">Submit</button>
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
    <script src="{{ url('/') }}/assets/admin/ajax/team.js"></script>

    {{-- <script src="{{ url('/') }}/assets/admin/ajax/Therapys.js"></script> --}}
    <script>
        var teamAddOp = '{{ route('admin.teamAdd') }}';
        var teamshome = '{{ route('admin.TeamDetails') }}';
    </script>
</body>

</html>

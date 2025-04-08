@section('ourlocations')
    active
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Location</title>


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
                            <h1 class="m-0">Our Location</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Our Location</li>
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
                                    <h3 class="card-title">Add New Our Location</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="OurLocationForm" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="locationname" class="form-label">Location Name</label>
                                            <input type="text" class="form-control" name="locationname"
                                                id="locationname" placeholder="Enter locationname">
                                            <small id="locationname_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="locationdetail" class="form-label">Location Detail</label>
                                            <textarea name="locationdetail" id="locationdetail" class="form-control" cols="30" rows="2"
                                                placeholder="Location Detail"></textarea>
                                            {{-- <iframe id="locationdetail" name="locationdetail" class="form-control"
                                                style="height: 200px; width: 100%; border: 1px solid #ced4da;"
                                                placeholder="Enter locationdetail">
                                            </iframe> --}}

                                            <small id="locationdetail_error"></small>
                                        </div>



                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div id="description-quill" class="quill-editor"></div>
                                            <small id="description_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea name="address" id="address" class="form-control" cols="10" rows="2" placeholder="Address"></textarea>
                                            <small id="address_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" name="phone" id="phone"
                                                placeholder="Phone Number">
                                            <small id="phone_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="fax" class="form-label">Fax</label>
                                            <input type="text" class="form-control" name="fax" id="fax"
                                                placeholder="Fax">
                                            <small id="fax_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Email">
                                            <small id="email_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                            <small id="image_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="expertise" class="form-label">Expertise</label>
                                            <input type="text" class="form-control" name="expertise"
                                                id="expertise" placeholder="Expertise">
                                            {{-- <textarea name="expertise" id="expertise" class="form-control" cols="30" rows="2"></textarea> --}}
                                            <small id="expertise_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="extra_information" class="form-label">Extra
                                                Information</label>
                                            <div id="extra_information-quill" class="quill-editor"></div>
                                            <small id="extra_information_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label d-block">Business Hours</label>
                                            @php
                                                $days = [
                                                    'Sunday',
                                                    'Monday',
                                                    'Tuesday',
                                                    'Wednesday',
                                                    'Thursday',
                                                    'Friday',
                                                    'Saturday',
                                                ];
                                            @endphp
                                            @foreach ($days as $day)
                                                @php $dayKey = strtolower($day); @endphp
                                                <div class="d-flex align-items-center mb-2 business-hour-row">
                                                    <input type="checkbox" class="bh-day-toggle mr-2"
                                                        data-day="{{ $dayKey }}">
                                                    <label class="mr-2 mb-0"
                                                        style="width: 80px;">{{ $day }}</label>
                                                    <input type="time" class="form-control mr-2 bh-from"
                                                        data-day="{{ $dayKey }}" style="width: 150px;"
                                                        value="09:00">
                                                    <span class="mr-2">to</span>
                                                    <input type="time" class="form-control bh-to"
                                                        data-day="{{ $dayKey }}" style="width: 150px;"
                                                        value="17:00">
                                                </div>
                                            @endforeach
                                            <small id="business_hours_error"></small>
                                        </div>


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
    <script src="{{ url('/') }}/assets/admin/ajax/ourlocation.js"></script>

    {{-- <script src="{{ url('/') }}/assets/admin/ajax/Therapys.js"></script> --}}
    <script>
        var ourlocationAddOp = '{{ route('admin.ourlocationAddOp') }}';
        var ourlocationhome = '{{ route('admin.ourLocations') }}';
    </script>
</body>

</html>

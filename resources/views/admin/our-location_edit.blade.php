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


<body class="hold-transition sidebar-mini layout-fixed" data-page="edit-ourlocation">
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
                                    <h3 class="card-title">Edit Our Location</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="OurLocationForm" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id"
                                            value="{{ $ourlocation->id }}">
                                        <div class="form-group mb-3">
                                            <label for="locationname" class="form-label">Location Name</label>
                                            <input type="text" class="form-control" name="locationname"
                                                id="locationname" placeholder="Enter locationname"
                                                value="{{ $ourlocation->location_name }}">
                                            <small id="locationname_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="locationdetail" class="form-label">Location Detail</label>
                                            <textarea name="locationdetail" id="locationdetail" class="form-control" cols="30" rows="2"
                                                placeholder="Location Detail">{{ $ourlocation->location_details }}</textarea>
                                            <small id="locationdetail_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div id="description-quill" class="quill-editor">{!! $ourlocation->description !!}
                                            </div>
                                            <small id="description_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea name="address" id="address" class="form-control" cols="10" rows="2" placeholder="Address">{{ $ourlocation->address }}</textarea>
                                            <small id="address_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                placeholder="Phone Number" value="{{ $ourlocation->phone }}">
                                            <small id="phone_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="fax" class="form-label">Fax</label>
                                            <input type="text" class="form-control" name="fax" id="fax"
                                                placeholder="Fax" value="{{ $ourlocation->fax }}">
                                            <small id="fax_error"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Email" value="{{ $ourlocation->email }}">
                                            <small id="email_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="expertise" class="form-label">Expertise</label>
                                            <div id="expertise-quill" class="quill-editor">
                                                {!! $ourlocation->expertise !!}</div>
                                            {{-- <textarea name="expertise" id="expertise" class="form-control" cols="30" rows="2"></textarea> --}}
                                            <small id="expertise_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label d-block">Business Hours</label>
                                            @php
                                                $businessHours = json_decode($ourlocation->business_hours, true) ?? [];
                                            @endphp
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
                                                @php
                                                    $dayKey = strtolower($day);
                                                    $dayData = $businessHours[$dayKey] ?? null;
                                                    $isChecked = $dayData ? 'checked' : '';
                                                    $fromTime = $dayData['from'] ?? '09:00';
                                                    $toTime = $dayData['to'] ?? '17:00';
                                                @endphp
                                                <div class="d-flex align-items-center mb-2 business-hour-row">
                                                    <input type="checkbox" class="bh-day-toggle mr-2"
                                                        data-day="{{ $dayKey }}" {{ $isChecked }}>
                                                    <label class="mr-2 mb-0"
                                                        style="width: 80px;">{{ $day }}</label>
                                                    <input type="time" class="form-control mr-2 bh-from"
                                                        data-day="{{ $dayKey }}" style="width: 150px;"
                                                        value="{{ $fromTime }}">
                                                    <span class="mr-2">to</span>
                                                    <input type="time" class="form-control bh-to"
                                                        data-day="{{ $dayKey }}" style="width: 150px;"
                                                        value="{{ $toTime }}">
                                                </div>
                                            @endforeach
                                            <small id="business_hours_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Change Clinic Main Image</label>
                                            <input type="file" class="" name="image" id="image">
                                            <small id="image_error"></small>
                                            <div><img alt="" src="{{ Storage::url($ourlocation->images) }}"
                                                    style="width: 200px; height: 100px;"></div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="extra_information" class="form-label">Extra
                                                Information</label>
                                            <div id="extra_information-quill" class="quill-editor">
                                                {!! $ourlocation->extra_information !!}</div>
                                            <input type="hidden" name="extrainformation" id="extrainformation">
                                            <small id="extra_information_error"></small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Change Clinic Other Images (you
                                                can
                                                select multiple images)</label>
                                            <input type="file" class="" name="other_images[]"
                                                id="other_images" multiple>
                                            <small id="other_images_error"></small>
                                            @php
                                                $images = explode(',', $ourlocation->other_images);
                                            @endphp

                                            <div class="mt-2">
                                                @foreach ($images as $image)
                                                    @if ($image)
                                                        <img src="{{ Storage::url($image) }}" alt=""
                                                            style="width: 200px; height: 100px; margin: 5px;">
                                                    @endif
                                                @endforeach
                                            </div>
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
        var ourlocationeditOp = '{{ route('admin.ourlocationeditOp') }}';
        var ourlocationhome = '{{ route('admin.ourLocations') }}';
    </script>
</body>

</html>

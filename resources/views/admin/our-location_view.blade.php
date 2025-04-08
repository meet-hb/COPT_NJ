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

    <style>
        .form-group label {
            font-weight: 600;
            color: #444;
        }

        .form-group p,
        .form-group iframe,
        .form-group div {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        ul.business-hours-list {
            list-style: none;
            padding: 0;
        }

        ul.business-hours-list li {
            padding: 5px 0;
            border-bottom: 1px dashed #ccc;
        }


    </style>
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
                            {{-- <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Our Location</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <h2 class="mb-4">Location Details</h2>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Location Name:</label>
                                        <p>{{ $ourlocation->location_name }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Location Detail:</label>
                                        <iframe srcdoc="{{ htmlentities($ourlocation->location_details) }}" width="100%" height="200" style="border:1px solid #ccc;"></iframe>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Description:</label>
                                        <div>{!! $ourlocation->description !!}</div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Address:</label>
                                        <p>{{ $ourlocation->address }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Phone:</label>
                                        <p>{{ $ourlocation->phone }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Fax:</label>
                                        <p>{{ $ourlocation->fax }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Email:</label>
                                        <p>{{ $ourlocation->email }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Image:</label><br>
                                        <img src="{{ Storage::url($ourlocation->images) }}" style="width: 200px; height: 100px;">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Expertise:</label>
                                        <p>{{ $ourlocation->expertise }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Extra Information:</label>
                                        <div>{!! $ourlocation->extra_information !!}</div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Business Hours:</label>
                                        @php
                                            $businessHours = json_decode($ourlocation->business_hours, true) ?? [];
                                            $days = [
                                                'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday',
                                            ];
                                        @endphp
                                        <ul>
                                            @foreach ($days as $day)
                                                @php $key = strtolower($day); @endphp
                                                @if (isset($businessHours[$key]))
                                                    <li><strong>{{ $day }}:</strong> {{ $businessHours[$key]['from'] }} to {{ $businessHours[$key]['to'] }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.ourLocations') }}" class="btn btn-secondary">Back</a>
                                    </div>

                                </div>
                            </div> --}}

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">View Location Details</h3>
                                </div>

                                <div class="card-body">
                                    {{-- <h4 class="mb-4 text-primary">Location Information</h4> --}}

                                    <div class="form-group">
                                        <label>Location Name:</label>
                                        <p>{{ $ourlocation->location_name }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Location Detail:</label>
                                        <iframe srcdoc="{{ htmlentities($ourlocation->location_details) }}"
                                            width="100%" height="200" style="border:1px solid #ccc;"></iframe>
                                    </div>

                                    <div class="form-group">
                                        <label>Description:</label>
                                        <div>{!! $ourlocation->description !!}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Address:</label>
                                        <p>{{ $ourlocation->address }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <p>{{ $ourlocation->phone }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Fax:</label>
                                        <p>{{ $ourlocation->fax }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <p>{{ $ourlocation->email }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Image:</label><br>
                                        <img src="{{ Storage::url($ourlocation->images) }}"
                                            style="width: 250px; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    </div>

                                    <div class="form-group">
                                        <label>Expertise:</label>
                                        <p>{{ $ourlocation->expertise }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Extra Information:</label>
                                        <div>{!! $ourlocation->extra_information !!}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Business Hours:</label>
                                        @php
                                            $businessHours = json_decode($ourlocation->business_hours, true) ?? [];
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
                                        <ul class="business-hours-list">
                                            @foreach ($days as $day)
                                                @php $key = strtolower($day); @endphp
                                                @if (isset($businessHours[$key]))
                                                    <li><strong>{{ $day }}:</strong>
                                                        {{ $businessHours[$key]['from'] }} to
                                                        {{ $businessHours[$key]['to'] }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.ourLocations') }}"
                                            class="btn btn-outline-primary">Back</a>
                                    </div>

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


</body>

</html>

@extends('admin/contentLayoutMaster')
@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                    if (isset($users->id) && $users->id != 0) { ?>
                        <h4 class="card-title">Update {{ $users->firstname ?? '' }} Customer</h4>

                        <?php } else { ?>
                        <h4 class="card-title">Add new Customer</h4>
                        <?php }
                    ?>
                        <a href="{{ url('admin/customer/list') }}" class="btn btn-light me-1">
                            <span class="icon">
                                <i data-feather="arrow-left"></i>
                                Back
                            </span>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($users->id) && $users->id != 0) {
                            $url = url('/admin/customer/add/' . $users->id);
                        } else {
                            $url = url('/admin/customer/add');
                        }
                        ?>
                        <form class="form form-horizontal formSubmited validationForm" id="jquery-val-form"
                            action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-8 offset-2">
                                            <input type="text" class="form-control" id="basic-default-name"
                                                name="fullname" value="{{ $users->firstname ?? '' }}"
                                                placeholder="Enter Firstname" />

                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <input type="text" class="form-control" name="username"
                                                value="{{ $users->lastname ?? '' }}" placeholder="Enter Lastname" />

                                        </div>
                                        <?php
                                    if (isset($users->id) && $users->id != 0) { ?>

                                        <?php } else { ?>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ $users->email ?? '' }}" placeholder="Enter Email" />
                                            @error('email')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <?php }
                                    ?>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <input type="number" class="form-control" name="contact"
                                                value="{{ $users->contact ?? '' }}" placeholder="Enter Contact Number" />

                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <input type="date" class="form-control" name="dob"
                                                value="{{ $users->dob ?? '' }}" placeholder="Enter Dob " />

                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <?php
                                        if(isset($users->id) && $users->id !=0){?>
                                            <input type="file" name="photo" data-show-Remove="false"
                                                data-default-file="{{ asset('uploads/seller-profile/' . $users->image) ?? '' }}"
                                                class="dropify" placeholder="">
                                            <?php
                                        }else{?>
                                            <input type="file" name="photo" data-show-Remove="false"
                                                id="input-file-to-destroy"
                                                data-default-file="{{ asset('images/bcstart_right_image.jpg') }}"
                                                class="dropify" placeholder="">
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <?php
                                    if (isset($users->id) && $users->id != 0) { ?>
                                        <?php } else { ?>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <input type="text" class="form-control" name="password"
                                                value="{{ $users->password ?? '' }}" placeholder="Enter Password" />

                                        </div>
                                        <?php }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-sm-8 offset-sm-5">
                                    <?php
                                if (isset($users->id) && $users->id != 0) {?>
                                    <button type="submit" class="btn btn-success me-1 submit_button">Update</button>
                                    <?php  } else {?>
                                    <button type="submit" class="btn btn-success me-1 submit_button">Submit</button>
                                    <?php }
                                ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Horizontal form layout section end -->
    <!-- Dropzone section start -->
    <!-- <section id="dropzone-examples">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button id="clear-dropzone" class="btn btn-outline-primary mb-1">
                            <i data-feather="trash" class="me-25"></i>
                            <span class="align-middle">Clear Dropzone</span>
                        </button>
                        <form action="#" class="dropzone dropzone-area" id="dpz-remove-all-thumb">
                            <div class="dz-message">Drop files here or click to upload.</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Dropzone section end -->
@endsection

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
@endsection
@section('js')
    @include('admin.layouts.templatejquery')
    <script src="{{ URL::asset('js/scripts/theamjquery/users/jquery.js') }}"></script>
@endsection

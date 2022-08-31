@extends('admin/contentLayoutMaster')
@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                    if (isset($record->id) && $record->id != 0) { ?>
                        <h4 class="card-title">Update Collection</h4>

                        <?php } else { ?>
                        <h4 class="card-title">
                            Create Collection</h4>
                        <?php }
                    ?>
                        <a href="{{ url('admin/collection/list') }}" class="btn btn-light me-1">
                            <span class="icon">
                                <i data-feather="arrow-left"></i>
                                Back
                            </span>
                        </a>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($record->id) && $record->id != 0) {
                            $url = url('/admin/collection/update/' . $record->id);
                        } else {
                            $url = url('/admin/collection/add');
                        }
                        ?>
                        <form class="form form-horizontal formSubmited validationForm" id="jquery-val-form"
                            action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-8 offset-2">
                                            <label for="">Collection Name</label>
                                            <input type="text" class="form-control" id="title" name="name"
                                                value="{{ $record->name ?? '' }}" placeholder="Enter Collection Name" />
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Short Description</label>
                                            <textarea class="form-control notrequired" placeholder="Short Description" name="detail" rows="3"
                                                spellcheck="false">{{ $record->detail ?? '' }}</textarea>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Categories</label>
                                            @if (isset($record->id) && $record->id != 0)
                                                <select class="form-select" id="basicSelect" name="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $record->category_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="form-select" id="basicSelect" name="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $data)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Customers</label>
                                            @if (isset($record->id) && $record->id != 0)
                                                <select class="form-select" id="basicSelect" name="customer_id">
                                                    <option value="">Select User</option>
                                                    @foreach ($customer as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $record->customer_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->firstname }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="form-select" id="basicSelect" name="customer_id">
                                                    <option value="">Select User</option>
                                                    @foreach ($customer as $data)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->firstname }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <?php
                                        if (isset($record->id) && $record->id != 0) { ?>
                                            <label for="">Logo image</label>
                                            <input type="file" name="image" data-show-Remove="false"
                                                data-default-file="{{ asset('images/collection/logo/' . $record->image) ?? '' }}"
                                                class="dropify" placeholder="">
                                            <?php
                                        } else { ?>
                                            <label for="">Logo image</label>
                                            <input type="file" name="image" data-show-Remove="false"
                                                id="input-file-to-destroy"
                                                data-default-file="{{ asset('images/bcstart_right_image.jpg') }}"
                                                class="dropify" placeholder="">
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <?php
                                        if (isset($record->id) && $record->id != 0) { ?>
                                            <label for="">Banner image</label>
                                            <input type="file" name="banner_image" data-show-Remove="false"
                                                data-default-file="{{ asset('images/collection/banners/' . $record->banner_image) ?? '' }}"
                                                class="dropify" placeholder="">
                                            <?php
                                        } else { ?>
                                            <label for="">Banner image</label>
                                            <input type="file" name="banner_image" data-show-Remove="false"
                                                id="input-file-to-destroy"
                                                data-default-file="{{ asset('images/bcstart_right_image.jpg') }}"
                                                class="dropify" placeholder="">
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="col-sm-8 offset-sm-5 mt-1">
                                            <?php
                                        if (isset($record->id) && $record->id != 0) { ?>
                                            <button type="submit"
                                                class="btn btn-success me-1 submit_button">Update</button>
                                            <?php  } else { ?>
                                            <button type="submit"
                                                class="btn btn-success me-1 submit_button">Submit</button>
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
    @include('admin.layouts.tinymce-js')
    @include('admin.layouts.templatejquery')
    <script src="{{ URL::asset('js/scripts/theamjquery/collection/jquery.js') }}"></script>
@endsection

@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <?php
                    if (isset($blog->id) && $blog->id != 0) { ?>
                        <h4 class="card-title">Update Blogs</h4>

                    <?php } else { ?>
                        <h4 class="card-title">
                            Create Blog</h4>
                    <?php }
                    ?>
                    <a href="{{url('admin/blog/list')}}" class="btn btn-light me-1">
                        <span class="icon">
                            <i data-feather="arrow-left"></i>
                            Back
                        </span>
                    </a>
                    </a>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($blog->id) && $blog->id != 0) {
                        $url = url('/admin/blog/update/'.$blog->id);
                    } else {
                        $url = url('/admin/blog/add');
                    }
                    ?>
                    <form class="form form-horizontal formSubmited validationForm" id="jquery-val-form" action="{{ url($url)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-8 offset-2">
                                        <label for="">Page Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title ?? '' }}" placeholder="Enter page title" />
                                    </div>
                                    <div class="col-sm-8 offset-2 mt-1">
                                        <label for="">Created by</label>
                                        <input type="text" class="form-control" id="title" name="created_by" value="{{ Auth::user()->fullname }}" />
                                    </div>
                                    <div class="col-sm-8 offset-2 mt-1">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control notrequired" placeholder="Short Description" name="detail" rows="3" spellcheck="false">{{ $blog->detail ?? '' }}</textarea>
                                    </div>
                                   <div class="col-sm-8 offset-2 mt-1">
                                        <?php
                                        if (isset($blog->id) && $blog->id != 0) { ?>
                                            <input type="file" name="image" data-show-Remove="false" data-default-file="{{ asset('images/blog/'.$blog->image) ?? ''}}" class="dropify" placeholder="">
                                        <?php
                                        } else { ?>
                                            <input type="file" name="image" data-show-Remove="false" id="input-file-to-destroy" data-default-file="{{asset('images/bcstart_right_image.jpg')}}" class="dropify" placeholder="">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-sm-8 offset-sm-5 mt-1">
                                        <?php
                                        if (isset($blog->id) && $blog->id != 0) { ?>
                                            <button type="submit" class="btn btn-success me-1 submit_button">Update</button>
                                        <?php  } else { ?>
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
<script src="{{ URL::asset('js/scripts/theamjquery/blog/jquery.js') }}"></script>
@endsection

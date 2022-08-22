@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <?php
                    if (isset($webpages->id) && $webpages->id != 0) { ?>
                        <h4 class="card-title">Update {{$users->username ?? ''}} Webpages</h4>

                    <?php } else { ?>
                        <h4 class="card-title">
                            Create Webpages</h4>
                    <?php }
                    ?>
                    <a href="{{url('admin/webpage')}}" class="btn btn-light me-1">
                        <span class="icon">
                            <i data-feather="arrow-left"></i>
                            Back
                        </span>
                    </a>
                    </a>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($webpages->id) && $webpages->id != 0) {
                        $url = url('/admin/web/add/'.$webpages->id);
                    } else {
                        $url = url('/admin/web/add');
                    }
                    ?>
                    <form class="form form-horizontal formSubmited validationForm" id="jquery-val-form" action="{{ url($url)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-5 offset-1">
                                        <?php
                                        if (isset($webpages->id) && $webpages->id != 0) {
                                            $value = $webpages->page_title ?? '';
                                        } else {
                                            $value = old('name');
                                        }
                                        ?>
                                        <label for="">Page Title</label>
                                        <input type="text" class="form-control" id="title" name="page_title" value="{{$value}}" placeholder="Enter page title" />
                                    </div>
                                    <!-- <div class="col-sm-5 offset-1 mt-1">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" placeholder="Enter meta-title" value="{{$webpages->meta_title ?? ''}}" />

                                    </div>
                                    <div class="col-sm-5  mt-1">
                                        <label for="">Head Title</label>
                                        <input type="text" class="form-control " value="{{$webpages->head_title ?? ''}}" id="basic-default-name" name="head_title" placeholder="Enter head-title" />
                                    </div>
                                    <div class="col-sm-5 offset-1 mt-1">
                                        <label for="">Page priority</label>
                                        <select name="page_priority" id="page_rank" class="form-control custom-select select2 notrequired">
                                            @for ($i = 0; $i <= 50; $i++) <option value="{{ $i }}" <?php if (($webpages->page_priority ?? '') == $i) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>
                                                {{ $i }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-5 mt-1">
                                        <label for="">Meta Keyword</label>
                                        <input type="text" class="form-control" id="basic-default-name" name="meta_keyword" value="{{$webpages->meta_keyword ?? ''}}" placeholder="Enter meta-keyword" />
                                    </div>
                                    <div class="col-sm-5 offset-1 mt-1">
                                        <label for="">Meta Description</label>
                                        <input type="text" class="form-control" id="basic-default-name" name="meta_desc" value="{{$webpages->meta_desc ?? ''}}" placeholder="Enter meta-des" />
                                    </div>
                                    <div class="col-sm-5 mt-1">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control notrequired" placeholder="Short Description" name="short_desc" rows="3" spellcheck="false">{{ $webpages->short_desc ?? '' }}</textarea>
                                    </div> -->
                                    <div class="col-sm-10 offset-1 mt-1">
                                        <label for="">Page Content</label>
                                        <textarea class="ckeditor form-control notrequired" placeholder="Add Content" name="page_content" rows="3" spellcheck="false">{{ $webpages->page_content ?? '' }}</textarea>
                                    </div>
                                    <!-- <div class="col-sm-10 offset-1 mt-1">
                                        <?php
                                        if (isset($webpages->id) && $webpages->id != 0) { ?>
                                            <input type="file" name="image" data-show-Remove="false" data-default-file="{{ asset('webpages/images/'.$webpages->image) ?? ''}}" class="dropify" placeholder="">
                                        <?php
                                        } else { ?>
                                            <input type="file" name="image" data-show-Remove="false" id="input-file-to-destroy" data-default-file="{{asset('images/bcstart_right_image.jpg')}}" class="dropify" placeholder="">
                                        <?php
                                        }
                                        ?>
                                    </div> -->
                                    <div class="col-sm-8 offset-sm-5 mt-1">
                                        <?php
                                        if (isset($webpages->id) && $webpages->id != 0) { ?>
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
<script src="{{ URL::asset('js/scripts/theamjquery/webpages/jquery.js') }}"></script>
@endsection
@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Update GeneralSetting</h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal formSubmited validationForm" action="{{ url('admin/submit-generalsetting')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-6 mt-1">
                    <h3 class="success">Header-Logo</h3>
                  </div>
                  <div class="col-sm-6 mt-1">
                    <h3 class="success">Footer-detail</h3>
                  </div>
                  <div class="col-sm-6 mt-1">
                    <?php
                    if (isset($data->id) && $data->id != 0) { ?>
                      <input type="file" name="header_logo" data-show-Remove="false" data-default-file="{{ asset('setting/header/'.$data->header_logo) ?? ''}}" class="dropify" placeholder="">
                    <?php
                    } else { ?>
                      <input type="file" name="header_logo" data-show-Remove="false" id="input-file-to-destroy" data-default-file="{{asset('images/bcstart_right_image.jpg')}}" class="dropify" placeholder="">
                    <?php
                    }
                    ?>
                  </div>
                  <div class="col-sm-6 mt-1">
                    <textarea class="form-control notrequired" placeholder="Short Description" name="footer_detail" rows="3" spellcheck="false">{{ $data->footer_detail ?? '' }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-8 offset-sm-5">
                <button type="submit" class="btn btn-success me-1 submit_button">Update</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Basic Horizontal form layout section end -->
@endsection
@section('js')
<!-- Page js files -->
@include('admin.layouts.templatejquery')
<script src="{{ asset('js/scripts/theamjquery/generalsetting/jquery.js') }}"></script>
@endsection
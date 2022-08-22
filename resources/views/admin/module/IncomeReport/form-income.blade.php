@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
              <div class="card-header">
                    <h4 class="card-title">Add new Income Report</h4>
                <a href="{{url('admin/IncomeReport/list')}}" class="btn btn-light me-1">
                    <span class="icon">
                        <i data-feather="arrow-left"></i>
                        Back
                    </span>
                </a>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" action="/admin/income/add" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                  <div class="mb-1 row">
                                    <div class="col-md-8 offset-2 mt-1">
                                            <label for="">Date</label>
                                            <input type="date" class="form-control" name="month" placeholder="Enter Loss" />
                                    </div>
                                    <div class="col-md-8 offset-2 mt-1">
                                        <label for="">Card No</label>
                                        <input type="number" class="form-control" name="no_card_sell"  placeholder="Enter Card" />
                                    </div>
                                    <div class="col-md-8 offset-2 mt-1">
                                        <label for="">Revenue</label>
                                        <input type="number" class="form-control" name="revenue" placeholder="Enter Expenses"/>
                                    </div>
                                    <div class="col-md-8 offset-2 mt-1">
                                        <label for="">Expences</label>
                                        <input type="number" class="form-control" name="expences"   placeholder="Enter Expences"  />
                                    </div>
                                   </div>
                                    <div class="col-md-6 offset-5  mt-1">
                                        <button type="submit" class="btn btn-success me-1">Submit</button>
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

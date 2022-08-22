@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                <?php
                    if (isset($clients->id) && $clients->id != 0) { ?>
                        <h4 class="card-title">Update {{$clients->client_name ?? ''}} Details</h4>

                    <?php } else { ?>
                        <h4 class="card-title">Add new Client</h4>
                    <?php }
                    ?>
                    <a href="{{url('admin/goldclient/list')}}" class="btn btn-light me-1">
                        <span class="icon">
                            <i data-feather="arrow-left"></i>
                            Back
                        </span>
                    </a>
                </div>
                <div class="card-body">
                <?php
                    if (isset($clients->id) && $clients->id != 0) {
                        $url = url('/admin/client/add/'.$clients->id);
                    } else {
                        $url = url('/admin/client/add');
                    }
                    ?>
                    <form class="form form-horizontal formSubmited validationForm" action="{{ url($url)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                   <div class="mb-1 row">
                                        <div class="col-md-5 offset-1">
                                            <label for="">Client Name</label>
                                            <input type="text" class="form-control"  id="basic-default-name" name="client_name" value="{{$clients->client_name ?? ''}}" placeholder="Client Name" />
                                        </div>
                                        <div class="col-md-5">
                                            <label for="">Contact</label>
                                            <input type="text" class="form-control" name="contact" 
                                            placeholder="Contact" value="{{$clients->contact ?? ''}}"  />
                                        </div>
                                   </div>
                                   <div class="mb-1 row">
                                        <div class="col-md-5 offset-1">
                                            <label for="">Date</label>
                                        <input type="date" class="form-control" name="order_date"   value="{{$clients->order_date ?? ''}}"placeholder="Order Date" /> 
                                        </div>
                                        <div class="col-md-5">
                                            <label for="">No of Orders</label>
                                            <input type="text" id="email" class="form-control" name="no_of_orders" value="{{$clients->no_of_orders ?? ''}}" placeholder="No of Orders"/>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                         <div class="col-md-5 offset-1">
                                             <label for="">Payment</label>
                                              <input type="text" class="form-control" name="orders_payment"   
                                             value="{{$clients->orders_payment ?? ''}}"placeholder="$ Payment" />
                                         </div>
                                         <div class="col-md-5">
                                             <label for="">City</label>
                                             <input type="text" class="form-control" name="city"
                                              value="{{$clients->city ?? ''}}" placeholder="City"/>
                                         </div>
                                    </div>
                                   <div class="mb-1 row">
                                   <div class="col-md-10 offset-1 mt-1">
                                        <?php
                                        if (isset($clients->id) && $clients->id != 0) { ?>
                                            <input type="file" name="image" data-show-Remove="false" data-default-file="{{ asset('clients/images/'.$clients->image) ?? ''}}" class="dropify" placeholder="">
                                        <?php
                                        } else { ?>
                                            <input type="file" name="image" data-show-Remove="false" id="input-file-to-destroy" data-default-file="{{asset('images/bcstart_right_image.jpg')}}" class="dropify" placeholder="">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                   </div>
                                    <div class="col-sm-8 offset-sm-5 mt-1">
                                        <?php
                                        if (isset($clients->id) && $clients->id != 0) { ?>
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
    <script src="{{ URL::asset('js/scripts/theamjquery/goldclient/jquery.js') }}"></script>
@endsection

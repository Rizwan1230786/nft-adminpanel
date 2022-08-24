@extends('admin/contentLayoutMaster')
@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Application Setting</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal formSubmited validationForm"
                            action="{{ url('admin/submit-generalsetting') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-8 offset-2">
                                            <label for="">Application Title <span
                                                    style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="application_title" value="{{ $data->application_title ?? '' }}" placeholder="Application Title">
                                        </div>
                                        <div class="col-sm-8 offset-2">
                                            <label for="">Address <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ $data->address ?? '' }}" name="address" placeholder="Address">
                                        </div>
                                        <div class="col-sm-8 offset-2">
                                            <label for="">Email Address <span style="color: red;">*</span></label>
                                            <input type="email" class="form-control" value="{{ $data->email_address ?? '' }}" name="email_address" placeholder="Email Address">
                                        </div>
                                        <div class="col-sm-8 offset-2">
                                            <label for="">Phone <span style="color: red;">*</span></label>
                                            <input type="number" class="form-control" value="{{ $data->contact ?? '' }}" name="contact" placeholder="Phone">
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Favicon <span style="color: red;">*</span></label>
                                            @if(isset($data->id) && !empty($data->id))
                                            <img src="{{ asset('setting/header/' . $data->favicon_image) ?? '' }}"
                                            alt="" class="img img-thumbnail mb-1">
                                            @endif
                                            <input type="file" class="form-control" name="favicon_image">
                                            <div class="text-danger">32x32 px(jpg, jpeg, png, gif, ico)</div>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Dashboard logo <span style="color: red;">*</span></label>
                                            @if(isset($data->id) && !empty($data->id))
                                            <img src="{{ asset('setting/header/' . $data->header_logo) ?? '' }}"
                                            alt="" class="img img-thumbnail mb-1">
                                            @endif
                                            <input type="file" name="header_logo" class="form-control">
                                            <div class="text-danger">184x42 px(jpg, jpeg, png, gif, ico)</div>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Website Logo <span style="color: red;">*</span></label>
                                            @if(isset($data->id) && !empty($data->id))
                                            <img src="{{ asset('setting/header/' . $data->website_logo) ?? '' }}"
                                            alt="" class="img img-thumbnail mb-1">
                                            @endif
                                            <input type="file" name="website_logo" class="form-control">
                                            <div class="text-danger">163x50 px(jpg, jpeg, png, gif, ico)</div>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Header Bg image <span style="color: red;">*</span></label>
                                            @if(isset($data->id) && !empty($data->id))
                                            <img src="{{ asset('setting/header/' . $data->header_bg_img) ?? '' }}"
                                            alt="" width="200" class="img img-thumbnail mb-1">
                                            @endif
                                            <input type="file" name="header_bg_img" class="form-control">
                                            <div class="text-danger">1968x462 px (jpg, png)</div>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Footer Bg image <span style="color: red;">*</span></label>
                                            @if(isset($data->id) && !empty($data->id))
                                            <img src="{{ asset('setting/header/' . $data->footer_bg_img) ?? '' }}"
                                            alt="" width="200" class="img img-thumbnail mb-1">
                                            @endif
                                            <input type="file" name="footer_bg_img" class="form-control">
                                            <div class="text-danger">1920x900 px (jpg, png)</div>
                                        </div>
                                        <div class="col-sm-8 offset-2 mt-1">
                                            <label for="">Dashboard footer text <span style="color: red;">*</span></label>
                                            <textarea class="form-control notrequired" placeholder="Short Description" name="footer_detail" rows="3"
                                                spellcheck="false">{{ $data->footer_detail ?? '' }}</textarea>
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

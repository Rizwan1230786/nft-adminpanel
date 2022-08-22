@extends('admin/fullLayoutMaster')

@section('title', 'Allset Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Login basic -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
          <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
            <defs>
              <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                <stop stop-color="#000000" offset="0%"></stop>
                <stop stop-color="#FFFFFF" offset="100%"></stop>
              </lineargradient>
              <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                <stop stop-color="#FFFFFF" offset="100%"></stop>
              </lineargradient>
            </defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                <g id="Group" transform="translate(400.000000, 178.000000)">
                  <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></
                </g>
              </g>
            </g>
          </svg>
          <h2 class="brand-text success ms-1">Allset</h2>
        </a>
        <h4 class="card-title mb-1">Welcome to Allset! 👋</h4>
        <p class="card-text mb-2">Please Sign-in to your Account!
        </p>

        <form class="auth-login-form mt-2 validationForm" action="javascript:void(0)" method="post">
          @csrf
          <div class="mb-1">
            <label for="login-email" class="form-label">Email</label>
            <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" value="{{ old('email') }}" tabindex="1" autofocus />
            @error('email')
                <div class="error">Email Required</div>
            @enderror
          </div>
          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input name="password" type="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder=" " aria-describedby="login-password" />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
             @error('password')
               <div class="text-danger">Password Required</div>
              @enderror
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
              <label class="form-check-label" for="remember-me">Remember Me </label>
            </div>
          </div>
          <button class="btn btn-success w-100 submit_button" tabindex="4">Sign in</button>
        </form>
      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
<!-- BEGIN: Vendor CSS-->
@if ($configData['direction'] === 'rtl' && isset($configData['direction']))
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors-rtl.min.css')) }}" />
@else
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
@endif

@yield('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/themes/dark-layout.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/themes/bordered-layout.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/themes/semi-dark-layout.css')) }}" />
@php $configData = Helper::applClasses(); @endphp
<!-- BEGIN: Page CSS-->
@if ($configData['mainLayoutType'] === 'horizontal')
  <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/horizontal-menu.css')) }}" />
@else
  <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" />
@endif
{{-- Page Styles --}}
@yield('page-style')
<!-- laravel style -->
<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />
<!-- BEGIN: Custom CSS-->
@if ($configData['direction'] === 'rtl' && isset($configData['direction']))
  <link rel="stylesheet" href="{{ asset(mix('css-rtl/custom-rtl.css')) }}" />
  <link rel="stylesheet" href="{{ asset(mix('css-rtl/style-rtl.css')) }}" />
@else
  {{-- user custom styles --}}
  <link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />
@endif
<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<link href="{{URL::asset('css/toastr.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('css/fontawesome.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">

<!-- Jquery js-->
<script src="{{URL::asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{URL::asset('js/toastr.min.js')}}"></script>
<!-- Latest compiled and minified CSS -->
<style>
	body{
		overflow-x:hidden;
	}
  .success{
    color: #74dc47 !important;
  }
  .dropdown-menu-end a:hover{
    color: #FFF !important;
    background-image: linear-gradient(100deg, var(--primary-color) 10%, var(--secondary-color));
  border-color: var(--secondary-color);
  }
  /* canves chart */
  .animations{
    animation: moving-bars 20s linear infinite;
  }
  /* end */
  #animations-example-3 {
  height: 200px;
  max-width: 300px;
  margin: 0 auto;
}
#animations-example-3 tbody {
  overflow-y: hidden; /* remove this to see how it works */
}
#animations-example-3 tbody th {
  background-color: #fff;
  z-index: 1;
}
#animations-example-3 tbody td {
  animation: moving-bars 20s linear infinite;
}
@keyframes moving-bars {
  0%  { transform: translateY( 100% ); }
  15% { transform: translateY( 0 ); }
}
.bx--graph-header {
	font-weight: 300;
	font-size: 24px;
}

.overlay {
	fill: #3d70b2;
	opacity: .1;
	display: none;
	pointer-events: none;
}

.line {
	stroke-width: 2;
	stroke: #FF00FF;
	fill: none;
	pointer-events: none;
}

.axis path {
	stroke: #5A6872;
}

.tick line {
	stroke: #5A6872;
}

.tick text {
	fill: #5A6872;
}

.graph-container {
	position: relative;
}

.tooltip {
	font-weight: 700;
	padding-left: 1rem 2rem;
	background-color: #fff;
	position: absolute;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .1);
	border: 1px solid #DFE3E6;
	padding: .25rem .5rem;
	pointer-events: none;
	display: none;

	&:after {
		content: '';
		top: 100%;
		left: 50%;
		transform: translateX(-50%);
		position: absolute;
		width: 0;
		height: 0;
		border-left: 5px solid transparent;
		border-right: 5px solid transparent;
		border-top: 5px solid #fff;
	}
}
.y path {
	display: none;
}
.label {
	font-size: 10px;
	font-weight: 700;
	fill: #5A6872;
	text-anchor: middle;
}
</style>

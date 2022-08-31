<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script src="{{URL::asset('js/all.min.js')}}"></script>
<script src="{{URL::asset('js/fontawesome.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
@yield('js')
<!-- toster code -->
<!-- @if(Session::has('message'))
<script>
    toastr.options = {
        "closeButton": false,
        "progressBar": false,
        "showDuration": "5000",
        "hideDuration": "5000",
        "timeOut": "6000",
        "showEasing": "swing",
        "hideEasing": "linear",
    }
    toastr.success("{{ session('message') }}");
</script>
@endif
@if(Session::has('error'))
<script>
    toastr.options = {
        "closeButton": false,
        "progressBar": false,
        "showDuration": "2000",
        "hideDuration": "2000",
        "timeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
    }
    toastr.error("{{ session('error') }}");
</script>
@endif -->
<!-- end toster code -->
<!-- dropyfy -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.dropify').dropify();
    });
</script>
{{-- <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
        label: 'Earning',
        data: [12, 19, 3, 17, 28, 24, 7],
        backgroundColor: "rgba(153,255,51,1)"
        }, {
        label: 'Expense',
        data: [25, 26, 5, 5, 20, 3, 10],
        backgroundColor: "rgba(255,153,0,1)"
        }]
    }
});
</script> --}}
<!-- end -->

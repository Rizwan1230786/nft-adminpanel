<?php
use App\Models\GeneralSetting;
$footer = GeneralSetting::select('footer_detail')->where('id', 1)->first();
?>
<!-- BEGIN: Footer-->
<footer class="footer footer-light {{($configData['footerType'] === 'footer-hidden') ? 'd-none':''}} {{$configData['footerType']}}">
  <p class="clearfix mb-0">
    <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>
      <a class="ms-25" href="" target="_blank">{{ $footer->footer_detail ?? '' }}</a>,
    </span>
  </p>
</footer>
<!-- END: Footer-->

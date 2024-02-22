<!-- Head -->
@include('../profile/head_layout')
<!-- End of Head -->

<!--close-top-Header-menu-->

<!--sidebar-menu-->
@include('../profile/sidebar')
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a title="You're right here" class="tip-bottom"><i class="icon-home"></i> @yield('breadcumb')</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    @yield('content')
  </div><!-- End of container-fluid -->
</div><!-- End of content-ID -->

<!--end-main-container-part-->

<!--Footer-part-->
@include('../profile/footer_layout')
<!--Footer-part-->

</body>
</html>

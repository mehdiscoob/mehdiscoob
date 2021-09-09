<!DOCTYPE html>
<html dir="rtl" lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>پولو ادمین</title>
    <link rel="shortcut icon" href="{{asset("dist")}}/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{asset("dist")}}/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset("dist")}}/vendors/flags-icon/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/vendors/flag-select/css/flags.css">
    <link rel="stylesheet" href="{{asset("dist")}}/css/main.css">
    <link rel="stylesheet" href="{{asset("dist")}}/css/toastr.min.css">
    @toastr_css
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
@yield("pagecss")

    <!-- END: Page CSS-->

</head>
<!-- END Head-->

<!-- START: Body-->
<body id="main-container" class="default horizontal-menu inner_page">
<!-- START: Pre Loader-->
<div class="se-pre-con">
    <img src="{{asset("dist")}}/images/logo.png" alt="logo" width="23" class="img-fluid"/>
</div>
<!-- END: Pre Loader-->

<!-- START: Header-->
{{--@yield("header")--}}
@include("admin.master.headermenu")
<!-- END: Header-->
@include("admin.master.breadcrumbs")



<!-- START: Main Content-->
<main>
    <div class="container-fluid">


        <!-- START: Breadcrumbs-->
{{--    @include("admin.master.breadcrumbs")--}}
    <!-- END: Breadcrumbs-->

           @include("admin.master.content")
    </div>
</main>
<!-- END: Content-->

<!-- START: Footer-->
@include("admin.master.footer")
<!-- END: Footer-->

<!-- START: Back to top-->
<a href="#" class="scrollup text-center">
    <i class="icon-arrow-up"></i>
</a>
<!-- END: Back to top-->
<!-- Float-buttom -->
@include("admin.master.fab")
<!-- end:Float-buttom -->


<!-- START: Template JS-->
<script src="{{asset("dist")}}/vendors/jquery/jquery-3.3.1.min.js"></script>
<script src="{{asset("dist")}}/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="{{asset("dist")}}/vendors/moment/moment.js"></script>
<script src="{{asset("dist")}}/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("dist")}}/vendors/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{asset("dist")}}/vendors/flag-select/js/jquery.flagstrap.min.js"></script>
<script src="{{asset("dist")}}/js/toastr.min.js"></script>

<!-- END: Template JS-->



<!-- START: Page Vendor JS-->
@yield("vendorjs")
<!-- END: Page Vendor JS-->

<!-- START: Page JS-->
@yield("pagejs")
<!-- END: Page JS-->

</body>
@jquery
@toastr_js
@toastr_render
<!-- END: Body-->
</html>

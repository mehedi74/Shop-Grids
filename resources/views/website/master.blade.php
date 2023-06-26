<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    @include('website.includes.style')
</head>
<body>
<!-- header-->
@include('website.includes.header')
<!-- endheader-->

<!--main body-->
@yield('body')
<!--end main body-->

<!-- footer-->
@include('website.includes.footer')
<!-- end footer-->

<!-- script-->
@include('website.includes.script')
<!-- end script-->

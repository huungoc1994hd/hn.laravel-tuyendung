<!DOCTYPE html>
<html dir="ltr" lang="{{ config('app.locale') }}" class="no-outlines">
<head>
    <title>{{ config('app.name') }} - @yield('title')</title>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {!! Html::meta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no') !!}
    {!! Html::meta('author', 'Huu Ngoc Developer') !!}
    {!! Html::meta('csrf-token', csrf_token()) !!}

    {!! Html::favicon('backend/images/favicon.png') !!}

    {!! Html::style('backend/css/open-sans.css') !!}
    {!! Html::style('backend/css/fontawesome-all.min.css') !!}
    {!! Html::style('backend/css/jquery-ui.min.css') !!}
    {!! Html::style('backend/css/morris.min.css') !!}
    {!! Html::style('backend/css/jvectormap.min.css') !!}
    {!! Html::style('backend/css/bootstrap.min.css') !!}
    {!! Html::style('backend/css/animate.min.css') !!}
    {!! Html::style('backend/css/tagsinput.css') !!}
    {!! Html::style('backend/css/sweetalert.min.css') !!}
    {!! Html::style('backend/css/scrollbar.min.css') !!}
    {!! Html::style('backend/css/datatables.min.css') !!}
    {!! Html::style('backend/css/nestable.css') !!}
    {!! Html::style('backend/css/switchery.css') !!}
    {!! Html::style('backend/css/select2.min.css') !!}
    {!! Html::style('backend/css/style.css') !!}
    {!! Html::style('backend/css/profile.css') !!}

    {!! Html::script('backend/js/jquery.min.js') !!}
    {!! Html::script('vendor/laravel-ckeditor/ckeditor.js') !!}
</head>
<body>
<div class="wrapper">
    <!-- Header -->
    @include('backend.layouts._header')

    <!-- Sidebar -->
    @include('backend.layouts._sidebar')

    <main class="main--container">
        <!-- Breadcrumb -->
        @include('backend.layouts._breadcrumb')

        <!-- Content -->
        @yield('body')

        <!-- Footer -->
        @include('backend.layouts._footer')
    </main>
</div>


{!! Html::script('backend/js/jquery-ui.min.js') !!}
{!! Html::script('backend/js/bootstrap.bundle.min.js') !!}
{!! Html::script('backend/js/bootbox.all.min.js') !!}
{!! Html::script('backend/js/jquery.validate.min.js') !!}
{!! Html::script('backend/js/scrollbar.min.js') !!}
{!! Html::script('backend/js/jquery.sparkline.min.js') !!}
{!! Html::script('backend/js/tagsinput.min.js') !!}
{!! Html::script('backend/js/notify.min.js') !!}
{!! Html::script('backend/js/sweetalert.min.js') !!}
{!! Html::script('backend/js/nestable.js') !!}
{!! Html::script('backend/js/raphael.min.js') !!}
{!! Html::script('backend/js/morris.min.js') !!}
{!! Html::script('backend/js/switchery.js') !!}
{!! Html::script('backend/js/select2.min.js') !!}
{!! Html::script('backend/js/typeahead.bundle.min.js') !!}
{!! Html::script('backend/js/mark.min.js') !!}
{!! Html::script('backend/js/jvectormap.min.js') !!}
{!! Html::script('backend/js/jvectormap-world-mill.min.js') !!}
{!! Html::script('vendor/laravel-filemanager/js/lfm.js') !!}
{!! Html::script('backend/js/main.js') !!}
{!! Html::script('backend/js/page.js') !!}
{!! Html::script('common/js/redirect.js') !!}
{!! Html::script('backend/js/scripts.js') !!}

@include('backend.layouts._notify')
</body>
</html>

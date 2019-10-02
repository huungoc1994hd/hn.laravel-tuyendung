<!DOCTYPE html>
<html dir="ltr" lang="{{ config('app.locale') }}" class="no-outlines">
<head>
    <title>{{ config('app.name') }} - @yield('title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {!! Html::meta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no') !!}
    {!! Html::meta('author', 'Huu Ngoc Developer') !!}
    {!! Html::meta('csrf-token', csrf_token()) !!}

    {!! Html::favicon('backend/images/favicon.png') !!}

    {!! Html::style('backend/css/open-sans.css') !!}
    {!! Html::style('backend/css/bootstrap.min.css') !!}
    {!! Html::style('backend/css/fontawesome-all.min.css') !!}
    {!! Html::style('backend/css/animate.min.css') !!}
    {!! Html::style('backend/css/style.css') !!}
</head>
<body>

@yield('body')

{!! Html::script('backend/js/jquery.min.js') !!}
{!! Html::script('backend/js/bootstrap.bundle.min.js') !!}
{!! Html::script('backend/js/notify.min.js') !!}
{!! Html::script('backend/js/main.js') !!}

@include('backend.layouts._notify')
</body>
</html>

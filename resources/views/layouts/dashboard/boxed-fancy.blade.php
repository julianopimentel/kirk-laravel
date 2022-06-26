@props(['dir'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$dir ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}} | Account</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/hope-ui.css?v=1.0')}}">
    <!-- remixicon -->
    <!-- <link rel="stylesheet" href="{{ asset('vendor/remixicon/fonts/remixicon.css') }}"/> -->
    @include('partials.dashboard._head')
</head>
<body class="boxed-fancy light theme-color-gray" id="app">
@include('partials.dashboard._body6')

 @include('partials.dashboard._scripts')
 @include('partials.dashboard._app_toast')
</body>
</html>







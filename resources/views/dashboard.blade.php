<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nexus Collaborative') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/statics.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/myapp/graduate.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dash">
    <div class="content_dashboard">
        <div class="flex">
            <div class="s-components">
                @include('components.sidebar-user')
            </div>
            <div class="s-content-user">
              <div class="tp-left">
                @yield('app')
              </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name') }}
    </title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon.ico') }}" rel="shortcut icon">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon.ico') }}" rel="icon">
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="min-w-[320px] relative">
    <main>
    <x-header />


    @yield('content')



    <x-footer />
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.0.8/swiper-bundle.min.js"></script>
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>

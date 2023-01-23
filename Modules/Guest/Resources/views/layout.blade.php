<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--====== Title ======-->
    <title>{{ config('app.name') }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.scss')
    @stack('styles')
</head>
<body class="antialiased font-sans leading-normal tracking-normal min-h-screen flex flex-col">

@include('guest::components.header')

<main class="bg-gray-100 grow py-4 flex flex-column justify-evenly items-start w-100 h-100">
    @yield('content')
</main>

@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>

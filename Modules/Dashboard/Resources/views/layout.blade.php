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
<body class="antialiased font-sans leading-normal tracking-normal">

@include('dashboard::components.header')

<div class="min-h-full">
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</div>

@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>

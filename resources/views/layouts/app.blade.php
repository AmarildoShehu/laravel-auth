<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.01/css/all.min.css" integrity="sha512-npVAdU8G3WzA1y3z37Z7uOpvGBshngKEmqaN0r5z+8uF5q+B7Dbii1jyQ2Uv+6vJfW1BkMxeBOC5oYpsJglkVA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('cdns')

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


       @include('includes.layouts.navbar')

        <main class="container">
            @yield('content')
        </main>
    </div>




    @yield('scripts')
</body>

</html>

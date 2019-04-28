@inject('navHelper', 'App\Services\NavHelper')

        <!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="bg-orange-lightest">
<div id="app">
    <nav class="flex flex-col sm:flex-row fixed pin-t w-full">
        <div class="flex items-center bg-orange text-white py-4 px-6">
            <a href="{{ url('/') }}"
               class="flex items-center text-white hover:text-black no-underline font-bold">
                <img src="{{ url('images/counter-strike.png') }}" style="height: 50px;">

                {{ config('app.name') }}
            </a>

            <span class="ml-auto sm:hidden">Menu</span>
        </div>

        <div class="flex flex-col sm:flex-row flex-wrap items-start sm:items-center justify-end bg-black text-white flex-1 py-4 px-2">
            @foreach($navHelper->categories() as $category)
                <div class="px-2 py-4">
                    <a href="#" class="text-white no-underline hover:text-orange">
                        {{ ucwords($category->name) }}
                    </a>
                </div>
            @endforeach
        </div>
    </nav>

    <main class="container mx-auto mt-32 px-4">
        @yield('content')
    </main>

    <footer class="flex bg-black border-4-2 border-orange w-full py-8 mt-8">
        <div class="container mx-auto flex flex-wrap">
            @foreach($navHelper->categories() as $category)
                <div class="w-1/2 md:w-1/4 p-4">
                    <a href="#" class="text-white no-underline hover:text-orange">
                        {{ ucwords($category->name) }}
                    </a>
                </div>
            @endforeach

            <div class="border-t-2 border-b-2 border-orange w-full mx-auto py-4 mt-4 text-white text-center text-sm font-light">
                Counterstrike Global News is a demonstration project by Rob Burley
            </div>
        </div>
    </footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

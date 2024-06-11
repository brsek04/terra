<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Terra') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/cdn.min.js" defer></script>
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body class="font-sans antialiased w-full">
    <div class="min-h-screen bg-body-image w-full bg-cover dark:bg-[#0F172A]">
        <nav class="bg-gray-900 dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-orange-700 dark:border-gray-600 shadow-xl">
            @include('elements.header-admin')
        </nav>
            
            @yield('contenido')
     
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{mix('js/app.js')}}" ></script>
</body>
</html>

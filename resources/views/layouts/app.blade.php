<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> 
        <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body class="font-sans antialiased w-full">
    <div class="min-h-screen bg-gray-100 flex flex-col ">

       
            <header class="max-w" >
                @include('layouts.header')
            </header>
            <div class="max-w">
                @include('layouts.sidebar-admin')
            </div>    
            
      
        <main >
            @yield('content')
        </main>
        <footer>
            
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
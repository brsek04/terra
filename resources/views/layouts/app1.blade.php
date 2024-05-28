<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> 
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased w-full">
        
            
        <div class="min-h-screen bg-gray-100">
           
            <header class="bg-white shadow">
                @include('layouts.header')
            </header>
                @include('layouts.sidebar')
            <main>
                    @yield('content')
            </main>
               
            </div>
            <footer class="main-footer">
                @include('layouts.footer')
            </footer>
        </div>
      

        <!-- Main Content -->
        <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class=" max-w-screen-xl flex flex-wrap items-start justify-between mx-auto p-2 ">
                <a href="#" class=" flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://cdn-icons-png.flaticon.com/512/1996/1996055.png" class="h-8" alt="TerralomasLogo">
                    <strong> TerraAdmin</strong>
                </a>
                <button type="button" class=" flex items-start  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 Iniciar Sesión</button>
                 <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Pink to orange
                    </span>
                </button>
            </div>
        </nav>
        

@include('profile.change_password')
@include('profile.edit_profile')

<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    const userUrl = '{{url('users')}}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
</body>
</html>


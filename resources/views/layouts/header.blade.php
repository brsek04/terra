<nav class="fixed flex-wrap top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-[#0F172A] dark:border-gray-700">
    <div class="px-1 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="#" class="logo ml-16 dark:text-white transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
                    <strong>TerraAdmin</strong>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <div class=" p-2">
                        <p class="text-sm text-gray-500 dark:text-white font-bold" role="none">
                            Hola, {{ \Illuminate\Support\Facades\Auth::user()->name }}
                         </p>
                    </div>
                    <div class="relative">
                        <button id="usuario-menu-button" aria-expanded="true" aria-haspopup="true" class="flex items-center justify-center h-8 w-8 bg-gray-500 rounded-full text-white">
                            <span class="sr-only">Open user menu</span>
                            {{ strtoupper(substr(\Illuminate\Support\Facades\Auth::user()->name, 0, 1)) }}
                        </button>
                        <div id="dropdown-user" class="z-50 hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 dark:bg-[#1E293B]" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                                </p>
                            </div>
                            <a href="#" class=" block px-4 py-2 text-sm text-gray-700 transition duration-75 pl-11 group hover:bg-gray-700 dark:text-white dark:hover:bg-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 transition duration-75 pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Configuración</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 transition duration-75 pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                    
                    @else
                    <div class="flex">
                        <button type="button" class="flex items-center text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:from-cyan-500 dark:to-blue-500 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('login') }}" class="text-white">
                                {{ __('messages.common.login') }}
                            </a>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>


<!--
<script>
    document.getElementById('usuario-menu-button').addEventListener('click', function() {
      var dropdown = document.getElementById('dropdown-user');
      dropdown.classList.toggle('hidden');
    });
</script>
-->
  <!--
<ul class="navbar-nav navbar-right">

    @if(\Illuminate\Support\Facades\Auth::user())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/logo.png') }}"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    Hi, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Welcome, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Edit Profile</a>
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                            class="fa fa-lock"> </i>Change Password</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                </a>
            </div>
        </li>
    @endif

</ul>

-->




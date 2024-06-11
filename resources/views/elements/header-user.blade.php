<nav class="fixed flex-wrap top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-[#0F172A] dark:border-gray-700">
    <div class="px-1 lg:px-5 lg:py-2.5 lg:pl-3 bg-black flex justify-between items-center">
        <div class="flex items-center">
            <a href="#" class="logo ml-16 text-white dark:text-white transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
                <strong>TerraLomas</strong>
            </a>
        </div>
        <div class="text-right flex items-center px-10">
            <div class="flex flex-wrap px-2">
                <a href="" class="text-white flex flex-wrap items-center pr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fb923c" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                    </svg>
                    (41) 2764280
                </a>
                <a href="" class="text-white flex flex-wrap items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fb923c" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                    </svg>
                    9 6603 5934
                </a>
            </div>
            
            <div class="flex flex-wrap ">
                <a href="https://www.facebook.com/terralomas">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="#fb923c"class="w-4 h-4">
                        <path d="M 8 3 C 5.243 3 3 5.243 3 8 L 3 16 C 3 18.757 5.243 21 8 21 L 16 21 C 18.757 21 21 18.757 21 16 L 21 8 C 21 5.243 18.757 3 16 3 L 8 3 z M 8 5 L 16 5 C 17.654 5 19 6.346 19 8 L 19 16 C 19 17.654 17.654 19 16 19 L 8 19 C 6.346 19 5 17.654 5 16 L 5 8 C 5 6.346 6.346 5 8 5 z M 17 6 A 1 1 0 0 0 16 7 A 1 1 0 0 0 17 8 A 1 1 0 0 0 18 7 A 1 1 0 0 0 17 6 z M 12 7 C 9.243 7 7 9.243 7 12 C 7 14.757 9.243 17 12 17 C 14.757 17 17 14.757 17 12 C 17 9.243 14.757 7 12 7 z M 12 9 C 13.654 9 15 10.346 15 12 C 15 13.654 13.654 15 12 15 C 10.346 15 9 13.654 9 12 C 9 10.346 10.346 9 12 9 z"/>
                    </svg>
                </a>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" fill="#fb923c" class="w-4 h-4">
                        <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"/>
                    </svg>
                </a>
            </div>
            
        </div>
       
    </div>
    <div class="fixed w-full items-center bg-gray-900 bg-opacity-75 md:bg-opacity-75 p-2 ">
        <div class="flex items-center ms-3 justify-end">
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
</nav>



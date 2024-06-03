@extends('layouts.app-user')
@section('title')
    Admin Login
@endsection
@section('contenido')
<section class=" min-h-screen flex items-center justify-center">
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <div class="md:w-1/2 px-5 md:px-16">
                <h2 class="font-bold text-2xl text-[#002D74]">Iniciar Sesión</h2>
                <p lass="text-xs mt-4 text-[#002D74]">Si ya estás registrado, fácil, inicia sesión</p>
                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                    @csrf
                            <input class="p-2 mt-8 rounded-xl border {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email"
                            value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                             placeholder="email@email.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert" required autocomplete="email" autofocus>
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="relative">
                        <input
                            id="password"
                            type="password"
                            placeholder="Password"
                            class="p-2 rounded-xl border border-orange-500 w-full form-control  @error('password') is-invalid @enderror focus:border-orange-500 focus:outline-none"
                            name="password"
                            required
                            autocomplete="current-password"
                            value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </div>
                    
                    <button class="bg-orange-400 rounded-xl text-white py-2 hover:scale-105 duration-300">
                    {{ __('Log in') }}
                    </button>
                </form>
                
                <div class="m-2 text-xs border-b border-[#002D74] py-4 text-[#002D74]">
                    <div class="form-check custom-checkbox ms-1 d-flex align-items-center">
                        <input class="form-check-input rounded-sm me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" for="remember">Remember my preference</label>
                    </div>
                    
                    <div class="mt-5">
                        <a class="underline text-sm  text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                </div>
                <div class="mt-3 text-xs flex justify-between aling-items-center items-center text-[#002D74]">
                    <p class="mr-3">¿No tienes cuenta?</p>
                    <button class="py-2 px-5 bg-orange-400 border rounded-xl hover:scale-105 duration-300">
                      @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="text-sm  text-white dark:text-gray-500 underline">Registrate</a>
                      @endif
                    </button>
                </div>
            </div>
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="https://i.pinimg.com/564x/a5/12/d1/a512d1f51eccf437d733ea952beb88b9.jpg">
            </div>
        </div>
</section>
<!---
    <div class="card card-primary">
        <div class="card-header"><h4>Admin Login</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Enter Email" tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Enter Password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
-->
@endsection

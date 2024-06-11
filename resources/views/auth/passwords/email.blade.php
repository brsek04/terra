@extends('layouts.app')
@section('title')
    Forgot Password
@endsection
@section('content')
<section class="min-h-screen flex items-center justify-center ">
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center dark:bg-gray-900">
        <div class="px-8">
            <h2 class="font-bold text-2xl text-[#002D74]">Recuperar contraseña</h2>
            <div class="flex">
                <p class="text-xs mt-2 font-bold  text-[#002D74]">Ingrese la dirección de correo electrónico verificada de su cuenta de usuario
                    y le enviaremos un enlace para restablecer su contraseña.
                </p>
            </div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-2">
                @csrf
                <label for="name" class="block mt-2  text-gray-700 font-bold ">
                    Email
                </label>
                <input id="email" type="email" class=" border border-orange-300 p-2 w-full rounded-xl form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" tabindex="1"  value="{{ old('email') }}" autofocus required>
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
                <button type="submit" class="bg-orange-400 rounded-xl text-white py-2  hover:scale-105 duration-300">
                    Send Reset Link
                </button>
            </form>
            <div class="m-3 text-xs border-b border-[#002D74]  text-[#002D74]">
            </div>
            <div class="mt-3 text-xs flex px-2 aling-items-center items-center text-[#002D74]">
                <p class=""> ¿Recordó su información de inicio de sesión? </p>
                <button class="py-2 px-5 mx-2 bg-orange-400 border rounded-xl hover:scale-105 duration-300">
                  @if (Route::has('login'))
                  <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline">Inicia Sesión</a>
                  @endif
                </button>
            </div>

        </div>
    </div>

@endsection

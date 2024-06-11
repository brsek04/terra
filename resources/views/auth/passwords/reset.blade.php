@extends('layouts.app')
@section('title')
    Reset Password
@endsection
@section('content')

<section class="min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center dark:bg-gray-900">
        
        <div class="px-8">
            <h2 class="font-bold text-2xl text-[#002D74]">Establecer nueva contraseña</h2>
            <div class="flex">
                <p class="text-xs mt-2 font-bold  text-[#002D74]">Complete el siguiente formulario para establecer la nueva contraseña.
                </p>
            </div>
            <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-2">
                @csrf
                @if ($errors->any())
                    <div class="invalid-feedback" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="password" class="mb-2 block text-gray-700 font-bold">
                    Contraseña
                </label>
                <input id="password"
                name="password"
                type="password"
                placeholder="Escribe tu contraseña"
                class="border  p-2 w-full rounded-xl
                {{ $errors->has('password') ? ' is-invalid': '' }}" name="password" 
                required autocomplete="new-password" 
                >
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>

                <label for="password_confirmation" class="mb-2 block  text-gray-700 font-bold">
                    Confirmar contraseña
                </label>
                <input id="password_confirmation"
                       name="password_confirmation"
                       type="password"
                       placeholder="Repite tu contraseña"
                       class="border p-2 w-full rounded-xl
                       {{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" 
                       required autocomplete="new-password" 
                >
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>

                <button type="submit" class="bg-orange-400 rounded-xl text-white py-2  hover:scale-105 duration-300">
                    Establecer nueva contraseña
                </button>
            </form>
        </div>
    </div>
</section>

<!--
    <div class="card card-primary">
        <div class="card-header"><h4>Set a New Pasword</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ url('/password/reset') }}">
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
                <input type="hidden" name="token" value="{{ $token }}">

                
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2">
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="control-label">Confirm Password</label>
                    <input id="password_confirmation" type="password"
                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                           name="password_confirmation" tabindex="2">
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Set a New Password
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Recalled your login info? <a href="{{ route('login') }}">Sign In</a>
    </div>
-->
@endsection

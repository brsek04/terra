@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')


<section class="flex min-h-screen justify-center items-center">
    <div class="bg-gray-100 flex rounded-2xl shadow-xl max-w-3xl p-5 items-center">
        <div class="md:w-1/2 px-8 md:px-4">
          <h2 class="font-bold text-2xl text-[#002D74]">Formulario de Registro</h2>
          <p class="text-xs mt-4 text-[#002D74]">Registrate rellenando el formulario</p>
              <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                      @csrf
                      <div class="mt-4">
                          <div>
                              <label for="name" class="mb-2 block  text-gray-700 font-bold">
                                  Nombre
                              </label>
                              <input id="name"
                                     name="name"
                                     type="text"
                                     placeholder="Escribir Nombre"
                                     class="border border-orange-300 p-2 w-full rounded-xl
                                     @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                     required autocomplete="name" 
                                     autofocus
                              >
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  {{ $message }}
                              </span>
                              @enderror   
                          </div>
                          <div class="mb-2 mt-2">
                              <label for="email" class="mb-2 block text-gray-700 font-bold">
                                  Correo
                              </label>
                              <input id="email"
                                     name="email"
                                     type="email"
                                     placeholder="correo@gmail.com"
                                     class="border border-orange-300 p-2 w-full rounded-xl
                                     @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                     required autocomplete="email" 
                              >
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                  </span>
                              @enderror  
                          </div>
      
                          <div class="mb-2">
                              <label for="password" class="mb-2 block text-gray-700 font-bold">
                                  Contraseña
                              </label>
                              <input id="password"
                                     name="password"
                                     type="password"
                                     placeholder="Escribe tu contraseña"
                                     class="border border-orange-300 p-2 w-full rounded-xl
                                     @error('password') is-invalid @enderror" name="password" 
                                     required autocomplete="new-password" 
                              >
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-2">
                              <label for="password_confirmation" class="mb-2 block  text-gray-700 font-bold">
                                  Confirmar contraseña
                              </label>
                              <input id="password_confirmation"
                                     name="password_confirmation"
                                     type="password"
                                     placeholder="Repite tu contraseña"
                                     class="border border-orange-300 p-2 w-full rounded-xl
                                     @error('password_confirmation') is-invalid @enderror" name="password_confirmation" 
                                     required autocomplete="new-password" 
                              >
                              @error('password_confirmation')
                                  <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                      </div>
    
                  <button type="submit" class="bg-orange-400 rounded-xl text-white py-2 mx-2 hover:scale-105 duration-300">
                      {{ __('Register') }}
                  </button>
              </form>
    
              <div class="m-3 text-xs border-b border-[#002D74]  text-[#002D74]">
              </div>
    
            <div class="mt-3 text-xs flex justify-between aling-items-center items-center text-[#002D74]">
              <p >¿Ya tienes cuenta?</p>
              <button class="py-2 px-5 bg-orange-400 border rounded-xl hover:scale-105 duration-300">
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline">Inicia Sesión</a>
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
        <div class="card-header"><h4>Register</h4></div>

        <div class="card-body pt-1">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">Full Name:</label><span
                                    class="text-danger">*</span>
                            <input id="firstName" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   tabindex="1" placeholder="Enter Full Name" value="{{ old('name') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label><span
                                    class="text-danger">*</span>
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Email address" name="email" tabindex="1"
                                   value="{{ old('email') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password
                                :</label><span
                                    class="text-danger">*</span>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                   placeholder="Set account password" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation"
                                   class="control-label">Confirm Password:</label><span
                                    class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirm account password"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                   name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Already have an account ? <a
                href="{{ route('login') }}">SignIn</a>
    </div>
-->

@endsection

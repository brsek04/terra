@extends('layouts.app')

@section('content')

    <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menus') }}</div>

                    <div class="card-body">
                        @foreach ($menus as $menu)
                            <div>{{ $menu->name }}</div>
                            <!-- Aquí puedes mostrar más detalles del menú si lo deseas -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

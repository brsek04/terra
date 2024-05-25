@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menus') }}</div>
                    <div class="card-body">
                        @foreach ($menus as $menu)
                            <div>
                                <!-- Enlace al detalle del menú que pasa el ID del menú como parámetro -->
                                <a href="{{ route('menus.showPublic', $menu->id) }}">{{ $menu->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

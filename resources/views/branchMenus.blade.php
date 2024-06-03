@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menus for') }} {{ $branch->name }}</div>

                    <div class="card-body">
                        @foreach ($menus as $menu)
                            <div>
                                <!-- Muestra el nombre del menú y enlace a su página de detalles -->
                                <a href="{{ route('menus.showPublic', $menu->id) }}">{{ $menu->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Enlace de "volver" para regresar a la lista de sucursales -->
                <a href="{{ route('visitante.index') }}" class="btn btn-secondary mt-3">{{ __('Back to Branches') }}</a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="flex justify-center container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="bg-gray-100 dark:bg-gray-900 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ __('Menus for') }} {{ $branch->name }}</h2>
                    </div>

                    <div class="p-6">
                        @foreach ($menus as $menu)
                            <div class="py-2">
                                <a href="{{ route('menus.shop', ['menu' => $menu->id]) }}" class="text-blue-500 hover:underline">{{ $menu->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Enlace de "volver" para regresar a la lista de sucursales -->
                <a href="{{ route('visitante.index') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded mt-4 hover:bg-gray-600">{{ __('Back to Branches') }}</a>
            </div>
        </div>
    </div>
@endsection


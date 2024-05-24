@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}: {{ $menu->name }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>{{ __('Name') }}:</strong>
                            {{ $menu->name }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Branch Id') }}:</strong>
                            {{ $menu->branch_id }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Dishes') }}:</strong>
                            <ul>
                                @foreach ($menu->dishes as $dish)
                                    <li>{{ $dish->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

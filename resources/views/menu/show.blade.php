@extends('layouts.app')

@section('template_title')
    {{ $menu->name ?? __("Show Menu") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Menu') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('menus.index') }}">{{ __('Back') }}</a>
                        </div>
                    </div>

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
    </section>
@endsection

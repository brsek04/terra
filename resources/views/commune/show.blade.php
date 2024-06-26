@extends('layouts.app')

@section('template_title')
    {{ $commune->name ?? "{{ __('Show') Commune" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Commune</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('communes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $commune->name }}
                        </div>
                        <div class="form-group">
                            <strong>Region Id:</strong>
                            {{ $commune->region_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

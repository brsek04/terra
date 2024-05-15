@extends('layouts.app')

@section('template_title')
    {{ $beverageType->name ?? "{{ __('Show') Beverage Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Beverage Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('beverage-types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $beverageType->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

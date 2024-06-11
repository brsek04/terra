@extends('layouts.app')

@section('template_title')
    {{ $beverage->name ?? "{{ __('Show') Beverage" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Beverage</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('beverages.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $beverage->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $beverage->description }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $beverage->price }}
                        </div>
                        <div class="form-group">
                            <strong>Alcohol:</strong>
                            {{ $beverage->alcohol }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $beverage->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Rating:</strong>
                            {{ $beverage->rating }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $beverage->type_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

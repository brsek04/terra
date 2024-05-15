@extends('layouts.app')

@section('template_title')
    {{ $company->name ?? "{{ __('Show') Company" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Company</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('companies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $company->name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $company->address }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $company->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

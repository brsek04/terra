@extends('layouts.app')

@section('template_title')
    {{ $about->name ?? "{{ __('Show') About" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} About</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('abouts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $about->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $about->description }}
                        </div>
                        <div class="form-group">
                            <strong>Branch Id:</strong>
                            {{ $about->branch_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app-admin')

@section('template_title')
    {{ __('Create') }} Beverage
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Beverage</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('beverages.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('beverage.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

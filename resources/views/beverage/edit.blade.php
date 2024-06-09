@extends('layouts.app-admin')

@section('template_title')
    {{ __('Update') }} Beverage
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Beverage</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('beverages.update', $beverage->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('beverage.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

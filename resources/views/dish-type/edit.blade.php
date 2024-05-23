@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Dish Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Dish Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dish-types.update', $dishType->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('dish-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

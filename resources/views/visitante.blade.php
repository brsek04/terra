@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Branches') }}</div>

                    <div class="card-body">
                        @foreach ($branches as $branch)
                            <div>
                                <a href="{{ route('branch.menus', $branch->id) }}">{{ $branch->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

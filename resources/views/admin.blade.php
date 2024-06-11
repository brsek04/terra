@extends('layouts.app')

@section('content')

    <div class="container dark:bg-gray-700">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark:bg-gray-800">
                    <div class="card-header dark:text-white">{{ __('Branches') }}</div>

                    <div class="card-body">
                        @foreach ($branches as $branch)
                            <div>
                                <a class="dark:text-white" href="{{ route('branch.menus', $branch->id) }}">{{ $branch->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
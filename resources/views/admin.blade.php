@extends('layouts.app')

@section('content')

<section class="section">
    <div class="section-header  dark:bg-gray-800">
        <h3 class=" font-bold dark:text-gray-50">¡Bienvenido! {{ \Illuminate\Support\Facades\Auth::user()->name }} </h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class=" dark:bg-gray-800 p-10 lg-rounded-sm">
                        <h3 class="dark:text-gray-50">Este es tu panel de administración</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
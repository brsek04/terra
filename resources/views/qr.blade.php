@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Código QR</div>

                <div class="card-body">
                    <img src="{{ Storage::url($qrCodePath) }}" alt="QR Code">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

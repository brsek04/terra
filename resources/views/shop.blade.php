@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tienda</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>{{ $menu->name }}</h4>
                </div>
            </div>
            <hr>

            <div class="row mb-4">
                <div class="col-lg-6">
                    <h5>Filtrar por tipo de plato</h5>
                    <ul class="list-group">
                        @foreach($dishTypes as $type)
                            <li class="list-group-item">
                                <a href="{{ route('shop.filter', ['menuId' => $menu->id, 'type' => 'dish', 'typeId' => $type->id]) }}">
                                    {{ $type->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h5>Filtrar por tipo de bebida</h5>
                    <ul class="list-group">
                        @foreach($beverageTypes as $type)
                            <li class="list-group-item">
                                <a href="{{ route('shop.filter', ['menuId' => $menu->id, 'type' => 'beverage', 'typeId' => $type->id]) }}">
                                    {{ $type->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @if(isset($items) && count($items))
            @if(request()->has('type') && request()->has('typeId'))
    @php
        $type = request()->get('type');
        $typeId = request()->get('typeId');
    @endphp
    <h5>Filtrados por {{ ucfirst($typeName) }}</h5>
@endif

    <div class="row">
        @foreach($items as $item)
            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px;">
                    <img src="{{ asset($item->photo) }}"
                         class="card-img-top mx-auto img-thumbnail"
                         width="200" height="200"
                         alt="{{ $item->name }}"
                    >
                    <div class="card-body">
                        <a href=""><h6 class="card-title">{{ $item->name }}</h6></a>
                        <p>{{ $item->description }}</p>
                        <p>${{ $item->price }}</p>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                            <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                            <input type="hidden" value="{{ $item->price }}" id="price" name="price">
                            <input type="hidden" value="{{ $item->photo }}" id="photo" name="photo">
                            <input type="hidden" value="{{ $type }}" id="type" name="type">
                            <input type="hidden" value="1" id="quantity" name="quantity">
                            <div class="card-footer" style="background-color: white;">
                                <div class="row">
                                    <button type="submit" class="btn btn-secondary btn-sm" title="agregar al carrito">
                                        <i class="fa fa-shopping-cart"></i> agregar al carrito
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif


@if(!isset($items))
                @if($menu->dishes->count())
                    <h5>Platos</h5>
                    <div class="row">
                        @foreach($menu->dishes as $dish)
                            <div class="col-lg-3">
                                <div class="card" style="margin-bottom: 20px;">
                                    <img src="{{ asset($dish->photo) }}"
                                         class="card-img-top mx-auto img-thumbnail"
                                         width="200" height="200"
                                         alt="{{ $dish->name }}"
                                    >
                                    <div class="card-body">
                                        <a href=""><h6 class="card-title">{{ $dish->name }}</h6></a>
                                        <p>{{ $dish->description }}</p>
                                        <p>${{ $dish->price }}</p>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $dish->id }}" id="id" name="id">
                                            <input type="hidden" value="{{ $dish->name }}" id="name" name="name">
                                            <input type="hidden" value="{{ $dish->price }}" id="price" name="price">
                                            <input type="hidden" value="{{ $dish->photo }}" id="photo" name="photo">
                                            <input type="hidden" value="dish" id="type" name="type">
                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                            <div class="card-footer" style="background-color: white;">
                                                <div class="row">
                                                    <button type="submit" class="btn btn-secondary btn-sm" title="agregar al carrito">
                                                        <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($menu->beverages->count())
                    <h5>Bebestibles</h5>
                    <div class="row">
                        @foreach($menu->beverages as $beverage)
                            <div class="col-lg-3">
                                <div class="card" style="margin-bottom: 20px;">
                                    <img src="{{ asset($beverage->photo) }}"
                                         class="card-img-top mx-auto img-thumbnail"
                                         width="200" height="200"
                                         alt="{{ $beverage->name }}"
                                    >
                                    <div class="card-body">
                                        <a href=""><h6 class="card-title">{{ $beverage->name }}</h6></a>
                                        <p>{{ $beverage->description }}</p>
                                        <p>${{ $beverage->price }}</p>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $beverage->id }}" id="id" name="id">
                                            <input type="hidden" value="{{ $beverage->name }}" id="name" name="name">
                                            <input type="hidden" value="{{ $beverage->price }}" id="price" name="price">
                                            <input type="hidden" value="{{ $beverage->photo }}" id="photo" name="photo">
                                            <input type="hidden" value="beverage" id="type" name="type">
                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                            <div class="card-footer" style="background-color: white;">
                                                <div class="row">
                                                    <button type="submit" class="btn btn-secondary btn-sm" title="agregar al carrito">
                                                        <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title')
    Carrito
@endsection
@section('content')

<div class="bg-gray-800 antialiased dark:bg-gray-900 py-10 flex flex-col items-center">
    <div class="pt-20">
        <h4 class="text-white font-serif font-bold text-2xl dark:text-white mb-4">Continua con tu pedido </h4>
    </div>
</div>
<div>
    @if(session()->has('success_msg'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 alert" role="alert">
            <span class="font-medium">Success alert!</span> {{ session()->get('success_msg') }}
            <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if(session()->has('alert_msg'))
        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800 alert" role="alert">
            <span class="font-medium">Info alert!</span> {{ session()->get('alert_msg') }}
            <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 alert" role="alert">
                <span class="font-medium">Danger alert!</span> {{ $error }}
                <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif
</div>

<div class="w-full">
    <div class="w-full">
        <div class="h-screen  pt-20">
            @if(\Cart::getTotalQuantity() > 0)
                <h1 class="mb-10 text-center text-2xl font-bold">{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h1>
             @else
             <div class="flex flex-col items-center justify-center">
                <h1 class="mb-10 text-center text-2xl font-bold">No hay productos en tu carrito</h1>
                <button class="mt-6 w-40 rounded-md bg-green-500 py-1.5 font-medium text-blue-50 hover:bg-green-600">
                    <a href="/">Continuar en la tienda</a>
                </button>
            </div>
             @endif
             <div class=" mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="rounded-lg md:w-2/3">
                    @foreach($cartCollection as $item)
                        @if($item->attributes->type == 'dish')
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src="{{ asset($item->attributes->photo) }}" alt="{{ $item->name }}" class="w-full rounded-lg sm:w-40">
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-5 sm:mt-0">
                                        <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                                        <p class="mt-1 text-xs text-gray-700"><b>Precio:</b> ${{ $item->price }}</p>
                                        <p class="mt-1 text-xs text-gray-700"><b>Subtotal:</b> ${{ \Cart::get($item->id)->getPriceSum() }}</p>
                                    </div>
                                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group flex">
                                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                                <button class="btn btn-secondary btn-sm" style="margin-right: 25px;">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div class="flex items-center space-x-4">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="rounded-lg md:w-2/3">
                    @foreach($cartCollection as $item)
                        @if($item->attributes->type == 'beverage')
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src="{{ asset($item->attributes->photo) }}" alt="{{ $item->name }}" class="w-full rounded-lg sm:w-40">
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-5 sm:mt-0">
                                        <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                                        <p class="mt-1 text-xs text-gray-700"><b>Precio:</b> ${{ $item->price }}</p>
                                        <p class="mt-1 text-xs text-gray-700"><b>Subtotal:</b> ${{ \Cart::get($item->id)->getPriceSum() }}</p>
                                    </div>
                                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                        <div class="flex items-center border-gray-100">
                                            <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="updateQuantity('{{ $item->id }}', 'decrease')">-</span>
                                            <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="{{ $item->quantity }}" min="1" readonly id="quantity-{{ $item->id }}">
                                            <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="updateQuantity('{{ $item->id }}', 'increase')">+</span>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Sub total -->
                @if(\Cart::getTotalQuantity() > 0)
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Subtotal</p>
                        <p class="text-gray-700">${{ \Cart::getSubTotal() }}</p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <div>
                            <p class="mb-1 text-lg font-bold">${{ \Cart::getTotal() }} CLP</p>
                            <p class="text-sm text-gray-700">including VAT</p>
                        </div>
                    </div>
                    <button class="mt-6 w-full rounded-md bg-orange-500 py-1.5 font-medium text-blue-50 hover:bg-orange-600">Check out</button>
                    <button class="mt-6 w-full rounded-md bg-green-500 py-1.5 font-medium text-blue-50 hover:bg-green-600"><a href="/">Continuar en la tienda</a></button>
                </div>
                @endif
            </div>
        

</div>

<!--
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity() > 0)
                    <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No hay productos en tu carrito</h4><br>
                    <a href="/" class="btn btn-dark">Continuar en la tienda</a>
                @endif

                <h5>Platos</h5>
                @foreach($cartCollection as $item)
                    @if($item->attributes->type == 'dish')
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{ asset($item->attributes->photo) }}" class="img-thumbnail" width="200" height="200">
                            </div>
                            <div class="col-lg-5">
                                <p>
                                    <b>{{ $item->name }}</b><br>
                                    <b>Precio: </b>${{ $item->price }}<br>
                                    <b>Subtotal: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                                   id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                            <button class="btn btn-secondary btn-sm" style="margin-right: 25px;">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <button class="btn btn-dark btn-sm" style="margin-right: 10px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach

                <h5>Bebestibles</h5>
                @foreach($cartCollection as $item)
                    @if($item->attributes->type == 'beverage')
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{ asset($item->attributes->photo) }}" class="img-thumbnail" width="200" height="200">
                            </div>
                            <div class="col-lg-5">
                                <p>
                                    <b>{{ $item->name }}</b><br>
                                    <b>Precio: </b>${{ $item->price }}<br>
                                    <b>Subtotal: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                                   id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                            <button class="btn btn-secondary btn-sm" style="margin-right: 25px;">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <button class="btn btn-dark btn-sm" style="margin-right: 10px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach

                @if(count($cartCollection) > 0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button>
                    </form>
                @endif
            </div>

            @if(count($cartCollection) > 0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br><a href="/" class="btn btn-dark">Continuar en la tienda</a>
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">Proceder al Checkout</button>
                    </form>
                </div>
            @endif
        </div>
        <br><br>
    </div>
-->
@endsection


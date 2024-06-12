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
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">Success alert!</span> {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if(session()->has('alert_msg'))
            <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                <span class="font-medium">Info alert!</span> {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">Danger alert!</span> {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
</div>
<div class="w-full">
    <div class="w-full">
        <div class="h-screen  pt-20">
            <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
              <div class="rounded-lg md:w-2/3">
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                  <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="product-image" class="w-full rounded-lg sm:w-40" />
                  <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0">
                      <h2 class="text-lg font-bold text-gray-900">Nike Air Max 2019</h2>
                      <p class="mt-1 text-xs text-gray-700">36EU - 4US</p>
                    </div>
                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                      <div class="flex items-center border-gray-100">
                        <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                        <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="2" min="1" />
                        <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                      </div>
                      <div class="flex items-center space-x-4">
                        <p class="text-sm">259.000 ₭</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                  <img src="https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1131&q=80" alt="product-image" class="w-full rounded-lg sm:w-40" />
                  <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0">
                      <h2 class="text-lg font-bold text-gray-900">Nike Air Max 2019</h2>
                      <p class="mt-1 text-xs text-gray-700">36EU - 4US</p>
                    </div>
                    <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                      <div class="flex items-center border-gray-100">
                        <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                        <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="2" min="1" />
                        <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                      </div>
                      <div class="flex items-center space-x-4">
                        <p class="text-sm">259.000 ₭</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sub total -->
              <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                  <p class="text-gray-700">Subtotal</p>
                  <p class="text-gray-700">$129.99</p>
                </div>
                <div class="flex justify-between">
                  <p class="text-gray-700">Shipping</p>
                  <p class="text-gray-700">$4.99</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                  <p class="text-lg font-bold">Total</p>
                  <div class="">
                    <p class="mb-1 text-lg font-bold">$134.98 USD</p>
                    <p class="text-sm text-gray-700">including VAT</p>
                  </div>
                </div>
                <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
              </div>
            </div>
          </div>
    </div>

</div>
    <div class="container" style="margin-top: 80px">
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
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
@endsection

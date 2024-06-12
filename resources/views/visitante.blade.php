@extends('layouts.app')
@section('title')
    Sucursales
@endsection
@section('content')
<div class="w-full min-h-screen bg-gray-900">
    <div class="w-full min-h-[50vh] bg-opacity-50 bg-black flex justify-center items-center bg-cover" style="background-image: url('images/logos/bannerbg.jpg');">
        <div class="mx-4 text-center text-white pt-20">
            <div class="pt-10">
                <h1 class="font-bold font-serif text-6xl mb-4 underline decoration-orange-400"> Nuestras Sucursales</h1>
            </div>
            <div class="flex  flex-col items-center justify-center space-y-6  px-4 sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                <!--sucursal-->
                @foreach ($branches as $branch)
                <div class="shadow-[5px_5px_rgba(255,_165,_0,_0.4),_10px_10px_rgba(255,_165,_0,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1)] w-full max-w-sm max-h-sm h-full bg-no-repeat bg-cover overflow-hidden rounded-lg p-2 bg-orange-400  duration-300 hover:scale-105 hover:shadow-xl" > 
                    <a href="{{ route('branch.menus', $branch->id)}}">{{ $branch->name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="w-full min-h-[50vh] bg-opacity-50 flex justify-center bg-cover p-10">
        <div class="bg-cover bg-no-repeat bg-center p-10" style="background-image: url('images/logos/appsbg.jpg');">
            <div class="container p-10 rounded-lg" style="backdrop-filter: blur(10px);">
                <h1 class="text-6xl text-orange-300 font-medium mb-4 ">
                    Hola y bienvenidos a  <br> nuestra página principal
                </h1>
                <div class="flex flex-wrap w-1/2">
                    <p class="text-white">Nos enorgullece presentarte nuestras tres sucursales, cada una diseñada para brindarte la mejor experiencia posible.
                        Descubre nuestras instalaciones y servicios únicos en cada ubicación, 
                        donde te garantizamos encontrarás la calidad y atención que mereces.</p>
                </div>
                <div class="mt-12">
                    <a href="#" class="bg-primary border border-primary text-white px-8 py-3 font-medium 
                        rounded-md hover:bg-transparent hover:text-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="w-full min-h-screen bg-gray-900">
    <div class="w-full min-h-[50vh] bg-opacity-50 bg-black flex justify-center items-center bg-cover" style="background-image: url('images/logos/bannerbg.jpg');">
        <div class="mx-4 text-center text-white pt-20">
            <div class="p-10">
                <h1 class="font-bold font-serif text-6xl mb-4 underline decoration-orange-400"> Nuestros menús</h1>
            </div>
            <div class="flex  flex-col items-center justify-center space-y-6  px-4 sm:flex-row sm:space-x-6 sm:space-y-0 pb-10">
                <!--sucursal-->
                @foreach ($branches as $branch)
                <div class="shadow-[5px_5px_rgba(255,_165,_0,_0.4),_10px_10px_rgba(255,_165,_0,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1)] w-full max-w-sm max-h-sm h-full bg-no-repeat bg-cover overflow-hidden rounded-lg p-2 bg-orange-400  duration-300 hover:scale-105 hover:shadow-xl" > 
                    <a href="{{ route('branch.menus', $branch->id)}}">{{ $branch->name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

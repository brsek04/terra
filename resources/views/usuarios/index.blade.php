@extends('layouts.app')

@section('content')

<div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <h3 class="text-gray-700 font-bold p-3 dark:text-white"> {{ __('Usuarios') }}</h3>
</div>

<div class="shadow-md rounded-lg pt-4 min-h">
    <div class="flex bg-white pt-2 px-2 flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 dark:bg-gray-800">
        <div>
            <div class="pt-1 px-4">
                <button type="button" data-modal-toggle="modal-create" data-modal-target="modal-create" class="flex-inline text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:from-cyan-500 dark:to-blue-500  dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2">
                    {{ __('+ Nuevo Usuario') }}
                </button>
            </div>
        </div>
    </div>

    
</div>

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Dashboard Content</h3>

                            <a class="btn btn-warning" href="{{route('usuarios.create') }}">nuevo usuario</a>

                            <table class="table table-striped mt-2">
                                <th>id</th>
                                <th>nombre</th>
                                <th>email</th>
                                <th>rol</th>
                                <th>acciones</th>

                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->id}}</td>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                @foreach($usuario->getRoleNames() as $rolName)
                                                <h5><span>{{$rolName}}</span></h5>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{route ('usuarios.edit', $usuario->id)}}">editar</a>
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['usuarios.destroy', $usuario->id]]) !!}
                                                {!! Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
                                                {!! Form::close()!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>








                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


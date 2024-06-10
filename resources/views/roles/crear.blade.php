@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <strong>Revisa los campos</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row flex">
                                    <div class="col-sm-12">
                                        <div class="form-group flex">
                                            <label for="roles">Permisos</label>
                                            @foreach($permission as $value)
                                            <div class="col-sm-4">
                                                <label class="flex">
                                                    {{ Form::checkbox('permission[]', $value->name, false, ['class' => 'name']) }}
                                                    {{ $value->name }}
                                                    </label>
                                            </div>
                                           
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

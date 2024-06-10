<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.app')

@section('template_title')
    Dish
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Dish') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('dishes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success_add'))
                                                
                                                <script>
                                                    Swal.fire({
                                                    
                                                    icon: "success",
                                                    title: "Agregado exitosamente",
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                    });
                                                        </script>
                                                @endif
    
                                                @if ($message = Session::get('success_del'))
                                                    
                                                <script>
                                                    Swal.fire({
                                                    
                                                    icon: "success",
                                                    title: "Eliminado exitosamente",
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                    });
                                                        </script>
                                                @endif
    
                                                @if ($message = Session::get('success_edit'))
                                                    
                                                <script>
                                                    Swal.fire({
                                                    
                                                    icon: "success",
                                                    title: "Editado exitosamente",
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                    });
                                                        </script>
                                                @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Rating</th>
                                        <th>Prep Time</th>
                                        <th>Photo</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $dish->name }}</td>
											<td>{{ $dish->description }}</td>
											<td>{{ $dish->price }}</td>
											<td>{{ $dish->rating }}</td>
											<td>{{ $dish->prep_time }}</td>
											<td>@if($dish->photo)
                                                <img src="{{ asset($dish->photo) }}" alt="Foto del plato" style="max-width: 100px; max-height: 100px;">

                                                @else
                                                    Sin imagen
                                                @endif </td>
                                            
											<td>{{ $dish->DishType->name }}</td>
                                            <td>{{ $dish->Category->name }}</td>

                                            <td>
                                                <form action="{{ route('dishes.destroy',$dish->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dishes.show',$dish->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dishes.edit',$dish->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('deleteForm_{{ $dish->id }}')">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dishes->links() !!}
            </div>
        </div>
    </div>

    <script>
        // Función para mostrar una alerta de confirmación antes de eliminar un elemento
        function confirmDelete(formId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede revertir. ¿Quieres continuar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma la eliminación, enviar el formulario
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection


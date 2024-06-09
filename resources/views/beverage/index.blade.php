@extends('layouts.app-admin')

@section('template_title')
    Beverage
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Beverage') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('beverages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Alcohol</th>
										<th>Photo</th>
										<th>Rating</th>
										<th>Type</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beverages as $beverage)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $beverage->name }}</td>
											<td>{{ $beverage->description }}</td>
											<td>{{ $beverage->price }}</td>
											<td>{{ $beverage->alcohol }}</td>
											<td>{{ $beverage->photo }}</td>
											<td>{{ $beverage->rating }}</td>
											<td>{{ $beverage->beverageType->name }}</td>

                                            <td>
                                                <form action="{{ route('beverages.destroy',$beverage->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('beverages.show',$beverage->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('beverages.edit',$beverage->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $beverages->links() !!}
            </div>
        </div>
    </div>
@endsection

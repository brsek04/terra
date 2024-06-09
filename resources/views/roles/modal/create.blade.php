<form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data" class="p-2">
    {{ csrf_field() }}
    <div id="modal-create" aria-hidden="true" class=" fixed hidden overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"  tabindex="-1">
        <div class="relative p-4 w-full max-w-md max-h-full" >
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 px-5 py-4">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white"> Crear Rol</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-orange-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-orange-600 dark:hover:text-white" data-modal-toggle="modal-create">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>
                <!--modal body-->
                <form class="p-10 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 pt-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            {!! Form::text('name', null, [
                                'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                                'id' => 'name',
                                'placeholder' => 'Ingresa el nombre',
                                'required' => ''
                            ]) !!}
                        </div>
                        <div class="col-span-2 ">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permisos</label>
                                <div class="flex items-center p-2">
                                    @foreach($permission as $perm)
                                        <div class="flex items-center">
                                            <input id="perm-{{ $perm->id }}" name="permission[]" type="checkbox" value="{{ $perm->id }}" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="perm-{{ $perm->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 pr-2">{{ $perm->name }}</label>
                                        </div>
                                    @endforeach
                                </div>             
                      
                        </div>

                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-blue-orange">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Añadir nuevo Rol
                    </button>
                </form>
            </div>
        </div>
    </div>
</form>



<div id="popup-edit-{{$menu->id}}" aria-hidden="true" class="fixed hidden overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" tabindex="-1">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 px-5 py-4">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Editar menú</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-orange-600 dark:hover:text-white" data-modal-hide="popup-edit-{{$menu->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!-- Modal Body -->
            <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="p-2 md:p-5">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        {{ Form::label('name', 'Nombre', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::text('name', $menu->name, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Nombre']) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div>
                        {{ Form::label('branch_id', 'Sucursal', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::text('branch_id', $menu->branch_id, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Sucursal']) }}
                        {!! $errors->first('branch_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div>
                        <label for="dishes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Seleccionar Platos') }}</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($dishes as $dish)
                                <div class="flex items-center">
                                    <input id="dish{{ $dish->id }}" class="form-check-input h-4 w-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500" type="checkbox" name="dishes[]" value="{{ $dish->id }}" {{ in_array($dish->id, $menu->dishes->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label for="dish{{ $dish->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $dish->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label for="beverages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Seleccionar Bebidas') }}</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($beverages as $beverage)
                                <div class="flex items-center">
                                    <input id="beverage{{ $beverage->id }}" class="form-check-input h-4 w-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500" type="checkbox" name="beverages[]" value="{{ $beverage->id }}" {{ in_array($beverage->id, $menu->beverages->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label for="beverage{{ $beverage->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $beverage->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pb-4 flex justify-center items-center">
                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-blue-orange">
                        Guardar Cambios
                    </button>
                    <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-orange-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="popup-edit-{{$menu->id}}">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

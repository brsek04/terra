<div id="popup-edit-{{$dish->id}}" aria-hidden="true" class="fixed hidden overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" tabindex="-1">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 px-5 py-4">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Editar plato</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-orange-600 dark:hover:text-white" data-modal-hide="popup-edit-{{$dish->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <form action="{{ route('dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data" class="p-2 md:p-5">
                {{ method_field('PATCH') }}
                @csrf
                <div class="mb-4">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::text('name', $dish->name, ['id' => 'name', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Nombre']) }}
                        {!! $errors->first('name', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::text('description', $dish->description, ['id' => 'description', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Descripción']) }}
                        {!! $errors->first('description', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Precio', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::number('price', $dish->price, ['id' => 'price', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Precio']) }}
                        {!! $errors->first('price', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('rating', 'Valoración', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::text('rating', $dish->rating, ['id' => 'rating', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Valoración']) }}
                        {!! $errors->first('rating', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('prep_time', 'Tiempo de preparación', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::number('prep_time', $dish->prep_time, ['id' => 'prep_time', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Tiempo de preparación']) }}
                        {!! $errors->first('prep_time', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('photo', 'Foto', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::file('photo', ['id' => 'photo', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}
                        {!! $errors->first('photo', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('type_id', 'Tipo de plato', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::select('type_id', $types, $dish->type_id, ['id' => 'type_id', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Seleccionar']) }}
                        {!! $errors->first('type_id', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('category_id', 'Categoría', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::select('category_id', $categories, $dish->category_id, ['id' => 'category_id', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'placeholder' => 'Seleccionar']) }}
                        {!! $errors->first('category_id', '<div class="invalid-feedback p-4 text-sm text-red-700 dark:text-red-800">:message</div>') !!}
                    </div>
                </div>
                <div class="flex justify-center items-center pb-4">
                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                        Guardar Cambios
                    </button>
                    <button type="button" class="text-gray-900 inline-flex items-center bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 ms-2 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" data-modal-hide="popup-edit-{{$dish->id}}">
                        Omitir Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
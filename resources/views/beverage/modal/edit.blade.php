
<div id="popup-edit-{{$beverage->id}}" aria-hidden="true" class="fixed hidden overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" tabindex="-1">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div  class="fixed inset-0 bg-black bg-opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 px-5 py-4">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Editar bebestible</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-orange-600 dark:hover:text-white" data-modal-hide="popup-edit-{{$beverage->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <form action="{{ route('beverages.update', $beverage->id) }}" method="POST"  enctype="multipart/form-data" class="p-2">
                {{ method_field('PATCH') }}
                @csrf
                <div class="grid gap-4 pb-5 grid-cols-2">
                    <div class="col-span-2 pt-5">
                        {{ Form::label('Nombre', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                        {{ Form::text('name', $beverage->name, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-span-2 pt-5">
                        {{ Form::label('Descripcion', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                        {{ Form::text('description', $beverage->description, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-span-2 pt-5">
                        {{ Form::label('Precio', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                        {{ Form::text('price', $beverage->price, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                        {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-span-2 pt-5">
                        {{ Form::label('Alcohol', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                        {{ Form::text('alcohol', $beverage->alcohol, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' . ($errors->has('alcohol') ? ' is-invalid' : ''), 'placeholder' => 'Alcohol']) }}
                        {!! $errors->first('alcohol', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-span-2 pt-5">
                        {{ Form::label('Valoracion', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                        {{ Form::text('rating', $beverage->rating, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Valorizacion']) }}
                        {!! $errors->first('rating', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-blue-orange">
                        Guardar Cambios
                    </button>
                    <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-orange-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="popup-edit-{{$beverage->id}}">
                        Omitir cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
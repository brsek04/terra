<div id="modal-create" aria-hidden="true" class="fixed hidden overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" tabindex="-1">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="fixed inset-0 bg-black bg-opacity-20"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 px-5 py-4">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Crear sucursal</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-orange-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-orange-600 dark:hover:text-white" data-modal-toggle="modal-create">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <form id="user-form" action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data" class="p-2 md:p-5">
                {{ csrf_field() }}
                <div class="mb-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name">
                        {!! $errors->first('name', '<div class="invalid-feedback p-4  text-sm text-red-700  dark:text-red-800"">:message</div>') !!}
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email">
                        {!! $errors->first('adress', '<div class="invalid-feedback p-4 text-sm text-red-700  dark:text-red-800"">:message</div>') !!}
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password">
                        {!! $errors->first('phone', '<div class="invalid-feedback p-4  text-sm text-red-700  dark:text-red-800">:message</div>') !!}
                    </div>

                </div>
                <div class="pb-4">
                    <button id="submit-button" type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-blue-orange">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


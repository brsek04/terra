@auth
    @if(Auth::user()->hasRole('admin'))
        @include('elements.header-admin')
    @else
        @include('elements.header-user')
    @endif
@else
   @include('elements.header-user')
@endauth
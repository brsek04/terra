@auth
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/usuarios">
        <i class="fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="/roles">
        <i class="fas fa-user-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="/menus">
        <i class="fas fa-building"></i><span>Menu admin</span>
    </a>

    <!-- Mantenedores Links -->
    <a class="nav-link" href="/suppliers">
        <i class="fas fa-truck"></i><span>Suppliers</span>
    </a>
    @can('ver-compañias')
    <a class="nav-link" href="/companies">
        <i class="fas fa-building"></i><span>Companies</span>
    </a>
    @endcan

    @can('ver-ramas')
    <a class="nav-link" href="/branches">
        <i class="fas fa-code-branch"></i><span>Branches</span>
    </a>
    @endcan

    @can('ver-plato')
    <a class="nav-link" href="/dish-types">
        <i class="fas fa-utensils"></i><span>Dish Types</span>
    </a>
    <a class="nav-link" href="/dishes">
        <i class="fas fa-hamburger"></i><span>Dishes</span>
    </a>
    @endcan

    @can('ver-bebestibles')
    <a class="nav-link" href="/beverage_types">
        <i class="fas fa-wine-glass-alt"></i><span>Beverage Types</span>
    </a>
    <a class="nav-link" href="/beverages">
        <i class="fas fa-coffee"></i><span>Beverages</span>
    </a>
    @endcan
</li>
@endauth

@guest
<li class="side-menus">
    <a class="nav-link" href="/login">
        <i class="fas fa-sign-in-alt"></i><span>Login</span>
    </a>
    <a class="nav-link" href="/register">
        <i class="fas fa-user-plus"></i><span>Register</span>
    </a>
</li>
@endguest

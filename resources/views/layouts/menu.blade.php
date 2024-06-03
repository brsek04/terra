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

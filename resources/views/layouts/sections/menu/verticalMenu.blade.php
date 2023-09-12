@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo">
  <img src="https://parquesoft.com/wp-content/uploads/2020/05/PS-Sucrea.png" width="auto" height="50" alt="Descripción de la imagen">
    <a href="{{url('/pages-home')}}" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
      <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
    </a>
  </div>
  @endif

  <!-- ! Hide menu divider if navbar-full -->
  @if(!isset($navbarFull))
  <div class="menu-divider mt-0 ">
  </div>
  @endif

  <div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1 ps ps--active-y">
    @can('dashboard')
    <li class="menu-item {{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-dashboard"></i>
            <div>Panel Admistración</div>
        </a>
    </li>
    @endcan

    @can('tickets.index')
    <li class="menu-item {{ Request::is('tickets*') ? 'active' : '' }}">
        <a href="{{ route('tickets.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-dashboard"></i>
            <div>Panel Administración</div>
        </a>
    </li>
    @endcan

    @can('dashboard')
    <li class="menu-item {{ Request::is('tickets/create*') ? 'active' : '' }}">
      <a href="{{ route('tickets.create') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-comment-add"></i>
          <div>Nuevo Ticket</div>
      </a>
    </li>
    @endcan

    @can('dashboard')
    <li class="menu-item {{ Request::is('mis.tickets*','tickets.show') ? 'active' : '' }}">
      <a href="{{ route('mis.tickets') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-chat"></i>
          <div>Mis Tickets</div>
      </a>
    </li>
    @endcan

    @can('tickets.index')
    <li class="menu-item {{ Request::is('ticket_resueltos') ? 'active' : '' }}">
        <a href="{{ route('ticket_resueltos') }}" class="menu-link">
            <i class='menu-icon tf-icons bx bxs-message-check'></i>
            <div>
                @if(Auth::user()->hasRole('admin'))
                Tickets Resueltos
                @elseif(Auth::user()->hasRole('agent'))
                    Mis Tickets Resueltos
                @endif
            </div>
        </a>
    </li>
    @endcan

    @can('tickets.index')
    <li class="menu-item {{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-user"></i>
            <div>Usuarios Registrados</div>
        </a>
    </li>
    @endcan

    @can('tickets.index')
    <li class="menu-item {{ Request::is('categories*') ? 'active' : '' }}">
        <a href="{{ route('categories.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-category"></i>
            <div>Categorias</div>
        </a>
    </li>
    @endcan
</ul>



</aside>

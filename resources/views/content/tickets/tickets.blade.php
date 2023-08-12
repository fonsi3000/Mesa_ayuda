@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dahsboard')

@section('content')
<div class="row">
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-info"><i class='bx bx-edit fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Tickets abiertos</span>
        <h2 class="mb-0">{{$n_tickets}}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-warning"><i class='bx bx-dock-top fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Tickets Asignados</span>
        <h2 class="mb-0">17</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-danger"><i class='bx bx-message-square-detail fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Tickets Cerrados</span>
        <h2 class="mb-0">29</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-primary"><i class='bx bx-cube fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Usuarios</span>
        <h2 class="mb-0">{{$n_users}}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-success"><i class='bx bx-purchase-tag fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Categorias</span>
        <h2 class="mb-0">{{$n_categories}}</h2>
      </div>
    </div>
  </div>
  
</div>

<h4>Nuevos Tickets</h4>

<div>
    <div class="row">
     <div class="col-lg-12">
         
        <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Cedula</th>
                <th>Contacto o Whatsapp</th>
                <th>Categoria</th>
                <th>Titulo</th>
                <th>Datos De creacion</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($ticket as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->cedula}}</td>
                    <td>{{$ticket->contacto}}</td>
                    <td>{{$ticket->category->name}}</td>
                    <td>{{$ticket->titulo}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>
                      <a href="{{ route('tickets.show', $ticket->id )}}">Ver Ticket</a> | 
                      <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: rgba(82, 124, 236, 0.903); text-decoration: none; cursor: pointer;">Eliminar</button>
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>
  
     </div>
    </div>
  </div>
@endsection

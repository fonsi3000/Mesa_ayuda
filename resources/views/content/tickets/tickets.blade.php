@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dahsboard')

@section('content')
<div class="row">
  <div class="col-xl-4 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-info"><i class='bx bx-edit fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Tickets abiertos</span>
        <h2 class="mb-0">{{$TicketsAsignados}}</h2>
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
        <h2 class="mb-0">{{$TicketsCerrados}}</h2>
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

@if (auth()->user()->hasRole('admin'))
    <h4>Nuevos Tickets</h4>
@elseif (auth()->user()->hasRole('agent'))
    <h4>Mis Tickets</h4>
@endif

<div>
    <div class="row">
     <div class="col-lg-12">
         
        <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <caption>.</caption>
            <thead>
              <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Titulo</th>
                <th>Asignado a</th>
                <th>Datos De creacion</th>             
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($ticket as $ticket)
                @if ($ticket->respuesta === null)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->category->name}}</td>
                    <td>{{$ticket->titulo}}</td>
                    <td>{{ $ticket->agent_asignado }}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td><a href="{{ route('tickets.show', $ticket->id )}}">Ver Ticket</a></td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
  </div>
  
     </div>
    </div>
  </div>
@endsection

@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dahsboard')

@section('content')

<h4>Tickets Resueltos</h4>

<div>
    <div class="row">
     <div class="col-lg-12">
        @can('user')     
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="{{ route('mis.tickets') }}" class="btn btn-outline-dark {{ Request::is('mis.tickets') ? 'active' : '' }} {{ Route::currentRouteName() === 'mis.tickets' ? 'link-blue' : '' }}">Tickets creados</a>
          <a href="{{ route('ticket_asignado') }}" class="btn btn-outline-dark {{ Request::is('ticket_asignado') ? 'active' : '' }} {{ Route::currentRouteName() === 'ticket_asignado' ? 'link-blue' : '' }}">Tickets asignados</a>
          <a href="{{ route('ticket_resueltos') }}" class="btn btn-outline-dark {{ Request::is('ticket_resueltos') ? 'active' : '' }} {{ Route::currentRouteName() === 'ticket_cerrado' ? 'link-blue' : '' }}">Tickets cerrados</a>
      </div>
      @endcan
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
                <th>Asignado a</th>
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
                    <td>{{$ticket->agentAsignado->name}}</td>
                    <td>{{$ticket->updated_at}}</td>
                    <td><a href="{{ route('tickets.show', $ticket->id )}}">Ver Ticket</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>
  
     </div>
    </div>
  </div>

  <style>
    .btn.active {
        background-color: rgba(82, 124, 236, 0.903);
    }
  </style>
@endsection
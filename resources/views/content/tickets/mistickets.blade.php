@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Mis Tickets')

@section('content')
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

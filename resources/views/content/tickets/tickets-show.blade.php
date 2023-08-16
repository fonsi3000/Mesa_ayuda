@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Ver Ticket')

@section('content')
<div class="container-fluid h-100 mt-5 mb-5">
    <div class="row h-80">
        <div class="col-12 h-100">
            <div class="card chat-box h-100">
                <div class="card-header bg-primary text-white">Ticket ID: {{ $ticket->id }}</div>

                <div class="card-body h-100">
                    @if($ticket)
                        <div class="d-flex justify-content-between mb-3 mt-3">
                            <span><strong>Usuario:</strong> {{ $ticket->user->name }}</span>
                            <span><strong>Cédula:</strong> {{ $ticket->cedula }}</span>
                            <span><strong>Tel/WhatsApp:</strong> {{ $ticket->contacto }}</span>
                        </div>
                        <div class="mb-3">
                            <strong>Categoría:</strong> {{ $ticket->category->name }}
                        </div>
                        <div class="mb-4">
                            <strong>Título:</strong> {{ $ticket->titulo }}
                        </div>
                        <div class="chat-entry p-3 mb-3 rounded {{ (Auth::id() === $ticket->user_id) ? 'bg-light text-dark' : 'bg-primary text-white' }}">
                            {{ $ticket->descripcion }}
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex flex-column">
                                <a href="{{ Storage::url($ticket->documento_1) }}" target="_blank" class="text-primary mb-1 d-block">Ver documento 1</a>
                                <a href="{{ Storage::url($ticket->documento_2) }}" target="_blank" class="text-primary">Ver documento 2</a>
                            </div>
                        </div>
                        @if($ticket->respuesta !== null)
                            <div class="chat-entry p-3 mb-3 rounded bg-light text-dark">
                                <strong>Respuesta:</strong><br>
                                {{ $ticket->respuesta }}
                            </div>
                        
                        @endif
                        @can('admin')
                        @if($ticket->respuesta === null)
                        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}" class="btn-group" role="group" aria-label="Basic example">
                            @csrf
                            @method('PATCH')
                            <select name="agent_asignado" id="agent_asignado">
                                <option value="">Seleccionar Usuario Asignado</option>
                                @foreach ($users->filter(fn ($user) => $user->hasRole('agent')) as $user)
                                    <option value="{{ $user->id }}" {{ $ticket->agent_asignado == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Asignar Usuario</button>
                        </form>
                        @endif
                        @endcan
                        
                        
                        @can('agent')
                        @if($ticket->respuesta === null)
                        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="respuesta">Responder:</label>
                                <textarea name="respuesta" id="respuesta" class="form-control" rows="4">{{ $ticket->respuesta }}</textarea>
                            </div>
                            <input type="hidden" name="agent_asignado" value="{{ $ticket->agent_asignado }}">
                            <button type="submit" class="btn btn-primary">Responder</button>
                        </form>
                        @endif
                        @endcan
                        

                        <div class="d-flex justify-content-between">
                            <div class="ms-auto">
                                @canAny(['admin', 'agent'])
                                @if($ticket->agent_asignado === null)
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este ticket?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                  </form>
                                  @endif
                                @endcanAny
                                 
                                @if(Auth::user()->hasRole('user'))
                                    <a href="{{ route('mis.tickets') }}" class="btn btn-warning">Atras</a>
                                @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('agent'))
                                    <a href="{{ route('tickets.index') }}" class="btn btn-warning">Atras</a>
                                @endif

                            </div>
                        </div>
                        
                    @else
                        <p>Ticket no encontrado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .chat-box {
        overflow-y: auto;
    }

    .chat-entry {
        max-width: 70%;
        margin-right: auto;
    }
    .divider {
    width: 1px;
    background-color: #ccc;
    margin: 0 10px; /* Espaciado horizontal entre los elementos */
}

</style>

@endsection

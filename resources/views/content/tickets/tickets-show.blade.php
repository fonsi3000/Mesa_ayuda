@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Ver Ticket')

@section('content')
<div class="container-fluid h-100 mt-5 mb-5"> <!-- Añadido el margen inferior con "mb-5" -->
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
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ Storage::url($ticket->documento_1) }}" target="_blank" class="text-primary mb-1 d-block">Ver documento 1</a>
                                <a href="{{ Storage::url($ticket->documento_2) }}" target="_blank" class="text-primary">Ver documento 2</a>
                            </div>
                            <button class="btn btn-secondary">Mi Botón</button>
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
</style>

@endsection

@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Enviar Tickets')

@section('content')

<div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Nuevo ticket</h5> 
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Numero de Cedula de ciudadania</label>
              <input type="int" name="cedula" required class="form-control" id="basic-default-fullname" placeholder="N° de cedula" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Numero de telefono o Whatsapp</label>
                <input type="int" name="contacto" required class="form-control" id="basic-default-fullname" placeholder="3108569546" />
              </div>
            
              <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach($categories as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>  <!-- Asumo que tienes un campo 'nombre' en el modelo Category -->
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Titulo</label>
                <input type="int" name="titulo" required class="form-control" id="basic-default-fullname" placeholder="Tutulo del problema" />
              </div>

              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Ticket</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required placeholder="Escribe la descripción del ticket..."></textarea>
            </div>
            <!-- Campo para subir Documento 1 -->
            <div class="mb-3">
                <label for="documento_1" class="form-label">Documento 1</label>
                <input type="file" name="documento_1" id="documento_1" class="form-control" >
            </div>

            <!-- Campo para subir Documento 2 -->
            <div class="mb-3">
                <label for="documento_2" class="form-label">Documento 2</label>
                <input type="file" name="documento_2" id="documento_2" class="form-control" >
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div> 
</div>

@endsection

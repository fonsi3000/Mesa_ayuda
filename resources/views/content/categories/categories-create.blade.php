@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Categorias')

@section('content')
<div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Creando Nueva Categoria</h5> 
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nombre de la categoria</label>
              <input type="text" name="name" required class="form-control" id="basic-default-fullname" placeholder="hardware" />
            </div>
          
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div> 
</div>

@endsection

@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Editando Usuario</h5> 
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">


            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nombre Completo</label>
              <input type="text" name="name" value="{{$user->name}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
            </div>
          
            <div class="mb-3">
              <label class="form-label" for="basic-default-email">Correo Electronico</label>
              <div class="input-group input-group-merge">
                <input type="text" name="email"  value="{{$user->email}}" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
             
              </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-password">Contraseña nueva</label>
                <input type="password" name="new_password" id="basic-default-password" class="form-control phone-mask" placeholder="Contraseña" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="role">Rol</label>
              <select class="form-control" id="role" name="role">
                @foreach($roles as $role)
                  <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                    {{ $role->name }}
                  </option> 
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Seleccione las Categorias que le asignara a este usuario</label>
              <div class="form-check">
                  @foreach ($categories as $category)
                  <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
                      {{ in_array($category->id, $user->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                  <label class="form-check-label">
                      {{ $category->name }}
                  </label><br>
                  @endforeach
              </div>
          </div>
      
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </form>
        </div>
      </div> 
</div>



@endsection

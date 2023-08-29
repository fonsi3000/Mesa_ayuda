@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Categorias')

@section('content')
<div>
    <div class="row">
     <div class="col-lg-12">
         
        <div class="card">
   <div class="table-responsive text-nowrap">
    @can('admin')  
     <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear Nueva Categoria</a>
     @endcan 
     <table class="table">
      <caption></caption>
       <thead>
         <tr>
           <th>Id</th>
           <th>Nombre</th>
           <th>Fecha de creacion</th>
           <th>Actions</th>
         </tr>
       </thead>
       <tbody class="table-border-bottom-0">
  
             @foreach ($categories as $categories)
                 <tr>
                     <td>{{$categories->id}}</td>
                     <td>{{$categories->name}}</td>
                     <td>{{$categories->created_at}}</td>
                     @can('admin')   
                     <td>
                       <a href="{{ route('categories.show', $categories->id )}}">Editar</a> 
                       
                       | 
                       <form action="{{ route('categories.destroy', $categories->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: rgba(82, 124, 236, 0.903); text-decoration: underline; cursor: pointer;">Eliminar</button>
                      </form>
                      
                     </td>
                     @endcan 
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

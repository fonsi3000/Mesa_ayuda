@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Categorias')

@section('content')
<div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Editando Categoria</h5> 
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.update', $categories->id) }}">

            @csrf
            @method('PUT')
            <input type="hidden" name="category_id" value="{{$categories->id}}">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nombre de categoria</label>
              <input type="text" name="name" value="{{$categories->name}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div> 
</div>



@endsection

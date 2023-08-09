@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<h4>Dashboard</h4>
<div class="row">
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-info"><i class='bx bx-edit fs-3'></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Tickets abiertos</span>
          <h2 class="mb-0">48</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-warning"><i class='bx bx-dock-top fs-3'></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Tickets Asignados</span>
          <h2 class="mb-0">17</h2>
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
          <h2 class="mb-0">29</h2>
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
@endsection

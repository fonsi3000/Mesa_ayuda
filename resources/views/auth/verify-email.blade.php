@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Verify Email')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">

    <div class="authentication-wrapper authentication-cover">
      <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
          <div class="flex-row text-center " style="margin-left: -110px;">
            <!-- INICIO CARROUSEL -->
            <div class="container">
        
         <div class=" px-0" style="width: 106%;">
          <div class="carousel slide" data-ride="carousel">
            <!-- Indicadores -->
            <ul class="carousel-indicators">
              <li data-target=".carousel" data-slide-to="0" class="active"></li>
              <li data-target=".carousel" data-slide-to="1"></li>
              <li data-target=".carousel" data-slide-to="2"></li>
            </ul>
    
            <!-- Imágenes -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('assets/img/pages/img1.png') }}" alt="Imagen 1">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/pages/img2.png') }}" alt="Imagen 2">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/pages/img3.png') }}" alt="Imagen 3">
              </div>
            </div>
    
            <!-- Controles -->
            <a class="carousel-control-prev" href=".carousel" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href=".carousel" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
      </div>
    
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
            <!-- FIN CARROUSEL -->
          </div>
        </div>
        <!-- /Left Text -->

    <!--  Verify email -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-4 p-sm-5">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4">
          <img src="https://parquesoft.com/wp-content/uploads/2020/05/PS-Sucrea.png" width="auto" height=70 alt="Imagen centrada" class="center">
        </div>
        <!-- /Logo -->

        <h4 class="mb-3">Verifica tu correo electrónico ✉️</h4>

        @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success" role="alert">
          <div class="alert-body">
            Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.
          </div>
        </div>
        @endif
        <p class="text-start">
          Enlace de activación de cuenta enviado a su dirección de correo electrónico: <strong>{{Auth::user()->email}}</strong> Siga el enlace que se encuentra dentro para continuar.
        </p>
        <div class="mt-4 d-flex justify-content-between">
          <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-label-secondary">
              haga clic aquí para solicitar otro
            </button>
          </form>

          <form method="POST" action="{{route('logout')}}">
            @csrf

            <button type="submit" class="btn btn-danger">
              Cerrar sesión
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- /Verify Email -->
  </div>
</div>
@endsection
@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', '2 Factor Challenge')

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

    <!-- Two Steps Verification -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-4 p-sm-5">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4">
          <img src="https://parquesoft.com/wp-content/uploads/2020/05/PS-Sucrea.png" width="auto" height=70 alt="Imagen centrada" class="center">
        </div>
        <!-- /Logo -->
        <h4 class="mb-3">Verificación en dos pasos 💬</h4>
        <div x-data="{ recovery: false }">
          <div class="mb-3" x-show="! recovery">
            Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación de autenticación.
          </div>

          <div class="mb-3" x-show="recovery">
            Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.
          </div>

          <x-jet-validation-errors class="mb-1" />

          <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf

            <div class="mb-3" x-show="! recovery">
              <x-jet-label class="form-label" value="{{ __('Code') }}" />
              <x-jet-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
              <x-jet-input-error for="code"></x-jet-input-error>
            </div>

            <div class="mb-3" x-show="recovery">
              <x-jet-label class="form-label" value="{{ __('Recovery Code') }}" />
              <x-jet-input class="{{ $errors->has('recovery_code') ? 'is-invalid' : '' }}" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
              <x-jet-input-error for="recovery_code"></x-jet-input-error>
            </div>

            <div class="d-flex justify-content-end mt-2">
              <button type="button" class="btn btn-outline-secondary me-1" x-show="! recovery" x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus()})">Use a recovery code
              </button>

              <button type="button" class="btn btn-outline-secondary me-1" x-show="recovery" x-on:click=" recovery = false; $nextTick(() => { $refs.code.focus() })">
                Utilice un código de autenticación
              </button>

              <x-jet-button>
                Log in
              </x-jet-button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Two Steps Verification -->
  </div>
</div>
@endsection
@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Confirm Password')

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
    <!--  password confirm -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4">
          <a href="{{url('/')}}" class="app-brand-link gap-2 mb-2">
            <span class="app-brand-logo demo">@include('_partials.macros')</span>
            <span class="app-brand-text demo h3 mb-0 fw-bold">{{ config('variables.templateName') }}</span>
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-3">Confirm Password</h4>
        <p class="text-start mb-4">Please confirm your password before continuing.</p>
        <p class="mb-0 fw-semibold">Type your 6 digit security code</p>
        <form id="twoStepsForm" action="{{ route('password.confirm') }}" method="POST">
          @csrf
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Your Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer">
                <i class="bx bx-hide"></i>
              </span>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
            Confirm Password
          </button>
        </form>

        <p class="text-center mt-2">
          @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
          @endif
        </p>
      </div>
    </div>
    <!-- / password confirm -->
  </div>
</div>
@endsection
@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Register Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- Carrusel a la izquierda -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
            <!-- INICIO CARROUSEL -->
      <div class="container">
        <div class="px-0">
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
                <img src="{{ asset('assets/img/pages/img1.png') }}" alt="Imagen 1" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/pages/img2.png') }}" alt="Imagen 2" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/pages/img3.png') }}" alt="Imagen 3" class="d-block w-100">
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
      <!-- FIN CARROUSEL -->
    </div>
    
    
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">

      <!-- Register Card -->
      <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">

        <!-- Forgot Password -->
    <div class="w-px-400 mx-auto">
      <!-- Logo -->
      <div class="app-brand justify-content-center mb-4">
        <img src="https://parquesoft.com/wp-content/uploads/2020/05/PS-Sucrea.png" width="auto" height=70 alt="Imagen centrada" class="center">
      </div>
      <!-- /Logo -->

    <!-- Register Card -->
    <h4 class="mb-2">Crea una cuenta 🚀</h4>
    

    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Nombre Completo</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" placeholder="johndoe" autofocus value="{{ old('name') }}" />
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electronico</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" />
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Contraseña</label>
        <div class="input-group input-group-merge @error('password') is-invalid @enderror">
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

      <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password-confirm">Confirmar Contraseña</label>
        <div class="input-group input-group-merge">
          <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
          <span class="input-group-text cursor-pointer">
            <i class="bx bx-hide"></i>
          </span>
        </div>
      </div>
      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
      <div class="mb-1">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="terms" name="terms" />
          <label class="form-check-label" for="terms">
            I agree to the
            <a href="{{ route('terms.show') }}" target="_blank">
              terms_of_service
            </a> and
            <a href="{{ route('policy.show') }}" target="_blank">
              privacy_policy
            </a>
          </label>
        </div>
      </div>
      @endif
      <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
    </form>

    <p class="text-center mt-2">
      <span>¿Ya tienes una cuenta?</span>
      @if (Route::has('login'))
      <a href="{{ route('login') }}">
        <span>Inicia sesión en su lugar</span>
      </a>
      @endif
    </p>

    <div class="divider my-4">
      <div class="divider-text">or</div>
    </div>

    <div class="d-flex justify-content-center">
      <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
        <i class="tf-icons bx bxl-facebook"></i>
      </a>

      <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
        <i class="tf-icons bx bxl-google-plus"></i>
      </a>

      <a href="javascript:;" class="btn btn-icon btn-label-twitter">
        <i class="tf-icons bx bxl-twitter"></i>
      </a>
    </div>
  </div>
</div>
<!-- Register Card -->
    
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

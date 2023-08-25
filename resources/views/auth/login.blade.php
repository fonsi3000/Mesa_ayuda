@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Inicio')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
      <div class="flex-row text-center mx-auto">
        {{-- <img src="{{asset('assets/img/pages/login-'.$configData['style'].'.png')}}" alt="Auth Cover Bg color" width="520" class="img-fluid authentication-cover-img" data-app-light-img="pages/login-light.png" data-app-dark-img="pages/login-dark.png"> --}}
        <!-- INICIO CARROUSEL -->
        <div class="container">
    <h2>Carrusel de Imágenes (Automático)</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicadores -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- Imágenes -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagen1.jpg" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="imagen2.jpg" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="imagen3.jpg" alt="Imagen 3">
            </div>
        </div>

        <!-- Controles -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Iniciar el carrusel automáticamente cada 2 segundos
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 2000 // Cambiar cada 2 segundos
        });
    });
</script>
        <!-- FIN CARROUSEL -->
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4">
          <a href="{{url('/')}}" class="app-brand-link gap-2 mb-2">

          </a>
        </div>
        <!-- /Logo -->
        <head>

          <style>
              .center {
                  display: block;
                  margin: 0 auto;
              }
          </style>
      </head>
      <body>
      <!-- Imagen Centrada -->
      <img src="https://parquesoft.com/wp-content/uploads/2020/05/PS-Sucrea.png" width="auto" height=70 alt="Imagen centrada" class="center">

      <br>

        <h4 class="mb-2">Bienvenido. 👋</h4>
        <p class="mb-4">Inicia sesión en tu cuenta y comienza la aventura.

        @if (session('status'))
        <div class="alert alert-success mb-1 rounded-0" role="alert">
          <div class="alert-body">
            {{ session('status') }}
          </div>
        </div>
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="login-email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="john@example.com" autofocus value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Contraseña</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>¿Olvido su contraseña?</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember-me">
                Recordarme
              </label>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100" type="submit">Iniciar sesión</button>
        </form>

        <p class="text-center">
          <span>¿Nuevo en nuestra plataforma?</span>
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>Crear una cuenta</span>
          </a>
          @endif
        </p>

        <div class="divider my-4">
          <div class="divider-text">o</div>
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
    <!-- /Login -->
  </div>
</div>
@endsection

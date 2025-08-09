@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container-fluid justify-content-center align-items-center">
    <div class="row boxes">
        <div class="col box1">
            <div class="card" id="login" >
                <div class="card-body">
                    <h5 class="card-title">Inicio de sesión</h5>

                    <form id="form-login" action="{{ route('login') }}" method="POST">
                        @csrf

                        <label for="email" class="form-label">Correo Electronico</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="Ingresa tu correo electronico" aria-label="email" aria-describedby="visible-addon">
                        </div>

                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Ingresa tu contraseña" aria-label="email" aria-describedby="visible-addon">
                        </div>

                        <button type="submit" class="btn btn-primary login">
                            Iniciar sesión
                        </button>

                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col box2">
             <div class="card" id="login" >
                <div class="card-body">
                    <div id="Bienvenida">
                        <h1 class="fade-in">Bienvenido</h1>
                        <p class="fade-in delay-1">Estamos listos para brindarte lo mejor. ¡Comencemos!</p>
                    </div>
                </div>
             </div>
        </div>

    </div>

</div>

@endsection

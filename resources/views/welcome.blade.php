@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">INICIO DE SESION</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="justify-content-center">
                        <a class="btnLogIn btn btn-success">Iniciar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/auth/login.js') }}"></script>
@endsection

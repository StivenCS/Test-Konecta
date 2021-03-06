@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="col-md-5">
                    <button class="create btn btn-info" title="Agregar Usuario" data-toggle='modal' data-target='#User'>
                            <svg style="height: 30px" class="w-1 h-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Crear usuario
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                @csrf
                <input type="text" class="form-control" id="searchUser" placeholder="Buscar usuario">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="bg-info">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="usersTable">
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="User" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="titleModalUser">Crear Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="updateID" hidden>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name"
                                    autofocus>
                            </div>
                        </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Tipo</label>
                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Seleccione el tipo de usuario</option>
                                        <option value="Seller">Vendedor</option>
                                        <option value="Admin">Administrador</option>
                                    </select>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" required
                                    autocomplete="email">
                            </div>
                        </div>



                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar
                                    contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                            </div>

                        <div class="form-group row justify-content-center mb-0" id="createButtonContent">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" data-dismiss="modal" class="addUser btn btn-success">
                                    Registrar
                                </button>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center mb-0" id="updateButtonContent" hidden>
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="btnUpdateUser" data-dismiss="modal" class="btn btn-success">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/users/common.js') }}"></script>
    <script src="{{ asset('js/users/store.js') }}"></script>
    <script src="{{ asset('js/users/update.js') }}"></script>
    <script src="{{ asset('js/users/delete.js') }}"></script>
@endsection

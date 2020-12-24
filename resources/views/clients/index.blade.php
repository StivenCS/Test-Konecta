@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="col-md-4">
                    <button class="create btn btn-info" title="Agregar Cliente" data-toggle='modal' data-target='#Client'>
                        Crear cliente
                    </button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="bg-info">
                    <tr>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="clientsTable">
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="Client" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="titleModalClient">Crear Cliente</h5>
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
                            <label for="document" class="col-md-4 col-form-label text-md-right">Documento</label>
                            <div class="col-md-6">
                                <input id="document" type="number" class="form-control" name="document" required
                                    autocomplete="document" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direction" class="col-md-4 col-form-label text-md-right">Direccion</label>

                            <div class="col-md-6">
                                <input id="direction" type="text" class="form-control" name="direction"
                                    required autocomplete="direction">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" required
                                    autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0" id="createButtonContent">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" data-dismiss="modal" class="addClient btn btn-success">
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center mb-0" id="updateButtonContent" hidden>
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="btnUpdateClient" data-dismiss="modal" class="btn btn-success">
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
    <script src="{{ asset('js/clients/common.js') }}"></script>
    <script src="{{ asset('js/clients/store.js') }}"></script>
    <script src="{{ asset('js/clients/update.js') }}"></script>
    <script src="{{ asset('js/clients/delete.js') }}"></script>
@endsection

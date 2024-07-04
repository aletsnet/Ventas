@extends('layouts.theme')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sistema</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fas fa-table"></i> Perfil de usuario</h3>
                </div>
                <div class="card-body">
                    <form action="javascript:void(0);">
                        <div class="row">
                            <div class="col-12" id="captura_error" style="display: none;">
                                <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i><strong>Error</strong> - Se ha producido un error al Guardar
                                    <span>
                                        <strong class="error_message"> Error</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="photo" class="form-label">Foto:</label>
                                <input id="photo" type="image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Nombre:</label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Nombre completo" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="email" class="form-label">Correo electronico:</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Correo electronico">
                                <input type="hidden" id="id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Contraseña:</label>
                                <input id="password" type="password" class="form-control " name="password" placeholder="Confirmar Contraseña:" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="password_confirm" class="form-label">Confirmar:</label>
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña:" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="rol" class="form-label">Roles:</label>
                                <label for="rol" class="form-control">{{ $row->roles->nombre }}</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-end">
                            <button type="button" class="btn btn-primary" onclick="save_item()"><i class="fa fa-save "></i> Guadar </button>
                            <button type="button" class="btn btn-danger btnclose" data-bs-dismiss="modal" ><i class="fa fa-times"></i>  Cerrar </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.simple')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro</h1>
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
                    <h3 class="card-title"> <i class="fas fa-table"></i> Validación de email pendiente</h3>
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
                            <div class="col-gl-6 col-md-9 col-sm-12">
                                <label for="email" class="form-label">Email:</label>
                                <input id="email" type="text" class="form-control" name="email" placeholder="Nombre completo" required autocomplete="name" autofocus value="{{ $row->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-gl-6 col-md-9 col-sm-12 p-2">
                                <div class="alert alert-warning" role="alert">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Importante <h4>
                                    
                                        Si el correo no te ha llegado a tu bandeja de entrada, revisa si no esta en la bandeja de correo no deseados o spam
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="col-md-6 col-sm-12 text-end">
                            <button type="button" class="btn btn-primary" onclick="enviar()" data-toggle="modal" data-target="#modalStatus">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                Reenviar
                            </button>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalStatus" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enviando correo</h5>
            </div>
            <div class="modal-body">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Enviando, espere por favor
            </div>
            <div class="modal-footer">
                <button type="button" id="btnEnviar" class="btn btn-secondary" data-dismiss="modal" style="display: none;">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

const enviar = () => {
    const form = document.getElementById("modalStatus");
    const email = document.getElementById("email");

        param = {
            email : email.value
        };

        let ruta = '{!! route('reenvio.email') !!}';
        let metodo = 'post';
        axios({
            method: metodo,
            url: ruta,
            data: param
            }).then( function (result) {
                    form.getElementId("btnEnviar").click();
                })
            .catch(function (error) {
                console.log(error);
            });
        
}

</script>
@endsection
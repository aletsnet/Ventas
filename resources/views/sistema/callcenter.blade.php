@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Catalogos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sistema</a></li>
                    <li class="breadcrumb-item"><a href="#">Catalogos</a></li>
                    <li class="breadcrumb-item active">CallCenter</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-default" id="showInventario">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fas fa-table"></i> Lista de CallCenter</h3>
                </div>
                <div class="card-body">
                    <form id="search_form" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-12" id="msj_general">
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <div class="alert_mensaje"> Espere ...</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group m-1">
                                    <button type="button" class="btn btn-primary" id="newRow" name="newRow" data-bs-toggle="modal" data-bs-target="#modalForm"  onclick="new_item()">
                                    <i class="fa fa-plus "></i>  Nuevo
                                    </button>
                                    <input type="text" id="search" name="search" class="form-control" onkeypress="clickPress(event)" value = "{{ $search ?? ''}}">
                                    <button type="button" class="btn btn-success " onclick = 'search_table();'>
                                        <i class="fa fa-search "></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-striped-columns mb-0">
                            <thead class="table-light" >
                                <tr>
                                    <th scope="col">
                                        Nombre
                                    </th>
                                    <th scope="col">
                                        Tools
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        No hay elementos a mostrar
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <!-- Pagination Small -->
                            <nav aria-label="botones">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body showForm" id="showFormError">
                <div class="card border card-border-danger">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Captura</h6>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show" role="alert">
                            <i class="ri-error-warning-line label-icon"></i><strong>Error</strong> - Se ha producido un error
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="modal-body showForm" id="showFormLoading">
                <div class="card border card-border-warning">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Captura</h6>
                    </div>
                    <div class="card-body">
                        <!-- Warning Alert -->
                        <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label fade show" role="alert">
                            <i class="ri-alert-line label-icon"></i>
                            <strong>Espere</strong> se estan cargando los datos 
                            <div class="spinner-border text-warning text-right" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="modal-body showForm" id="showFormCaptura">
                <div class="card border card-border-success">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Captura</h6>
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
                                    <label for="callcenter" class="form-label">CallCenter:</label>
                                    <input type="text" class="form-control" name="callcenter" id="callcenter" placeholder="Nombre del CallCenter">
                                    <input type="hidden" id="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="direccion" class="form-label">Dirección:</label>
                                    <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección del CallCenter"></textarea>
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
</div>
@endsection

@section('script')
<script src="{{ url('js/general.js') }}"></script>

<script>
        const clickPress = (event) => {
        if (event.key == "Enter") {
            search_table(1);
        }
    }

    const new_item = () => {
        //chulada
        display_elemento_modal("showForm",2);
        const form = document.getElementById("showFormCaptura");
        const elements = form.getElementsByClassName("form-control");
        const selects = form.getElementsByClassName("form-select");
        const error_show = document.getElementById("captura_error");
        const id_row = document.getElementById("id");

        error_show.style="display: none;";

        for(let i=0; i<elements.length; i++){
            const obj = elements.item(i);
            obj.className = "form-control";
            obj.value = "";
        }

        for(let i=0; i<selects.length; i++){
            const obj = selects.item(i);
            obj.className = "form-select";
            obj.value = "";
        }

        id_row.value="";

        display_elemento_modal("showForm",3);
    }

    const save_item = () => {
        display_elemento_modal("showForm",2);
        const form = document.getElementById("showFormCaptura");
        const elements = form.getElementsByClassName("form-control");
        const selects = form.getElementsByClassName("form-select");
        const error_show = document.getElementById("captura_error");
        const id_row = document.getElementById("id");
        const btnclose = form.getElementsByClassName("btnclose");

        error_show.style="display: none;";

        for(let i=0; i<elements.length; i++){
            const obj = elements.item(i);
            obj.className = "form-control";
        }

        for(let i=0; i<selects.length; i++){
            const obj = selects.item(i);
            obj.className = "form-select";
        }

        param = {
            callcenter : elements.callcenter.value,
            direccion : elements.direccion.value,
            id : id_row.value,
        };

        let ruta = id_row.value != "" ? '{!! asset('call') !!}/' + id_row.value : '{!! route('call.store') !!}';
        let metodo = id_row.value != "" ? 'put' : 'post';
        axios({
            method: metodo,
            url: ruta,
            data: param
            }).then( function (result) {
                    id_row.value = result.data.id;
                    search_table();
                    display_elemento_modal("showForm",3);
                    btnclose[0].click();
                })
            .catch(function (error) {
                error_show.style="display: normal;";
                const message = error_show.getElementsByClassName("error_message");
                
                if(typeof error.response == 'undefined'){
                    console.log(error);
                    message[0].innerHTML = 'Error JS';
                }else{
                    const err = error.response.data.errors;
                    let tmp_message = "";
                    display_elemento_modal("showForm",3);
                    for(let i in err) {
                        console.log(i);
                        if(typeof elements[i] != "undefined" ){
                            elements[i].className = "form-control is-invalid";
                            tmp_message += '<li>' + err[i] + '</li>'
                        }else{
                            selects[i].className = "form-select is-invalid";
                            tmp_message += '<li>' + err[i] + '</li>'
                        }
                        
                        console.log(err[i])
                    }

                    message[0].innerHTML = '<ul>' + tmp_message + '</ul>';
                }
            });
        
    }

    const search_table = (page) => {
        document.documentElement.setAttribute("data-preloader", "enable");
        const buscar = document.getElementById("search");

        alert_mensaje("msj_general", "Cargando datos ...", true);
        
        axios.get('{!! asset('call') !!}' + (buscar.value != "" ? "/s/"+buscar.value : "/s/@"), {})
            .then(
                function (result) {
                    const cols = {
                        col1:['callcenter', 'CallCenter'],
                        col2:['direccion', 'Dirección'],
                        tools:[{
                            col:"*",
                            type:"button",
                            label:"Editar",
                            function:"edit_item(?)",
                            param:'id',
                            propiedades:' data-bs-toggle="modal" data-bs-target="#modalForm" ',
                            class:"btn btn-primary m-1",
                            icon:"fa fa-edit"
                        },{
                            col:"*",
                            type:"button",
                            label:"Eliminar",
                            function:"delete_item(?)",
                            param:'id',
                            propiedades:'',
                            class:"btn btn-danger m-1",
                            icon:" fa fa-trash  "
                        }]
                    }
                    load_table("showInventario",cols,result.data);
                    alert_mensaje("msj_general", "Cargando datos ...", false);
                }
            )
            .catch(function (error) {
                console.log(error);
                alert_mensaje("msj_general", "Cargando datos ...", false);
            });
    }
    
    const edit_item = (id) => {
        display_elemento_modal("showForm",2);
        const form = document.getElementById("showFormCaptura");
        const elements = form.getElementsByClassName("form-control");
        const selects = form.getElementsByClassName("form-select");
        const error_show = document.getElementById("captura_error");
        const id_row = document.getElementById("id");

        error_show.style="display: none;";

        for(let i=0; i<elements.length; i++){
            const obj = elements.item(i);
            obj.className = "form-control";
            obj.value = "";
        }

        for(let i=0; i<selects.length; i++){
            const obj = selects.item(i);
            obj.className = "form-select";
            obj.value = "";
        }

        id_row.value="";

        let ruta = '{!! asset('call') !!}/' + id;
        let metodo = 'get';
        axios({
            method: metodo,
            url: ruta,
            data: {}
            }).then( function (result) {
                    elements.callcenter.value = result.data.callcenter;
                    elements.direccion.value = result.data.direccion;
                    id_row.value = result.data.id;

                    display_elemento_modal("showForm",3);
                })
            .catch(function (error) {
                error_show.style="display: normal;";
                const err = error.response.data.errors;
                const message = error_show.getElementsByClassName("error_message");
                let tmp_message = "";
                display_elemento_modal("showForm",3);
                
                message[0].innerHTML = '<ul>' + tmp_message + '</ul>';
            });

        display_elemento_modal("showForm",3);
    }

    const delete_item = (id) => {
        
        if(confirm("¿Está seguro de eliminar este registro ?")){
            document.documentElement.setAttribute("data-preloader", "enable");
            axios.delete('{!! url('call') !!}/' + id, {})
                .then(
                    function (result) {
                        document.documentElement.setAttribute("data-preloader", "disable");
                        search_table();
                    }
                )
                .catch(function (error) {
                    console.log(error);
                    document.documentElement.setAttribute("data-preloader", "disable");
                    search_table();
                });
        }
    }

    setTimeout(function(){ search_table();}, 1000);

</script>
@endsection
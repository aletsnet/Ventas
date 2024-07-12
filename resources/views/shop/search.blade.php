@extends('layouts.theme')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tiendas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Tiendas</li>
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
                    <h3 class="card-title"> <i class="fas fa-table"></i> Lista de Tiendas</h3>
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
                                <div class="col-4 text-center">
                                    <label for="logo" class="form-label">Logo:</label>
                                    <img id="logo-img" src="{!! asset("/image/shop_default.png") !!}" class="img-fluid" alt="" accept="image/jpeg, image/png">
                                    <input id="logo-file" type="file" class="form-control" name="logo-file" autofocus style="display: none;">
                                    <input id="logo" type="hidden" class="form-control" name="logo" autofocus style="display: none;">
                                    <button id="logo-button" type="button" class="btn btn-primary"> <i class="fa fa-image"></i> Subir logo</button>
                                </div>
                                <div class="col-8">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre de la tienda" required autocomplete="name" autofocus>
                                    <input type="hidden" id="id">
                                    <label for="telefono" class="form-label">Teléfono:</label>
                                    <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Teléfono" required autocomplete="name" autofocus>
                                    <label for="direccion" class="form-label">Dirección:</label>
                                    <textarea name="direccion" id="direccion" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="ticket_head" class="form-label">Cabecera de ticket:</label>
                                    <textarea name="ticket_head" id="ticket_head" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="ticket_foot" class="form-label">Pie del ticket:</label>
                                    <textarea name="ticket_foot" id="ticket_foot" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="ticket_css" class="form-label">Css del ticket:</label>
                                    <textarea name="ticket_css" id="ticket_css" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                @if ($contrato )
                                <div class="col">
                                    <label for="contrato" class="form-label">Contrato:</label>
                                    <select name="contrato" id="contrato" class="form-select" placeholder="Contrato">
                                        @isset($contratos)
                                            @foreach ($contratos as $key => $item)
                                                <option value="{{ $item->id }}"> {{ $item->nombre }} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                @endif
                                <div class="col">
                                    <label for="giro" class="form-label">Giro de la tienda:</label>
                                    <select name="giro" id="giro" class="form-select" placeholder="Giros">
                                        @isset($giros)
                                            @foreach ($giros as $key => $item)
                                                <option value="{{ $item->id }}"> {{ $item->nombre }} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="estado" class="form-label">Estado:</label>
                                    <select name="estado" id="estado" class="form-select" placeholder="Estados">
                                        @isset($estados)
                                            @foreach ($estados as $key => $item)
                                                <option value="{{ $item->id }}"> {{ $item->nombre }} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="municipio" class="form-label">Municipios:</label>
                                    <select name="municipio" id="municipio" class="form-select" placeholder="Municipios">
                                        
                                    </select>
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

<div class="modal fade" id="modalUsers" tabindex="-2" aria-labelledby="modalmodalUsersLabel" aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body showUser" id="showUserError">
                <div class="card border card-border-danger">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Usuarios de la tienda</h6>
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
            <div class="modal-body showUser" id="showUserLoading">
                <div class="card border card-border-warning">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Usuarios de la tienda</h6>
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
            <div class="modal-body showUser" id="showUserCaptura">
                <div class="card border card-border-success">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Usuarios de la tienda</h6>
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
                                <table class="table">

                                </table>
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
    const buscar = document.getElementById("search");
    const form = document.getElementById("showFormCaptura");
    const elements = document.getElementsByClassName("form-control");
    const selects = document.getElementsByClassName("form-select");
    const captura_error = document.getElementById("captura_error");
    const msj_general = document.getElementById("msj_general");
    const id_row = document.getElementById("id");
    const logo_button = document.getElementById("logo-button");
    const logo_img = document.getElementById("logo-img");
    const logo_file = document.getElementById("logo-file");
    
    let ldefault = "";

    const search_municipios = async (valor) => {
        const param = {
            tabla: 'municipios', 
            campos: [{campo:'id'},{campo:'nombre'}], 
            where: [{campo:'estado', condicional:'=', valor: selects.estado.value}], 
            order: "municipio",
            option: valor,
        };
        await load_list('municipio','{!! \asset('lists') !!}', param);
        //selects.municipio.value = valor;
        //console.log(selects.municipio.value + " - " + ldefault);
    }

    const file_logo = async () => {
        const formData = new FormData();
        formData.append('file', logo_file.files[0]);
        const r = await axios.post('{!! route('file.logo') !!}', formData, { headers: { 'Content-Type': 'multipart/form-data'} });
        if(typeof r.data.url == "string"){
            logo_img.src = "{!! asset('images') !!}/" + r.data.url;
            elements.logo.value = r.data.url;
        }
    }

    selects.estado.addEventListener('change', () => search_municipios() );
    logo_button.addEventListener('click', () => elements['logo-file'].click() );
    logo_img.addEventListener('click', () => elements['logo-file'].click() );
    elements['logo-file'].addEventListener('change', () => file_logo() );

    const clickPress = (event) => {
        if (event.key == "Enter") {
            search_table(1);
        }
    }
    
    const new_item = () => {
        //chulada
        display_elemento_modal("showForm",2);
        captura_error.style="display: none;";

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
        const captura_error = document.getElementById("captura_error");
        const id_row = document.getElementById("id");
        const btnclose = form.getElementsByClassName("btnclose");

        captura_error.style="display: none;";

        for(let i=0; i<elements.length; i++){
            const obj = elements.item(i);
            obj.className = "form-control";
        }

        for(let i=0; i<selects.length; i++){
            const obj = selects.item(i);
            obj.className = "form-select";
        }

        param = {
            nombre : elements.nombre.value,
            telefono : elements.telefono.value,
            logo : elements.logo.value,
            direccion : elements.direccion.value,
            ticket_head : elements.ticket_head.value,
            ticket_foot : elements.ticket_foot.value,
            ticket_css : elements.ticket_css.value,
            sesion_compartido : 1,
            contrato : selects.contrato.value,
            giro : selects.giro.value,
            estado : selects.estado.value,
            municipio : selects.municipio.value,
            @php if($contrato) { echo 'contrato: selects.contrato.value,';} @endphp
            
            id : id_row.value,
        };

        let ruta = id_row.value != "" ? '{!! asset('shops') !!}/' + id_row.value : '{!! route('shops.store') !!}';
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
                captura_error.style="display: normal;";
                const message = captura_error.getElementsByClassName("error_message");
                
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
        
        axios.get('{!! asset('shops') !!}' + (buscar.value != "" ? "?search="+buscar.value : "?search=@"), {})
            .then(
                function (result) {
                    const cols = {
                        col0:['contrato.nombre', 'Contratos'],
                        col1:['estado.nombre,municipio.nombre', 'Lugar'],
                        col2:['nombre', 'Tienda'],
                        col3:['telefono', 'Teléfono'],
                        col4:['giro.nombre', 'Giro'],
                        tools:[{
                            col:"*",
                            type:"button",
                            label:"",
                            function:"edit_item(?)",
                            param:'id',
                            propiedades:' data-bs-toggle="modal" data-bs-target="#modalForm" ',
                            class:"btn btn-primary m-1",
                            icon:"fa fa-edit"
                        },{
                            col:"*",
                            type:"button",
                            label:"",
                            function:"users_item(?)",
                            param:'id',
                            propiedades:' data-bs-toggle="modal" data-bs-target="#modalUsers" ',
                            class:"btn btn-info m-1",
                            icon:"fa fa-users"
                        },{
                            col:"*",
                            type:"button",
                            label:"",
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
        captura_error.style="display: none;";

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

        let ruta = '{!! asset('shops') !!}/' + id;
        let metodo = 'get';
        axios({
            method: metodo,
            url: ruta,
            data: {}
            }).then( function (result) {
                    id_row.value = result.data.id;
                    logo_img.src = "{!! asset('images') !!}/" + result.data.logo;
                    for(let i in result.data){
                        if(typeof selects[i] == "object"){
                            selects[i].value = result.data[i];
                        }else{
                            if (typeof elements[i] == "object") {
                                elements[i].value = result.data[i];
                            }
                        }
                        
                    }
                    ldefault = result.data.municipio;
                    search_municipios(ldefault);
                    selects.municipio.value = result.data.municipio;
                    display_elemento_modal("showForm",3);
                })
            .catch(function (error) {
                captura_error.style="display: normal;";
                const message = captura_error.getElementsByClassName("error_message");
                
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

        display_elemento_modal("showForm",3);
    }

    const users_item = async (valor) => {
        /*const param = {
            tabla: 'userd', 
            campos: [{campo:'id'},{campo:'email'}], 
            where: [{campo:'contrato', condicional:'=', valor: selects.estado.value}], 
            order: "municipio",
            option: valor,
        };*/
        //await load_list('municipio','{!! \asset('lists') !!}', param);
        //selects.municipio.value = valor;
        //console.log(selects.municipio.value + " - " + ldefault);
        display_elemento_modal("showUser",3);
    }

    const delete_item = (id) => {
        
        if(confirm("¿Está seguro de eliminar este registro ?")){
            document.documentElement.setAttribute("data-preloader", "enable");
            axios.delete('{!! url('shops') !!}/' + id, {})
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

    const load_page = () => {
        search_table();
        @if(isset($id_row))
        id_row = {!! $id_row !!};
        if(id_row > 0){
            const btn_new = document.getElementById("newRow");
            btn_new.click();
            /*const btn = document.createElement('input');
            btn.setAttribute('type', 'button');
            btn.setAttribute('data-bs-toggle', 'modal');
            btn.setAttribute('data-bs-target', '#modalForm');
            btn.className="btn btn-primary";
            btn.onclick = () => { edit_item(id_user); }
            btn.click();*/
            edit_item(id_row);
        }
        @endif
    }

    setTimeout(function(){ load_page() }, 1000);

</script>
@endsection
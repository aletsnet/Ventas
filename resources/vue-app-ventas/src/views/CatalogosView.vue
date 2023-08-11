<script>
import axios from "axios";
import Formulario from '../components/catalogos/Formulario.vue';

export default {

    mounted() {
        this.indexCatalogo()
    },

    components:{
        Formulario
    },

    data() {
        return {
            urlApi: import.meta.env.VITE_BACK_END_URL + '/api/catalogos',
            catalogos: [],
            cargando:false,
            accionFormulario:0,
            modeloCatalogo:{
                id:null,
                nombre:'',
                icon:'',
                css:'',
                style:'',
                picture:'',
                activo:true,
                orden:null
            },
        }
    },

    methods: {

        indexCatalogo() {
            this.catalogos = [];
            this.cargando = true;
            var self = this;
            axios.get(this.urlApi)
                .then(function (response) {
                    self.catalogos = response.data;
                    self.cargando = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        destroyCatalogo(id){
            var confirmacion = confirm('Confirma la eliminación permanente del registro '+id);
            if(confirmacion){
                var self = this;
                axios.delete(self.urlApi+'/'+id)
                .then(function(response){
                    self.indexCatalogo();
                    console.log(response);
                })
                .catch(function(error){
                    console.log(error);
                    alert('Error '+id+'\n'+error.response.data.message);
                });
            }
        },

        mostrarFormulario(accionFormulario,catalogo){
            this.accionFormulario = accionFormulario;
            if(this.accionFormulario == 1){
                this.limpiarModeloCatalogo();
            }else if(this.accionFormulario == 2){
                this.modeloCatalogo = Object.assign({}, catalogo);
            }
        },

        limpiarModeloCatalogo(){
            this.modeloCatalogo.id = null;
            this.modeloCatalogo.nombre ='',
            this.modeloCatalogo.icon = '',
            this.modeloCatalogo.css = '',
            this.modeloCatalogo.style = '',
            this.modeloCatalogo.picture = '',
            this.modeloCatalogo.activo = true,
            this.modeloCatalogo.orden = null
        },

        modeloActualizado(n){
            console.log(n);
        }

    }
}
</script>

<template>
    <div class="row justify-content-center">
        <Formulario 
            v-model:id = 'modeloCatalogo.id'
            v-model:nombre = 'modeloCatalogo.nombre'
            v-model:icon = 'modeloCatalogo.icon'
            v-model:css = 'modeloCatalogo.css'
            v-model:style = 'modeloCatalogo.style'
            v-model:picture = 'modeloCatalogo.picture'
            v-model:activo = 'modeloCatalogo.activo'
            v-model:orden = 'modeloCatalogo.orden'
            :accion = 'accionFormulario'
        />

        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 mt-4 bg-white shadow rounded">

            <div class="row bg-primary pt-3 pb-3 rounded-top">

                <!--Titutulo-->
                <div class="col-lg-8 col-sm-11">
                    <h1 class="text-white fs-4">
                        <i class="bi bi-database"></i>
                        Gestión de catálogos
                        ( {{ accionFormulario}} )
                    </h1>
                </div>

                <div class="col-lg-1 col-sm1">
                    <div class="spinner-border text-light" role="status" v-show="cargando">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!--Botones de accion-->
                <div class="col-lg-3 col-sm-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="row justify-content-center">
                                <button class="btn btn-light col-11" type="button" @click="indexCatalogo">
                                    <i class="bi bi-arrow-repeat"></i>
                                    Actualizar
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-center">
                                <button class="btn btn-success col-11" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="mostrarFormulario(1,null)">
                                    <i class="bi bi-plus-circle"></i>
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Tabla de datos-->
            <div class="row">
                <div class="col-12 pt-3 pb-2 rounden-bottom">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>

                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Icon</th>
                                <th scope="col">CSS</th>
                                <th scope="col">Style</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Orden</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="catalogo in catalogos">
                                <th scope="row">{{ catalogo.id }}</th>
                                <td>{{ catalogo.nombre }}</td>
                                <td>{{ catalogo.icon }}</td>
                                <td>{{ catalogo.css }}</td>
                                <td>{{ catalogo.style }}</td>
                                <td>{{ catalogo.picture }}</td>
                                <td>{{ catalogo.activo }}</td>
                                <td>{{ catalogo.orden }}</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="mostrarFormulario(2,catalogo)">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger" @click="destroyCatalogo(catalogo.id)">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!--Controles de paginacion-->
            <div class="row pt-1 pb-2">
                <div class="col-lg-4 col-sm-2">
                    <p class="fw-light" v-if="catalogos.length >= 1">
                        Mostrando <span class="fw-semibold">{{ catalogos.length }}</span> registros recuperados de la base
                        de datos.
                    </p>
                </div>
                <!--Paginacion-->
                <div class="col-lg-8 col-sm-10" v-if="false">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-8 col-sm-10">
                    {{ modeloCatalogo }}
                </div>
            </div>
        </div>
    </div>
</template>
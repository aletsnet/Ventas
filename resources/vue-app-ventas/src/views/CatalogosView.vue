<script>
import axios from "axios";
import Formulario from '../components/catalogos/Formulario.vue';
import Alerta from '../classes/Alerta';

export default {

    mounted() {
        this.indexCatalogo()
    },

    components: {
        Formulario
    },

    data() {
        return {
            urlApi: import.meta.env.VITE_BACK_END_URL + '/api/catalogos',
            catalogos: [],
            cargando: false,
            requiereActualizacion: false,
            cargandoFormulario: false,
            accionFormulario: 0,
            modeloCatalogo: {
                id: null,
                nombre: '',
                icon: '',
                css: '',
                style: '',
                picture: '',
                activo: true,
                orden: null
            },
        }
    },

    methods: {

        //--------------CRUD------------------------
        indexCatalogo: function () {
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
                    self.cargando = false;
                });
        },

        storeCatalogo: function () {
            var self = this;
            self.cargando = true;
            axios.post(self.urlApi, self.modeloCatalogo)
                .then(function (response) {
                    self.cargando = false;
                    self.requiereActualizacion = true;
                    self.$refs.formulario.cerrarFormularioRef();
                })
                .catch(function (error) {
                    console.log(error)
                    let alerta = new Alerta();
                    alerta.mensajeError(error);
                });

        },

        updateCatalogo: function () {
            var self = this;
            self.cargando = true;

            axios.put(self.urlApi + '/' + self.modeloCatalogo.id, self.modeloCatalogo)
                .then(function (response) {
                    self.cargando = false;
                    self.requiereActualizacion = true;
                    self.$refs.formulario.cerrarFormularioRef();
                })
                .catch(function (error) {
                    self.cargando = false;
                    alert('Error \n' + error.response.data.message);
                });
        },

        destroyCatalogo: function (id) {
            let self = this;
            let alerta = new Alerta();


            alerta.confirmarEliminacion('¿Deseas eliminar permanentemente este registro?')
            .then(function(){
                self.cargando = true;
                axios.delete(self.urlApi + '/' + id)
                .then(function (response) {
                    self.indexCatalogo();
                    self.cargando = false;
                })
                .catch(function (error) {
                    alert('Error ' + id + '\n' + error.response.data.message);
                    self.cargando = false;
                });
            })
            .catch(function(){
                
            });
            
        },



        //------------------------------------------------

        mostrarFormulario: function (accionFormulario, catalogo) {
            this.accionFormulario = accionFormulario;
            if (this.accionFormulario == 1) {
                this.limpiarModeloCatalogo();
            } else if (this.accionFormulario == 2) {
                this.modeloCatalogo = Object.assign({}, catalogo);
            }
        },

        cerrarFormulario: function () {
            this.limpiarModeloCatalogo();
            this.accionFormulario = 0;
            if (this.requiereActualizacion) {
                this.indexCatalogo();
                this.requiereActualizacion = false;
            }
        },

        enviarFormulario: function () {
            if (this.accionFormulario == 1) {
                this.storeCatalogo();
            } else if (this.accionFormulario == 2) {
                this.updateCatalogo();
            }
        },

        limpiarModeloCatalogo: function () {
            this.modeloCatalogo.id = null;
            this.modeloCatalogo.nombre = '',
                this.modeloCatalogo.icon = '',
                this.modeloCatalogo.css = '',
                this.modeloCatalogo.style = '',
                this.modeloCatalogo.picture = '',
                this.modeloCatalogo.activo = true,
                this.modeloCatalogo.orden = null
        },
    }
}
</script>

<template>
    <div class="row justify-content-center">
        <Formulario v-model:id='modeloCatalogo.id' v-model:nombre='modeloCatalogo.nombre' v-model:icon='modeloCatalogo.icon'
            v-model:css='modeloCatalogo.css' v-model:style='modeloCatalogo.style' v-model:picture='modeloCatalogo.picture'
            v-model:activo='modeloCatalogo.activo' v-model:orden='modeloCatalogo.orden' :accion='accionFormulario'
            :cargando='cargando' @close='cerrarFormulario' @submit='enviarFormulario' ref="formulario" />

        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 mt-4 bg-white shadow rounded">

            <div class="row bg-primary pt-3 pb-3 rounded-top">

                <!--Titutulo-->
                <div class="col-lg-8 col-sm-11">
                    <h1 class="text-white fs-4">
                        <i class="bi bi-database"></i>
                        Gestión de catálogos
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
                                <button class="btn btn-light col-11" type="button" @click="indexCatalogo"
                                    :disabled="cargando">
                                    <i class="bi bi-arrow-repeat"></i>
                                    Actualizar
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-center">
                                <button class="btn btn-success col-11" type="button" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop" @click="mostrarFormulario(1, null)"
                                    :disabled="cargando">
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
                        <thead class="table-secondary">
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
                                    <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop" @click="mostrarFormulario(2, catalogo)"
                                        :disabled="cargando">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger" @click="destroyCatalogo(catalogo.id)"
                                        :disabled="cargando">
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
                <div class="col-lg-5 col-sm-2">
                    <p class="fw-light" v-if="catalogos.length >= 1">
                        <i class="bi bi-info-circle"></i>
                        Mostrando <span class="fw-semibold">{{ catalogos.length }}</span> registros recuperados de la base
                        de datos.
                    </p>
                </div>
                <!--Paginacion-->
                <div class="col-lg-7 col-sm-10" v-if="false">
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

            </div>
        </div>
    </div>
</template>
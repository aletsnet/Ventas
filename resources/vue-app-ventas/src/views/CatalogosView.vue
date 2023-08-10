<script>
import axios from "axios";

export default {

    mounted() {
        this.indexCatalogo()
    },

    data() {
        return {
            urlApi: import.meta.env.VITE_BACK_END_URL + '/api/catalogos',
            catalogos: [],
            cargando:true
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
        }

    }
}
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 mt-5 bg-white shadow rounded">

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
                                <button class="btn btn-light col-11" type="button" @click="indexCatalogo">
                                    <i class="bi bi-arrow-repeat"></i>
                                    Actualizar
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-center">
                                <button class="btn btn-success col-11" type="button">
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
                <div class="col-12 pt-2 pb-2 rounden-bottom">
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
                                    <button class="btn btn-outline-warning">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!--Controles de paginacion-->
            <div class="row pt-2 pb-2">
                <div class="col-lg-4 col-sm-2">
                    <p class="fw-light" v-if="catalogos.length >= 1">
                        Mostrando <span class="fw-semibold">{{ catalogos.length }}</span> registros recuperados de la base
                        de datos.
                    </p>
                </div>
                <!--Paginacion-->
                <div class="col-lg-8 col-sm-10" v-show="false">
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
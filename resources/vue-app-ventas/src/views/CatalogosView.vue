<script setup>

</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 mt-5 bg-white shadow rounded">

            <div class="row bg-primary pt-3 pb-3 rounded-top">

                <!--Titutulo-->
                <div class="col-lg-7 col-sm-12">
                    <h1 class="text-white fs-4">
                        <i class="bi bi-database"></i>
                        Gestión de catálogos
                    </h1>
                </div>

                <!--Botones de accion-->
                <div class="col-lg-5 col-sm-12">
                    <div class="row">
                        <div class="col-4">
                            <div class="row justify-content-center">
                                <button class="btn btn-light col-11" type="button">
                                    <i class="bi bi-arrow-repeat"></i>
                                    Actualizar
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row justify-content-center">
                                <button class="btn btn-success col-11" type="button">
                                    <i class="bi bi-plus-circle"></i>
                                    Agregar
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row justify-content-center">
                                <button class="btn btn-danger col-11" type="button">
                                    <i class="bi bi-trash"></i>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Tabla de datos-->
            <div class="row">
                <div class="col-12 pt-2 pb-2 rounden-bottom">
                    <table class="table">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--Controles de paginacion-->
            <div class="row pt-2 pb-2">
                <div class="col-lg-4 col-sm-2">
                    <p class="fw-light">
                        Mostrando 5 de 25 resultados
                    </p>
                </div>
                <div class="col-lg-8 col-sm-10">
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
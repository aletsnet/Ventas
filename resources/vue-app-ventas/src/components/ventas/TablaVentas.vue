<script>
export default {
    props:{
        ventas:Array
    }

}

</script>

<template>
    <div class="row bg-white shadow rounded-bottom">
        <div class="col-12">
            <div class="row bg-primary rounded-top pt-2 pb-2">
                <div class="col-12">
                    <h1 class="text-white fs-4">
                        <i class="bi bi-shop"></i>
                        Ventas
                    </h1>
                </div>
            </div>
            <div class="row pt-3 pb-1 rounded-bottom bg-white">
                <div class="col-12">
                    <table class="table table-hover table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Apertura</th>
                                <th scope="col">Cierre</th>
                                <th scope="col">Total</th>
                                <th scope="col">Descuento</th>
                                <th scope="col">Sesión</th>
                                <th scope="col">Modo de Pago</th>
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="venta in ventas">
                                <td>{{ venta.id }}</td>
                                <td>{{ venta.detalle }}</td>
                                <td>{{ venta.apertura }}</td>
                                <td>{{ venta.cierre }}</td>
                                <td>{{ venta.total }}</td>
                                <td>{{ venta.descuento }}</td>
                                <td>{{ venta.sesion }}</td>
                                <td>{{ venta.modo_pago }}</td>
                                <td>{{ venta.status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</template>
<script>
    export default{
        props:{
            cargando:Boolean
        }
    }
</script>

<template>
    <div class="row">
        <div class="col-12 bg-white shadow rounded pt-3 pt-2">
            <h1 class="text-center"><i class="bi bi-window-plus"></i></h1>
            <p class="text-center fs-5">Sesión de ventas</p>
            <p class="text-center" v-if="!cargando">
                <button type="button" class="btn btn-primary" @click="$emit('nuevaSesion')">
                    <i class="bi bi-plus-circle"></i>
                    Crear nueva sesión
                </button>
            </p>
            <p class="text-center" v-if="cargando">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </p>
        </div>
    </div>

</template>
<script>
    import moment from 'moment';

    import Alerta from '../../classes/Alerta.js';

    export default{
        props:{
            sesion:Object
        },

        methods:{
            convertirFecha:function(fecha){
                return moment(fecha).format('DD/MM/YYYY hh:mm:ss a');
            },

            finalizarSesion:function(){
                let self = this;

                new Alerta().confirmar('Finalizar sesión','¿Realmente deseas terminar la sesión?').then(function(){
                    self.$emit('finalizarSesion');
                }).catch(function(){

                });
            }
        }

    }
</script>

<template>
    <div class="row">
        <div class="col-12 bg-white shadow-sm rounded pt-2 pb-2">
            <div class="row">
                <div class="col">
                    <h1 class="fs-5">Detalle de la sesión</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <p class="fw-light">
                        Apertura
                        <br/>
                        {{ convertirFecha(sesion.apertura) }}
                    </p>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="fw-light">
                        Inicio
                        <br/>
                        <span class="fw-bold">{{ sesion.inicio }}</span>
                    </p>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="fw-light">
                        Entradas
                        <br/>
                        <span class="fw-bold">{{ sesion.entradas }}</span>
                    </p>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="fw-light">
                        Salidas
                        <br/>
                        <span class="fw-bold">{{ sesion.salidas }}</span>
                    </p>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="fw-light">
                        Total
                        <br/>
                        <span class="fw-bold">{{ sesion.total }}</span>
                    </p>
                </div>
                <div class="col-lg-1 col-sm-12 pt-lg-3">
                    <button type="button" class="btn btn-outline-primary col-12" title="Finalizar sesión" @click="finalizarSesion">
                        <i class="bi bi-check-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
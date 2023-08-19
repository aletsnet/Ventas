<script>
    import TablaVentas from '../components/ventas/TablaVentas.vue';
    import NuevaSesion from '../components/ventas/NuevaSesion.vue';
    import DetalleSesion from '../components/ventas/DetalleSesion.vue';
    import ControlesVenta from '../components/ventas/ControlesVenta.vue';
    
    import Api from '../classes/Api.js';
    import Alerta from '../classes/Alerta.js';
    import Criptografia from '../classes/Criptografia.js';

    export default{
        mounted:function(){
            
        },

        components:{
            TablaVentas,
            NuevaSesion,
            DetalleSesion,
            ControlesVenta
        },

        data:function(){
            return {
                ventas:[],
                cargando:false,
                sesion:{
                    id:null,
                    apertura:null,
                    cierre:null,
                    inicio:null,
                    entradas:null,
                    salidas:null,
                    total:null,
                    status:null,
                    sesion_hash:null
                }
            }
        },

        methods:{

            crearSesion:function(){
                let criptografia = new Criptografia();
                let hashSesion = criptografia.md5Unico();
                let self = this;
                new Alerta().confirmar(
                    '<i class="bi bi-window-plus"></i> Crear nueva sesión',
                    '<p>¿Deseas crear una nueva sesión?</p><p>Hash:<br>'+hashSesion+'</p>'
                ).then(function(){
                    self.sesion.sesion_hash = hashSesion;
                    self.createSesion(self.sesion);
                }).catch(function(){
                    
                });
            },

            borrarSesion:function(){
                this.sesion.id = null;
                this.sesion.apertura = null;
                this.sesion.cierre = null;
                this.sesion.inicio = null;
                this.sesion.entradas = null;
                this.sesion.salidas = null;
                this.sesion.total = null;
                this.sesion.status = null;
                this.sesion.sesion_hash = null;
            },

            //-------------------------------- CRUD SESION -----------------------------
            createSesion:function(sesion){
                let self = this;
                self.cargando = true;

                new Api().store('sesiones',sesion).then(function(response){
                    new Api().show('sesiones',sesion.sesion_hash).then(function(response){
                        if(response.data.length){
                            self.sesion = response.data[0];
                            self.cargando = false;
                        }
                    }).catch(function(error){
                        self.cargando = false;
                        new Alerta().error('Error al crear nueva sesión',error);
                    });
                }).catch(function(error){
                    self.cargando = false;
                    new Alerta().error('Error al crear nueva sesión',error);
                });
            },

            showSesion:function(id){
                new Api().show('sesiones',id).then(function(response){
                    console.log(response);
                }).catch(function(error){
                    new Alerta().error('Error al crear nueva sesión',error);
                });
            },

            updateSesion:function(){
                let self = this;
                self.cargando = true;

                new Api().update('sesiones',self.sesion,self.sesion.id).then(function(response){
                    self.borrarSesion();
                    self.cargando = false;

                }).catch(function(error){
                    self.cargando = false;
                    new Alerta().error('Ocurrio un error al finalizar la sesión',error);
                });
            },


            //-------------------------------- CRUD VENTAS -----------------------------
            indexVenta:function(){
                let self = this;
                new Api().index('ventas').then(function(response){
                    self.ventas = response.data;
                }).catch(function(error){
                    new Alerta().error('Error al obtener información de ventas',error);
                });
            }

        }
    }
</script>

<template>

    <div class="row justify-content-center pt-4" v-if="sesion.id == null">
        <div class="col-lg-3 col-sm-12">
            <NuevaSesion @nueva-sesion="crearSesion" :cargando="cargando" />
        </div>
    </div>

    <div class="row pt-3" v-if="sesion.id != null">
        <div class="col-12">
            <div class="row pt-2 pb-2">
                <div class="col-lg-9 col-sm-12">
                    <DetalleSesion :sesion="sesion" @finalizar-sesion="updateSesion"/>
                </div>
                <div class="col-lg-3 col-sm-12 ">
                    <ControlesVenta/>
                </div>
            </div>
            <div class="row pt-2 pb-2">
                <div class="col-12">
                    <TablaVentas :ventas="ventas"></TablaVentas>
                </div>
            </div>
        </div>
        
        
    </div>

</template>
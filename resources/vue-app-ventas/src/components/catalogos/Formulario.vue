<script>
import axios from 'axios';

export default {

    mounted: function () {
        this.limpiarCatalogo();
    },
    props: {
        id:Number,
        nombre:String,
        icon:String,
        css:String,
        style:String,
        picture:String,
        activo:Boolean,
        orden:Number,
        accion:Number,
    },
    methods:{
        
        storeCatalogo:function(){
            var self = this;

            axios.post(import.meta.env.VITE_BACK_END_URL + '/api/catalogos', self.catalogo)
            .then(function (response) {
                self.persistenciaBD = true;
                self.$refs.btnCerrarFormulario.click();
            })
            .catch(function (error) {
                alert('Error \n'+error.response.data.message);
            });
            
        },

        updateCatalogo:function(){
            alert('Update');
        },

        limpiarCatalogo:function(){
            this.catalogo.nombre = 'prueba';
            this.catalogo.icon = '';
            this.catalogo.css = '';
            this.catalogo.style = '';
            this.catalogo.picture = '';
            this.catalogo.activo = true;
            this.catalogo.orden = null;
        },

        cerrarFormulario:function(){
            
        },

        enviarFormulario:function(){
            
        }

    },
    
    data(){
        return {
            catalogo:{},
            persistenciaBD:false,
            procesando:false
        }
    },

    watch: {
    
    },
}
</script>

<template>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel" v-show="accion == 1">
                        <i class="bi bi-plus-circle"></i>
                        Nuevo registro
                    </h1>
                    <h1 class="modal-title fs-5" id="staticBackdropLabel" v-show="accion == 2">
                        <i class="bi bi-plus-circle"></i>
                        Actualizar registro
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="cerrarFormulario"></button>
                </div>
                <form @submit.prevent="enviarFormulario">
                    <div class="modal-body">

                        <!--Formulario-->

                        <div class="mb-3">
                            <label for="txtNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre" :value="nombre" @input="$emit('update:nombre', $event.target.value)">
                        </div>

                        <div class="mb-3">
                            <label for="txtIcon" class="form-label">Icon</label>
                            <input type="text" class="form-control" id="txtIcon" :value="icon" @input="$emit('update:icon', $event.target.value)">
                        </div>

                        <div class="mb-3">
                            <label for="txtCss" class="form-label">CSS</label>
                            <input type="text" class="form-control" id="txtCss" :value="css" @input="$emit('update:css', $event.target.value)">
                        </div>

                        <div class="mb-3">
                            <label for="txtStyle" class="form-label">Style</label>
                            <input type="text" class="form-control" id="txtStyle" :value="style" @input="$emit('update:style', $event.target.value)">
                        </div>

                        <div class="mb-3">
                            <label for="txtPicture" class="form-label">Picture</label>
                            <input type="text" class="form-control" id="txtPicture" :value="picture" @input="$emit('update:picture', $event.target.value)">
                        </div>

                        <div class="mb-3">
                            <label for="txtOrden" class="form-label">Orden</label>
                            <input type="text" class="form-control" id="txtOrden" :value="orden" @input="$emit('update:orden', $event.target.value)">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="fcActivo" :checked="activo" @input="$emit('update:activo', $event.target.checked)">
                            <label class="form-check-label" for="fcActivo">Activo</label>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" @click="cerrarFormulario" ref="btnCerrarFormulario">
                            <i class="bi bi-dash-circle-fill"></i>
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-database-add"></i>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
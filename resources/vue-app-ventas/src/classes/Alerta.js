import alertify from 'alertifyjs';

class Alerta{

    constructor(){
        
    }

    confirmarEliminacion(mensaje){
        alertify.defaults.theme.ok = 'btn btn-outline-danger';
        alertify.defaults.theme.cancel = 'btn btn-outline-secondary';
        alertify.defaults.glossary.ok = '<i class="bi bi-trash-fill"></i> Eliminar';
        alertify.defaults.glossary.cancel = ' <i class="bi bi-dash-circle"></i> Cancelar';
        alertify.defaults.glossary.title = '<span class="text-dark"><i class="bi bi-trash-fill"></i> Eliminar registro</span>';

        return new Promise(function(resolve,reject){
            alertify.confirm(
                mensaje, 
                function(){ 
                    resolve();
                },
                function(){ 
                    reject();
                }
            );

        });
    }

    mensajeError(error){
        alertify.defaults.theme.ok = 'btn btn-primary';
        alertify.defaults.glossary.ok = '<i class="bi bi-check-circle"></i> Aceptar';
        
        if(error.name == 'AxiosError'){
            alertify.defaults.glossary.title = '<span class="text-danger"><i class="bi bi-x-octagon"></i> Error '+error.response.status+' - '+error.response.statusText+'</span>';
            alertify.alert(
                '<p><i class="bi bi-x-circle-fill"> '+error.message+'</i></p>'+
                '<p><i class="bi bi-link-45deg"></i> '+error.config.url+'</i></p>'+
                '<p><i class="bi bi-bug"></i> '+error.response.data.message+'</i></p>'
            );
        }else{
            alertify.defaults.glossary.title = '<span class="text-danger"><i class="bi bi-x-octagon"></i> Error</span>';
        }
    }

}

export default Alerta;
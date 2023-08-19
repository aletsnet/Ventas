import axios from 'axios';

class Api{
    
    index(api){
        return new Promise(function(resolve,reject){
            axios.get(import.meta.env.VITE_BACK_END_URL+'/api/'+api)
            .then(function (response) {
                resolve(response);
            })
            .catch(function (error) {
                reject(error);
            });
        });
        
    }

    store(api,request){
        return new Promise(function(resolve,reject){
            axios.post(import.meta.env.VITE_BACK_END_URL+'/api/'+api, request)
            .then(function (response) {
                resolve(response);
            })
            .catch(function (error) {
                reject(error);
            });
        });
    }

    update(api,request,id){
        return new Promise(function(resolve,reject){
            axios.put(import.meta.env.VITE_BACK_END_URL+'/api/'+api+'/'+id, request)
            .then(function (response) {
                resolve(response);
            })
            .catch(function (error) {
                reject(error);    
            });
        });
    }

    destroy(){
        
    }

    show(api,id){
        return new Promise(function(resolve,reject){
            axios.get(import.meta.env.VITE_BACK_END_URL+'/api/'+api+'/'+id)
            .then(function (response) {
                resolve(response);
            })
            .catch(function (error) {
                reject(error);
            });
        });
    }

}

export default Api;
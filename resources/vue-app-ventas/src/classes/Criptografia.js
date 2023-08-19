import md5 from 'blueimp-md5';
import moment from 'moment';

class Criptografia{

    md5Unico(){
        return md5(moment().format('DDMMYYYYHHmmss')+''+this.numeroRandom(10));
    }

    numeroRandom(tamano){
        let numero = '';
        for(let i = 0; i < tamano; i++){
            numero = numero + ((Math.trunc(Math.random() * 10)) + '');
        }
        return numero;
    }

}

export default Criptografia;
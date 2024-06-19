let cols_main = {};

const alert_mensaje = (div, msj, activo) => {
    const contendor = document.getElementById(div);
    const mensaje = contendor.getElementsByClassName('alert_mensaje')[0];
    contendor.style = activo ? "display: normal;" : "display: none";
    mensaje.innerHTML = msj;
}

const display_elemento_modal = (modal, elemento) => {
    const list_elemento = document.getElementsByClassName(modal);
    for(let i = 0; i < list_elemento.length; i++){
        list_elemento[i].style="display: none;";
        if(i == elemento -1){
            list_elemento[i].style="display: normal;";
        }
    }
}

const load_table = (tabla, cols, datos) => {
    const formattedNumber = new Intl.NumberFormat('es-MX', { minimumFractionDigits: 2 });
    //botones
    const div_search = document.getElementById(tabla);
    const buttons = div_search.getElementsByClassName('pagination');
    const thead_default = div_search.getElementsByTagName('thead');
    const tbody_default = div_search.getElementsByTagName('tbody');

    let headers = '';
    let tbody = '';
    let btns = "";
    let i = 0;
    cols_main = cols;

    if(typeof datos.links != "undefined"){
        let f = datos.links.length;
        datos.links.map( (item) => {
            let label = item.label;
            if(i==0){
                label = 'Primero';
            }
            if(i==f-1){
                label = 'Ultimo'
            }
            btns += `<li class="page-item ` + (item.active ? `active` : ``) + `">
                <a class="page-link" href="javascript:paginado('` + tabla + `','` + item.url + `')" aria-label="` + label + `">` + label + `</a>
            </li>`;
            i++;
        });
    }

    for(let i in cols){
        if(typeof cols[i] == 'object'){
            //console.log(cols[i][0]);
            if(i == 'tools'){
                let btns = cols[i];
                let html_btns = "";
                if(typeof btns == "object"){
                    btns.map( (btnrow) => {
                        switch(btnrow.type){
                            case "check":
                                html_btns = `<button type="button" class="btn btn-xs " onclick="` + btnrow.function.replace('?', "'?'") + `" >
                                        <i class="`+ btnrow.icon +`"></i> 
                                        <small>All</small>
                                        </button>`;
                            break;  
                            default:
                                
                            break;
                        }
                    })
                }

                headers += `<th> Tools ` + html_btns + `</th>`;
            }else{
                switch(cols[i].length){
                    case 1:
                        headers += '<th scope="col">' + cols[i][0] + '</th>' ;
                        break;
                    case 2:
                        headers += '<th scope="col">' + cols[i][1] + '</th>' ;
                        break;
                    case 3:
                        headers += '<th class=' + cols[i][2] + ' scope="col">' + cols[i][1] + '</th>' ;
                        break;
                    default:
                        headers += '<th scope="col">' + cols[i] + '</th>' ;
                        break;
                }
            }
        }else{
            headers += '<th>' + cols[i] + '</th>' ;
        }
    }

    thead_default[0].innerHTML = '<tr>' + headers + '</tr>' ;

    let rows = datos.data;
    if(typeof rows == 'undefined'){
        rows = datos;
    }

    rows.map((item) => {
        //let item = datos.data[j];
        let cells = "";
        let scope = "" ;
        for(let i in cols){
            if(i == 'tools'){
                let elements = cols[i];
                cells += '<td> <span>';
                for(let ii in elements){
                    switch(elements[ii].type){
                        case 'button':
                            cells += `<button type="button" class="`+ elements[ii].class +`" 
                                            onclick="` + elements[ii].function.replace('?', item[elements[ii].param]) + `"
                                            `+(elements[ii].propiedades ?? '')+`> `+ `
                                            <i class="`+ elements[ii].icon +`"></i> 
                                            ` + elements[ii].label + ` 
                                    </button>` ;
                        break;
                        case 'link':
                            cells += `<a class="`+ elements[ii].class +`" 
                                        href="` + elements[ii].url.replace('?', item[elements[ii].param]) + `" 
                                        `+(elements[ii].propiedades ?? '')+`> `+ `<i class="`+ elements[ii].icon +`"></i> ` + elements[ii].label + ` </a>` ;
                        break;
                        case 'check':
                            cells += `<label>
                                            <input type="checkbox" class="checklist" onchange="` + elements[ii].function.replace('?', item[elements[ii].param]) + `" value="` +  item[elements[ii].param] + `" />
                                            ` + elements[ii].label + ` 
                                        </label>`;
                        break;
                        default :
                            cells += elements[ii].label;
                        break;
                    }
                }
                cells += '</span></td>';
            }else{
                let campos = cols[i][0].split(",");
                let label = "";
                for(let j=0; j<campos.length; j++){
                    let c = campos[j].split(".");
                    switch (c.length) {
                        case 1:
                            let label1 = campos[j];
                            if(typeof item[c[0]] != "undefined"){
                                label1 = item[c[0]];
                            }
                            label += (label!=""?" ":"") + label1 ;
                            break;
                        case 2:
                            let label2 = campos[j];
                            if(typeof item[c[0]] != "undefined"){
                                label2 = " - ";
                                if(item[c[0]] != null){
                                    if(typeof item[c[0]][c[1]] != "undefined"){

                                            label2 = item[c[0]][c[1]] ?? '';
                                    }
                                }
                            }
                            label += (label!=""?" ":"") + label2 ;
                            break;
                        case 3:
                            let label_valor = campos[j];
                            if(typeof item[c[0]] != "undefined"){
                                label_valor = " - ";
                                if(item[c[0]] != null){
                                    if(typeof item[c[0]][c[1]] != "undefined"){
                                        if(typeof item[c[0]][c[1]][c[2]] != "undefined"){
                                            label_valor = item[c[0]][c[1]][c[2]];
                                        }
                                    }
                                }
                            }
                            label += (label!=""?" ":"") + label_valor ;
                            break;
                        case 4:
                            let label4 = campos[j];
                            if(typeof item[c[0]] != "undefined"){
                                label4 = " - ";
                                if(typeof item[c[0]][c[1]] != "undefined"){
                                    if(typeof item[c[0]][c[1]][c[2]] != "undefined"){
                                        if(typeof item[c[0]][c[1]][c[2]][c[3]] != "undefined"){
                                            label4 = item[c[0]][c[1]][c[2]][c[3]];
                                        }
                                    }
                                }
                            }
                            label += (label!=""?" ":"") + label4 ;
                            break;
                        default:
                            label += (label!=""?" ":"") + (item[c[0].trim()] ?? '-');
                            break;
                    }
                }

                //console.log(typeof label + " " + parseFloat(label));
                let tmp = new Date(label)
                if(tmp == 'Invalid Date'){
                    if(parseFloat(label) > 999 ){
                        label = formattedNumber.format(label)
                    }
                }

                if(label.length > 100){
                    label = label.slice(0, 97) + '...';
                }
                
                if(scope != ""){
                    cells += '<td>' + label + '</td>' ;
                }else{
                    scope = "row";
                    cells += '<td scope = "row">' + label + '</td>' ;
                }
                
            }
        }
        tbody += '<tr>' + cells + '</tr>'
    });


    if(tbody == ''){
        tbody = '<tr><td colspan="'+Object.keys(cols).length+'">No hay elementos que mostrar</td></tr>';
    }

    tbody_default[0].innerHTML = tbody ;
    buttons[0].innerHTML = btns;
}

const load_data = (tabla, cols, datos) => {
    const formattedNumber = new Intl.NumberFormat('es-MX', { minimumFractionDigits: 2 });

    //botones
    const div_search = document.getElementById(tabla);
    const buttons = div_search.getElementsByClassName('pagination');
    const thead_default = div_search.getElementsByTagName('thead');
    const tbody_default = div_search.getElementsByTagName('tbody');
    const tfood_default = div_search.getElementsByTagName('tfoot');

    let headers = '';
    let tbody = '';
    let btns = "";
    let i = 0;
    let subtotal = [];

    for(let i in cols){
        if(typeof cols[i] == 'object'){
            switch(i){
                case 'tools':
                    headers += '<th> Tools </th>' ;
                break;

                case 'total':

                break;

                default:
                    headers += '<th>' + cols[i][1] + '</th>' ;
                break;
            }
        }else{
            headers += '<th>' + cols[i] + '</th>' ;
        }
    }

    thead_default[0].innerHTML = '<tr>' + headers + '</tr>' ;

    datos.map((item) => {
        let cells = "";
        for(let i in cols){
            switch(i){
                case 'tools':
                    let elements = cols[i];
                    for(let ii in elements){
                        switch(elements[ii].type){
                            case 'button':
                                cells += `<td> <button type="button" class="`+ elements[ii].class +`" onclick="` + elements[ii].function.replace('?', item[elements[ii].param]) + `" `+elements[ii].propiedades+`> `+ `<i class="`+ elements[ii].icon +`"></i> ` + elements[ii].label + ` </button></td>` ;
                            break;
                            default :
                                cells += '<td>' + elements[ii].label + '</td>' ;
                            break;
                        }
                    }
                break;

                case 'total':
                    let campo = cols[i][0];
                    if(typeof subtotal[campo] == 'undefined'){ subtotal[campo] = parseFloat(0) ; }
                    subtotal[campo] += parseFloat(item[campo]);
                break;

                default:
                    let campos = cols[i][0].split(",");
                    let label = "";
                    for(let j=0; j<campos.length; j++){
                        let c = campos[j].split(".");
                        if(c.length == 1){
                            label += (label!=""?" ":"") +item[c[0]];
                        }else{
                            label += (label!=""?" ":"") + item[c[0]][c[1]];
                        }
                    }
                    if(parseFloat(label) > 0 ){
                        label = formattedNumber.format(label)
                    }
                    
                    cells += '<td>' + label + '</td>' ;
                break;
            }
            
        }
        tbody += '<tr>' + cells + '</tr>'
    });

    if(tbody == ''){
        tbody = '<tr><td colspan="'+Object.keys(cols).length+'">No hay elementos que mostrar</td></tr>';
    }

    tbody_default[0].innerHTML = tbody ;
    //buttons[0].innerHTML = btns;

    if(typeof tfood_default[0] != "undefined"){
        let row = "";
        for(let i in cols){
            switch(i){
                case 'tools':
                    
                break;
                
                case 'total':
                    row += subtotal[cols[i][0]]; 
                break;

            }
            
        }
        row = formattedNumber.format(row);
        tfood_default[0].innerHTML = '<tr><td class="text-end" colspan="'+(Object.keys(cols).length -2)+'"> Total</td><td class="" >' + row + '</td></tr>';
    }
}

const load_select = (origen, destino, controll, val_default, parametros) => {
    const select = document.getElementById(destino);
    select.innerHTML = '<option> Loading ...</option>';
    let value_obj = origen;
    if(typeof origen == 'object'){
        value_obj = origen.value;
    }
    param = { param: value_obj } ;
    if(typeof parametros == 'object' ){
        parametros.map((item) => {
            let tmp = document.getElementById(item).value;
            let obj = JSON.parse('{ "'+item+'" : "'+tmp+'" }');
            param = {...param, ... obj};
        });
    }
    axios.get(controll,{ params: param })
        .then(
            function (result) {
                list = result.data;
                options = '';
                
                for(i in list){
                    let selected = '';
                    if(typeof val_default != 'undefined'){
                        if(list[i].valor == val_default){
                            selected = 'selected = "selected"';
                        }
                    }
                    options += '<option value="'+list[i].valor+'" '+selected+'>'+list[i].label+'</option>';
                }

                if(options == ''){
                    options = '<option> - </option>';
                }else{
                    options = '<option> - </option>' + options;
                }
                
                select.innerHTML = options
                if(typeof select.attributes.onchange == 'object'){
                    eval(select.attributes.onchange.nodeValue);
                }
            }
        )
        .catch(function (error) {
            console.log(error);
            select.innerHTML = '<option> Error ...</option>';
        });
    
}

const paginado = (tabla, url) => {
    axios.get(url,{})
    .then(
        function (result) {
            load_table(tabla,cols_main,result.data);
        }
    )
    .catch(function (error) {
        console.log(error);
    });
}

const click_obj = (element) => {
    console.log(element);
    document.getElementById(element).click();
}
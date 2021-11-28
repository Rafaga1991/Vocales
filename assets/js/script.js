/**
 * Carga los datos de la oración
 * 
 * @param {Array} data 
 * @return {void}
 */
function loadData(data) {
    // Agregando datos
    document.getElementById('vowels').textContent = data.vowels;// asignando cantidad de vocales en elemento
    document.getElementById('vowel').textContent = data.vowel;// asignando vocales en elemento
    document.getElementById('consonant').textContent = data.consonant;// asignando consonantes en elemento
    document.getElementById('consonants').textContent = data.consonants;// asignando cantidad de consonantes en elemento
    document.getElementById('words').textContent = data.words;// asignando cantidad de palabras en elemento

    var ul = document.createElement('ul');// creando elemento ul (lista desordenada)
    ul.className = 'list-group list-group-flush';// asignando clase bootstrap a elemento ul
    data.word.forEach((value) => {// recoriendo arreglo de palabras mediante bucle foreach.
        var li = document.createElement('li');// creando elemento li (lista)
        li.className = 'list-group-item';// asignando clase bootstrap a elemento li
        li.textContent = value;// asignando texto (palabra de oración) a elemento li
        ul.appendChild(li);// agregando elemento li dentro de elemento ul
    })
    word = document.getElementById('word');// obteniendo elemento mediante el id
    word.innerHTML = '';// limpiando html contenido dentro de elemento
    word.appendChild(ul);// agregando elemento ul dentro de otro elemento
}

/**
 * crea una fila en la tabla
 * 
 * @param {array} data arreglo de oraciones
 * @return {void} sin retorno
 */
function createRows(data) {
    var prayer = document.getElementById('prayer');// obteniendo elemento vocales mediante el id
    var tr = document.createElement('tr');// creando elemento tr (fila)
    var td = document.createElement('td');// creando elemento td (columna)
    var td1 = document.createElement('td');// creando elemento td (columna)

    tr.onclick = () => {// creando evento click
        loadData(data);// cargando los datos de oracion al hacer click en una fila de la tabla
    }

    tr.className = 'selector';// asignando clase a elemento tr

    td.textContent = data.text;// asignando texto (la oracion) a elemento td
    td1.textContent = data.date;// asingando texto (la fecha)  a elemento td

    tr.appendChild(td);// agregando columna (oracion) a elemento tr
    tr.appendChild(td1);// agregando columna (fecha) a elemento tr
    prayer.appendChild(tr);// agrenado fila a elemento / cuerpo de la tabla, identificador vocales.
}

/**
 * carga los datos de la oración al hacer click en el boton
 * 
 * @return {void} sin retorno
 */
function onClick() {
    var input = document.getElementById('txtText').value;// asignando la oración escrita en la variable input
    input = input.trim();// asignando y eliminando los espacios laterales de la oración en la variable input
    if (input.length > 0) {// verificando que la variable no este vacia
        $.post('./request/post.php', {// utilizando jquery para enviar petición post al archivo post.php
            text: input // variable que será enviada mediante post: [variable: valor]
        }, (data) => {// función que recive respuesta de la petición enviada
            data = JSON.parse(data);// asignando y conviertiendo text a json en variable data 
            createRows(data);// creando fila con arreglo obtenido
            loadData(data);// cargando datos con arreglo obtenido
        });
    }
}

/**
 * elimina el historial de oraciones
 */
function clearRecord() {
    $.post('./request/post.php',// ruta del archivo a enviar petición post 
        {
            clear: '' // variable y valor a enviar
        }, () => {// función en espera
            document.getElementById('prayer').innerHTML = '';// limpiando html de elemento cuyo id es prayer
        })
}

// utilizando jquery para ejecutar evento una vez cargada la página
$(document).ready(() => {
    $.post('./request/post.php', // ruta del archivo a enviar petición post
    { 
        records: '' // variable y valor a enviar
    }, (data) => {// función en espera de respuesta
        JSON.parse(data).forEach((value) => {// convirtiendo texto a json y recoriendo arreglo con el bucle foreach
            createRows(value);// creando filas en la tabla
        })
    });
})
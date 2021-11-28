<?php

date_default_timezone_set('America/Santo_Domingo');// insertando la zona horario

$vowels = ['a', 'e', 'i', 'o', 'u'];// arreglo de vocales
$consonant = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'ñ', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'];// arreglo de consonantes
$path = './../assets/data/text.json';// ruta del historial de oraciones

if(!file_exists($path)){// verificando mediante la ruta si el no archivo existe
    file_put_contents($path, '[]');// creando archivo en la ruta definida e insertando valor []
}

$data = [];// asignando arreglo vacio en variable

if(isset($_POST['text'])){// verificando si existe el indice text la peticion post recivida

    $text = strtolower($_POST['text']);// asignando y convirtiendo en minusculas
    
    $data['vowels'] = 0;// asignando valor a indice
    $data['consonants'] = 0;// asignando valor a indice
    $data['vowel'] = '';// asignando valor a indice
    $data['consonant'] = '';// asignando valor a indice
    $data['word'] = explode(' ', $text);// asignando arreglo de palabras a indice
    $data['words'] = count($data['word']);// asignando cantidad de palabras a indice
    
    for($i=0; $i<strlen($text); $i++){// recorriendo la oración recivida
        if(in_array($text[$i], $vowels)){// verificando si el caracter es una vocal
            $data['vowels']++;// incrementando cantidad de vocales
            $data['vowel'] .= $text[$i] . '-';// concatenando vocal encontrada
        }elseif($text[$i] != ' '){// verificando que el caracter sea diferente de un espacio
            $data['consonants']++;// incrementando cantidad de consonantes
            $data['consonant'] .= $text[$i] . '-';// concatenando consonante encontrada
        }
    }

    $data['consonant'] = substr($data['consonant'], 0, strlen($data['consonant']) - 1);// eliminando y asignando último caracter de consonates en contradas
    $data['vowel'] = substr($data['vowel'], 0, strlen($data['vowel']) - 1);// eliminando y asignando último caracter de vocales en contradas
    $data['text'] = $_POST['text'];// asignando oración recivida
    $data['time'] = time();// asignando tiempo actual en segundos
    
    $DATA = json_decode(file_get_contents($path), true);// asignado, leyendo y convirtiendo texto en variable
    array_push($DATA, $data);// agregando otro arreglo a un arreglo
    file_put_contents($path, json_encode($DATA));// guardando oración recivida y sus datos en historial de oraciones
    $data['DATA'] = $DATA;// asigando datos obtenidos de oración en indice
    
    $data['date'] = date('d/m/Y h:i A', $data['time']);// asignando y obteniendo la fecha
    unset($data['time']);// eliminando indice de variable
    echo json_encode($data);// imprimiendo y convirtiendo arreglo a texto plano
}elseif(isset($_POST['clear'])){// verificando si existe el indice clear de la petición post recivida
    file_put_contents($path, '[]');// vaciando el historial de horaciones
}elseif(isset($_POST['records'])){// verificando si existe el indice records en la peticion post recivida
    $data = json_decode(file_get_contents($path), true);// obtenido historial de oraciones y convirtiendo a json
    foreach($data as $index => $value){// recoriendo arreglo de oraciones
        $data[$index]['date'] = date('d/m/Y h:i A', $data[$index]['time']);// asignando y convirtiendo fecha
    }
    echo json_encode($data);// mostrando arreglo en texto plano
}

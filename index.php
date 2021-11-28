<?php
    $ratings = json_decode(file_get_contents('./assets/data/rating.json'), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlos Gil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="container">
        <hr class="dropdown-divider mt-5">
        <h2 class="text-uppercase text-center text-muted fw-bold">informaci&oacute;n</h2>
        <hr class="dropdown-divider">

        <h1 class="fw-bold text-uppercase text-muted">Carlos</h1>
        <hr class="dropdown-divider">

        <h4 class="text-muted fw-bold">BIOGRAF&iacute;A</h4>
        <img width="200px" src="#" alt="Carlos">

        <p class="alert alert-success">Mi nombre es <span class="fw-bold">Carlos</span>,
            soy estudiante de licenciatura en informática en la Universidad Autonoma de Santo Domingo (UASD-SFM),
            me gusta la programación, y soy aficionado a la tecnologia y a las noticias de indole tecnológica.
        </p>

        <p>Si desea saber sobre la facultad, <a href="https://www.uasd.edu.do/index.php/ciencias"> <span class="badge bg-primary">Click aquí</span> </a></p>

        <p>Areas de la informatica que me resultan interesantes, son las sigueintes:</p>
        <ul class="list-group my-2">
            <li class="list-group-item">Área de Arquitectura y Tecnología de los Computadores</li>
            <li class="list-group-item">Área de Lenguajes y Sistemas Informáticos</li>
        </ul>

        <p>En realidad me gustan todas pero esa me crean una mayor curiosidad e interés</p>

        <hr class="dropdown-divider">
        <h4 class="text-muted fw-bold">ESTUDIOS ACADEMICOS</h4>
        <hr class="dropdown-divider">

        <p>Soy estudiante de licenciatura en informática, estoy en mi 6to semestre en materias superiores,
            en este semestre estoy cursando 4 materias, las cuales son:
        </p>


        <ol class="list-group my-1">
            <li class="list-group-item"> BASES DE DATOS I</li>
            <li class="list-group-item"> LENGUAJE PROGRAMACIÓN III </li>
            <li class="list-group-item"> LAB. LENGUAJE PROGRAMACIÓN III </li>
            <li class="list-group-item"> CALCULO I </li>
        </ol>

        <p>En el semestre anterior tuve las siguientes calificaciones: </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ratings as $rating):?>
                    <tr>
                        <td><?=$rating['course']?></td>
                        <td><?=$rating['rating']?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        <hr class="dropdown-divider mt-5">
        <h2 class="text-uppercase text-center text-muted fw-bold">CONTADOR DE PALABRAS</h2>
        <hr class="dropdown-divider">

        <div class="form-group">
            <label for="txtText">Oraci&oacute;n</label>
            <div class="input-group">
                <input type="text" id="txtText" class="form-control" placeholder="ingresa una oración">
                <button class="btn btn-outline-primary" onclick="onClick()">Mostrar</button>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <div class="card">
                    <div class="card-header text-uppercase fw-bold">informaci&oacute;n de oraci&oacute;n</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="text-uppercase">cantidad de vocales</span>: <span class="text-success fw-bold" id="vowels"></span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-uppercase">vocales</span>: <span class="text-success fw-bold" id="vowel"></span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-uppercase">cantidad de consonantes</span>: <span class="text-success fw-bold" id="consonants"></span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-uppercase">consonantes</span>: <span class="text-success fw-bold" id="consonant"></span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-uppercase">cantidad de palabras</span>: <span class="text-success fw-bold" id="words"></span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-uppercase">palabras</span>: <span class="text-success fw-bold" id="word"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <h4 class="text-uppercase fw-bold text-muted">Historial de Oraciones</h4>
                <table class="table">
                    <caption>
                        <button class="btn btn-outline-danger" onclick="clearRecord()">Limpiar</button>
                    </caption>
                    <thead>
                        <tr>
                            <th>Oraci&oacute;n</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="prayer"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>
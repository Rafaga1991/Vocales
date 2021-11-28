<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="container">
        <h2 class="text-uppercase mt-5 text-center text-muted fw-bold">pr&aacute;ctica de vocales</h2>
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
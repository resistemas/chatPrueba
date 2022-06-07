<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT PRUEBA</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: auto;
        }       

        .w-600 {
            width: 600px;
        }
    </style>
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
</head>
<body style="background-color: #f2f2f2f2">
    <div class="container abs-center">
        <div class="card border-none shadow-sm w-600" >
            <div class="card-header">
                <h4 class="text-center mt-3">CHAT EN TIEMPO REAL</h4>
                <div class="card-body">
                    <div class="row" id="addMessage">
                        {{-- <div class="col-12 text-end">
                            <div class="alert alert-success" role="alert">
                                <h6 class="alert-heading">MARIA</h6>
                                <p class="mb-0">Mensaje Aqui.</p>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-12"><hr>
                        <div id="errors">

                        </div>
                    </div>
                    <div class="col-12">
                        <input type="text" name="identifer" id="identifer" class="form-control mb-4" >
                        <div class="input-group mb-3">
                            <input type="text" name="message" id="message" class="form-control" placeholder="Escribe Tu mensaje" >
                            <button class="btn btn-outline-success" type="button" id="btnEnviar">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>
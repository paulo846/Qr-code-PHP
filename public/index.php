<!doctype html>
<html lang="pt-BR">
<head>
    <title>Gerador de QR CODE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="col-lg-4 offset-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Informe a URL para gerar o Qr Code</label>
                            <input type="url" name="url" id="url" class="form-control" placeholder="https://google.com">
                            <button type="button" class="btn btn-info mt-3" id="enviar">GERAR QR CODE</button>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-12">
                            <img width="100%" src="/assets/img/LOGO-DINAMUS.png" class="img-fluid" alt="Logo" id="qr">
                        </div>
                    </div>
                    <button class="btn btn-info" id="download" style="display: none;">Fazer download</button>
                </div>
            </div>
            <div class="alert alert-danger mt-3" style="display: none;">
                <div id="message-error"></div>
            </div>
            <div class="alert alert-success mt-3" style="display: none;">
                <div id="message-sucess">
                    <b>Qr code gerado com sucesso</b>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="assets/js/geral.min.js"></script>
</body>
</html>
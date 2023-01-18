<!doctype html>
<html lang="en">

<head>
    <title>Gerador de QR CODE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<div class="container mt-5">
    <div class="col-lg-4 offset-lg-4">
        <div class="card">
            <div class="card-body">
                <label for="">Informe a URL para gerar o Qr Code</label>
                <input type="url" name="url" id="url" class="form-control" placeholder="https://google.com">
                <button type="button" class="btn btn-info mt-3" id="enviar">GERAR QR CODE</button>
                <img width="100%" src="/assets/demo.png" class="img-fluid" alt="" id="qr">
                <button class="btn btn-info" id="download">Fazer download</button>
            </div>
        </div>
        <div class="alert alert-danger mt-3" style="display: none;">
            <div id="message-error"></div>
        </div>
        <div class="alert alert-success mt-3" style="display: none;">
            <div id="message-sucess">
                <b>Qr code gerado com sucesso</b>
                <!--<b>Celular:</b> Clique e segure sobre a imagem para aparecer a opção de download <br>
                <b>Desktop:</b> Clique com o botão direto sobre a imagem para salva-la. -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="assets/js/geral.min.js"></script>

</body>

</html>
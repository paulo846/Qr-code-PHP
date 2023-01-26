<?php

if (isset($_GET['site'])) :

    define('BASE_URL', 'https://qrcode.dinamusdigital.com/');

    // Armazena a url enviada no POST
    $data = BASE_URL . 'redirect.php?site=' . $_POST['url'];

    $file = "../assets/text/acessos-" . date('Y-m-d') . ".txt";

    $ip = $_SERVER['REMOTE_ADDR'];

    $content = date('H:i:s') . " - " . $_POST['url'] . " IP:" . $ip . "\n";

    if (file_exists($file)) {
        //echo "O arquivo já existe.";
        file_put_contents($file, $content, FILE_APPEND);
    } else {
        file_put_contents($file, $content);
    }

endif;

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <title>Gerador de QR CODE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <?php if (isset($_GET['site'])) : ?>

    <?php endif; ?>

    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="">
                <?php include('anuncio.php'); ?>
                <!-- Contador -->
                <h3 class="text-center contador">
                    Aguarde!!
                    <div id="countdown-container">
                        <div id="countdown">6s</div>
                    </div>
                    segundos
                </h3>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <?php if (isset($_GET['site'])) : ?>
        <script>
            // Define a data final para a contagem regressiva
            var countDownDate =  new Date().getTime() + 5000; //10 segundos

            $(document).ready(() => {
                setInterval(() => {
                    // Pega a data e hora atual
                    var now = new Date().getTime();
                    // Calcula a distância entre agora e a data final
                    var distance = countDownDate - now;
                    // Calcula o tempo restante em segundos
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    // Exibe o tempo restante na tela
                    $("#countdown").text(seconds + "s ");
                    if (distance <= 0) {
                    $("#countdown").text("Redirecionando...");
                        window.location.href = "<?php echo $_GET['site'] ; ?>";
                    }
                }, 1000);
            })
        </script>
    <?php endif; ?>
</body>

</html>
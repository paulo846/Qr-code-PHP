<?php
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
        <meta http-equiv="refresh" content="10; url=<?= $_GET['site'] ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="">
                <!-- Contador -->
                <h3 class="text-center contador">
                    Você será redirecionado em

                    <div id="countdown-container">
                        <div id="countdown">9s</div>
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
            var countDownDate = new Date().getTime() + 10000; //10 segundos
            var redirectUrl = "<?= $_GET['site'] ?>"; // URL para redirecionamento
        </script>
        <script src="assets/js/redirect.min.js"></script>
    <?php endif; ?>
</body>

</html>
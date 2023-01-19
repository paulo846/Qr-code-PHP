<?php

/**
 * Script para gerar QR Code a partir de uma URL enviada via método POST.
 * Utiliza a biblioteca chillerlan/qrcode para gerar o QR Code.
 *
 * @author Paulo Henrique
 * @version 1.0
 * @param string $url URL para ser convertida em QR Code
 * @return json $dados Dados gerados contém a imagem do QRCode
 */

// Define o tipo de conteúdo da resposta como JSON
header('Content-Type: application/json');
define('BASE_URL', 'https://qrcode.dinamusdigital.com/');

// Faz o include do autoloader do Composer
require_once "../vendor/autoload.php";

// Usa as classes chillerlan\QRCode\QRCode e chillerlan\QRCode\QROptions
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

// Verifica se foi enviada uma url no POST
if (isset($_POST['url'])) {
    try {
        // Armazena a url enviada no POST
        $data = BASE_URL . 'redirect.php?site=' . $_POST['url'];

        $file = "assets/text/gerado-" . date('Y-m-d') . ".txt";

        $ip = $_SERVER['REMOTE_ADDR'];

        $content = date('H:i:s') . " - " . $_POST['url'] . "-" . $ip . "\n";

        if (file_exists($file)) {
            //echo "O arquivo já existe.";
            file_put_contents($file, $content, FILE_APPEND);
        } else {
            file_put_contents($file, $content);
        }


        // Cria as opções para a geração do QRCode
        $options = new QROptions([
            'version'  => 10, //versão do QRCode
            'eccLevel' => QRCode::ECC_L, // Nível de correção de erro L
            'escala'   => 500, // Tamanho da imagem gerada
            'errorCorrectionLevel' => 'H' // Nível de correção de erro H
        ]);

        // Gera o QRCode com as opções definidas
        $dados = [
            'qr' => (new QRCode($options))->render($data)
        ];

        // Define o código de resposta como 200 (sucesso)
        http_response_code(200);
        // Envia os dados gerados como resposta em formato JSON
        echo json_encode($dados);
    } catch (\Exception $e) {
        // Define o código de resposta como 401 (erro)
        http_response_code(401);
        // Envia a mensagem de erro como resposta em formato JSON
        echo json_encode(['message' => $e->getMessage()]);
    }
} else {
    // Define o código de resposta como 400 (bad request)
    http_response_code(400);
    // Envia uma mensagem de erro informando que é necessário informar uma url
    echo json_encode(['message' => 'Informe uma URL']);
}

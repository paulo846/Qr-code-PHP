<?php header('Content-Type: application/json');

require_once "../vendor/autoload.php";

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

if (isset($_POST['url'])) {
    

    try{

   
    $data = $_POST['url'];

    $options = new QROptions([
        'version'  => 6, //versao do QRCode
        'eccLevel' => QRCode::ECC_L, //Error Correction Feature Level L
        'escala'   => 500,
        'errorCorrectionLevel' => 'H'
    ]);

    $dados = 
    [ 
        'qr' => (new QRCode($options))->render($data)
    ];


    
    http_response_code(200);
    echo json_encode($dados);

}catch(\Exception $e){
    http_response_code(401);
    echo json_encode(['message' => $e->getMessage()]);
}

}else{

    http_response_code(400);

    echo json_encode(['message' => 'Informe uma URL']);

}

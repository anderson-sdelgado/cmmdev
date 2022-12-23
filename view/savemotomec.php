<?php

require_once('../control/MotoMecCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

if (isset($body)):

    $motoMecCTR = new MotoMecCTR();
    $idBolArray = $motoMecCTR->salvarDados($body);
    echo json_encode($idBolArray);
    
endif;

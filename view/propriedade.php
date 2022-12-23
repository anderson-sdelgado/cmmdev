<?php

require_once('../control/DataBaseCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

$dataBaseCTR = new DataBaseCTR();
echo $dataBaseCTR->dadosPropriedade();
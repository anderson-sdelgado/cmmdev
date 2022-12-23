<?php

require_once('../control/DataBaseCTR.class.php');

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

header('Content-type: application/json');
$body = file_get_contents('php://input');

$dataBaseCTR = new DataBaseCTR();
echo $dataBaseCTR->dadosREquipPneu($info);
<?php

require_once('../control/BaseControl.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

$baseControl = new BaseControl();
echo $baseControl->dadosProduto();
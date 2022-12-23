<?php

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/DataBaseCTR.class.php');

if (isset($info)):

    $dataBaseCTR = new DataBaseCTR();
    echo $dataBaseCTR->pesqEquip($info);

endif;
<?php

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/BaseControl.class.php');

if (isset($info)):

    $baseControl = new BaseControl();
    echo $baseControl->pesqEquip($info);

endif;
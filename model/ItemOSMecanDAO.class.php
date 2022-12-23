<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of ItemOSMecanDAO
 *
 * @author anderson
 */
class ItemOSMecanDAO extends OCI {

    public function dados() {

        $select = " SELECT "
                        . " I.ITOSMECAN_ID AS \"idItemOS\" "
                        . " , I.OS_ID AS \"idOS\" "
                        . " , I.ITEM_OS AS \"seqItemOS\" "
                        . " , I.SERVICO_ID AS \"idServItemOS\" "
                        . " , I.COMPONENTE_ID AS \"idCompItemOS\" "
                    . " FROM "
                        . " USINAS.VMB_OS_AUTO OS "
                        . " , USINAS.VMB_ITEM_OS_AUTO I "
                    . " WHERE "
                        . " I.OS_ID = OS.OS_ID ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
    public function pesq($os, $equip) {

        $select = " SELECT "
                        . " I.ITOSMECAN_ID AS \"idItemOS\" "
                        . " , I.OS_ID AS \"idOS\" "
                        . " , I.ITEM_OS AS \"seqItemOS\" "
                        . " , I.SERVICO_ID AS \"idServItemOS\" "
                        . " , I.COMPONENTE_ID AS \"idCompItemOS\" "
                    . " FROM "
                        . " USINAS.VMB_OS_AUTO OS "
                        . " , USINAS.VMB_ITEM_OS_AUTO I "
                    . " WHERE "
                        . " OS.NRO = " . $os
                        . " AND "
                        . " OS.EQUIP_ID = " . $equip
                        . " AND "
                        . " I.OS_ID = OS.OS_ID ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

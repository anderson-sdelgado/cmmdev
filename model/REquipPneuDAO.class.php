<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of REquipPneuDAO
 *
 * @author anderson
 */
class REquipPneuDAO extends OCI {
    
    public function pesq($equip) {

        $select = " SELECT " 
                        . " VEP.POSPNCONF_ID AS \"idPosConfPneu\" "
                        . " , VEP.EQUIP_ID AS \"idPneu\" "
                        . " , VEP.POS_PNEU AS \"posPneu\" "
                    . " FROM " 
                        . " VMB_EQUIP_PNEU VEP "
                        . " , EQUIP E"
                    . " WHERE"
                        . " E.NRO_EQUIP = " . $equip
                        . " AND "
                        . " VEP.EQUIP_ID = E.EQUIP_ID ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
     
    public function dados() {

        $select = " SELECT " 
                        . " VEP.POSPNCONF_ID AS \"idPosConfPneu\" "
                        . " , VEP.EQUIP_ID AS \"idPneu\" "
                        . " , VEP.POS_PNEU AS \"posPneu\" "
                    . " FROM " 
                        . " VMB_EQUIP_PNEU VEP "
                        . " , EQUIP E"
                    . " WHERE"
                        . " VEP.EQUIP_ID = E.EQUIP_ID ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

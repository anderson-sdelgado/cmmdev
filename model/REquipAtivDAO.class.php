<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of REquipAtivDAO
 *
 * @author anderson
 */
class REquipAtivDAO extends OCI {
    
    public function pesq($equip) {

        $select = " SELECT "
                        . " R.EQUIP_ID AS \"idEquip\" "
                        . " , R.ATIVAGR_ID AS \"idAtiv\" "
                    . " FROM "
                        . " USINAS.R_EQUIP_ATIVAGR R "
                        . " , USINAS.EQUIP E "
                    . " WHERE "
                        . " E.NRO_EQUIP = " . $equip
                        . " AND "
                        . " R.EQUIP_ID = E.EQUIP_ID "
                    . " ORDER BY "
                        . " R.EQUIP_ID "
                    . " ASC ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
    public function dados() {

        $select = " SELECT "
                        . " R.EQUIP_ID AS \"idEquip\" "
                        . " , R.ATIVAGR_ID AS \"idAtiv\" "
                    . " FROM "
                        . " USINAS.R_EQUIP_ATIVAGR R "
                        . " , USINAS.EQUIP E "
                    . " WHERE "
                        . " R.EQUIP_ID = E.EQUIP_ID "
                    . " ORDER BY "
                        . " R.EQUIP_ID "
                    . " ASC ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

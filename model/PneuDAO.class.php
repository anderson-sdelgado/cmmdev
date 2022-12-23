<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of PneuDAO
 *
 * @author anderson
 */
class PneuDAO extends OCI {
    
    public function dados() {
        
        $select = " SELECT "
                        . " EQUIPCOMPO_ID AS \"idPneu\" "
                        . " , CD AS \"nroPneu\" "
                    . " FROM "
                        . " VMB_PNEU ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
    public function pesq($valor) {
        
        $select = " SELECT "
                        . " EQUIPCOMPO_ID AS \"idPneu\" "
                        . " , CD AS \"codPneu\" "
                    . " FROM "
                        . " VMB_PNEU "
                    . " WHERE "
                        . " CD LIKE '" . $valor . "'";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

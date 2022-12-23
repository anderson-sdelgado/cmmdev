<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of Bocal2DAO
 *
 * @author anderson
 */
class BocalDAO extends OCI {

    public function dados() {

        $select = " SELECT DISTINCT "
                . " BOCALBOMBA_ID AS \"idBocal\" "
                . " , CD AS \"codBocal\" "
                . " , DESCR AS \"descrBocal\" "
                . " FROM "
                . " USINAS.VMB_BOCAL_BOMBA ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

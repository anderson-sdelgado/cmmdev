<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of PropriedadeDAO
 *
 * @author anderson
 */
class PropriedadeDAO extends OCI {
    
    public function dados() {

        $select = " SELECT DISTINCT "
                        . " ID_PROPR_AGR AS \"idPropriedade\" "
                        . " , COD_PROPR_AGR AS \"codPropriedade\" "
                        . " , DESCR_PROPR_AGR AS \"descrPropriedade\" "
                    . " FROM "
                        . " USINAS.V_ECM_OS ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of AtividadeDAO
 *
 * @author anderson
 */
class AtividadeDAO extends OCI {
    
    public function dados() {

        $select = " SELECT "
                        . " A.ATIVAGR_ID AS \"idAtiv\" "
                        . " , A.ATIVAGR_CD AS \"codAtiv\" "
                        . " , CARACTER(A.ATIVAGR_DESCR) AS \"descrAtiv\" "
                . " FROM "
                    . " USINAS.VMB_ATIVAGR_MECAN A ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }

}

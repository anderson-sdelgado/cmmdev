<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of MotoristaDAO
 *
 * @author anderson
 */
class FuncDAO extends OCI {

    public function dados() {

        $select = " SELECT "
                        . " NRO_CRACHA AS \"matricFunc\" "
                        . " , FUNC_NOME AS \"nomeFunc\" "
                    . " FROM "
                        . " USINAS.V_SIMOVA_FUNC "
                    . " ORDER BY "
                        . " NRO_CRACHA "
                    . " ASC ";
        
        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

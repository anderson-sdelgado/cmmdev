<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of ROSAtivDAO
 *
 * @author anderson
 */
class ROSAtivDAO extends OCI {
    
    public function dadosECM() {

        $select = " SELECT DISTINCT "
                        . " OS_ID AS \"idOS\" "
                        . " , ID_ATIV AS \"idAtiv\" "
                    . " FROM "
                        . " USINAS.V_ECM_OS ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
    public function dados($os) {

        $select = " SELECT "
                        . " NRO_OS AS \"nroOS\" "
                        . " , ATIVAGR_ID AS \"idAtiv\" "
                    . " FROM "
                        . " USINAS.V_PMM_OS "
                    . " WHERE "
                        . " NRO_OS = " . $os;

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
     public function verif($os) {

        $select = " SELECT "
                        . " NRO_OS AS \"nroOS\" "
                        . " , ATIVAGR_CD AS \"codAtiv\" "
                    . " FROM "
                        . " USINAS.V_PMM_OS "
                    . " WHERE "
                        . " NRO_OS = " . $os;

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
    public function atual($os) {

        $select = " SELECT "
                        . " ROWNUM AS \"idROSAtiv\" "
                        . " , NRO_OS AS \"nroOS\" "
                        . " , ATIVAGR_CD AS \"codAtiv\" "
                    . " FROM "
                        . " USINAS.V_SIMOVA_OS "
                    . " WHERE "
                        . " NRO_OS = " . $os;

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

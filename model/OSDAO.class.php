<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of OSDAO
 *
 * @author anderson
 */
class OSDAO extends OCI {
    
    public function dados() {

        $select = "SELECT DISTINCT "
                        . " OS_ID AS \"idOS\" "
                        . " , NRO_OS AS \"nroOS\" "
                        . " , ID_LIB_OS AS \"idLibOS\" "
                        . " , ID_PROPR_AGR AS \"idProprAgr\" "
                    . " FROM "
                        . " USINAS.V_ECM_OS ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
        
    public function pesq($os) {

        $select = " SELECT DISTINCT "
                        . " OS_ID AS \"idOS\" "
                        . " , NRO_OS AS \"nroOS\" "
                        . " , NVL(AREA_PROGR, 10) AS \"areaProgrOS\" "
                        . " , SERV_AGR AS \"tipoOS\" "
                    . " FROM "
                        . " USINAS.V_PMM_OS "
                    . " WHERE "
                        . " NRO_OS = " . $os
                    . " ORDER BY "
                        . " OS_ID "
                    . " ASC";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

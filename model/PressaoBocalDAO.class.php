<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of PressaoBocal2DAO
 *
 * @author anderson
 */
class PressaoBocalDAO extends OCI {
    
    public function dados() {

        $select = " SELECT "
                        . " BOCALPRESS_ID AS \"idPressaoBocal\" "
                        . " , BOCALBOMBA_ID AS \"idBocal\" "
                        . " , PRESSAO_KGF_CM2 AS \"valorPressao\" "
                        . " , VELOC_MH AS \"valorVeloc\" "
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

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of RAtivParada
 *
 * @author anderson
 */
class RAtivParadaDAO extends OCI {
    
    public function dados() {

        $select = " SELECT "
                        . " AA.ATIVAGR_ID AS \"idAtiv\" "
                        . " , MOT.MOTPARADA_ID AS \"idParada\" "
                    . " FROM "
                        . " V_SIMOVA_ATIVAGR_NEW AA "
                        . " , USINAS.R_ATIVAGR_MOTPARADA MOT "
                    . " WHERE "
                        . " MOT.ATIVAGR_ID = AA.ATIVAGR_ID "
                        . " AND "
                        . " AA.DESAT = 0 ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }

    public function verif($equip) {

        $select = " SELECT " 
                        . " ROWNUM AS \"idRAtivParada\" "
                        . " , AA.ATIVAGR_ID AS \"idAtiv\" "
                        . " , MOT.MOTPARADA_ID AS \"idParada\" "
                    . " FROM " 
                        . " V_SIMOVA_EQUIP VE " 
                        . " , V_SIMOVA_MODELO_ATIVAGR VA " 
                        . " , V_SIMOVA_ATIVAGR_NEW AA " 
                        . " , USINAS.R_ATIVAGR_MOTPARADA MOT " 
                    . " WHERE " 
                        . " VE.NRO_EQUIP = " . $equip
                        . " AND " 
                        . " VE.MODELEQUIP_ID = VA.MODELEQUIP_ID " 
                        . " AND " 
                        . " VA.ATIVAGR_CD = AA.ATIVAGR_CD " 
                        . " AND " 
                        . " MOT.ATIVAGR_ID = AA.ATIVAGR_ID " 
                        . " AND " 
                        . " AA.DESAT = 0 ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
    
}

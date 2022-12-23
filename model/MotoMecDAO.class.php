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
class MotoMecDAO extends OCI {
    
    public function dados() {

                $select = "SELECT " 
                                . " OP.ID AS \"idOperMotoMec\" "
                                . " , CASE " 
                                    . " WHEN OP.MOTPARADA_ID IS NOT NULL "
                                    . " THEN OP.MOTPARADA_ID "
                                    . " ELSE 0 END AS \"idAtivParOperMotoMec\" "
                                . " , CARACTER(DOM.DESCR) AS \"descrAtivParOperMotoMec\" "
                                . " , OP.FUNCAO_COD AS \"codFuncaoOperMotoMec\" "
                                . " , OP.POSICAO AS \"posOperMotoMec\" "
                                . " , OP.TIPO AS \"tipoOperMotoMec\" "
                                . " , OP.APLIC AS \"aplicOperMotoMec\" "
                                . " , CASE "
                                    . " WHEN OP.MOTPARADA_ID IS NOT NULL "
                                    . " THEN 2 "
                                    . " ELSE 1 END AS \"funcaoOperMotoMec\" "
                            . " FROM " 
                                . " MENU_OPCAO_MOTOMEC OP " 
                                . " , MOTIVO_PARADA MP "
                                . " , DESCR_OPCAO_MOTOMEC DOM "
                            . " WHERE " 
                                . " OP.MOTPARADA_ID = MP.MOTPARADA_ID(+) "
                                . " AND "
                                . " OP.DESCR_OPCAO_ID = DOM.ID "
                            . " ORDER BY " 
                                . " OP.APLIC "
                                . " , OP.TIPO "
                                . " , OP.POSICAO "
                            . " ASC ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

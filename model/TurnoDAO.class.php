<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of TurnoDAO
 *
 * @author anderson
 */
class TurnoDAO extends OCI {

    public function dados() {

        $select = " SELECT "
                        . " TURNOTRAB_ID AS \"idTurno\" "
                        . " , TPTUREQUIP_CD AS \"codTurno\" "
                        . " , NRO_TURNO AS \"nroTurno\" "
                        . " , 'TURNO ' || NRO_TURNO || ': ' || HR_INI || ' - ' || HR_FIM AS \"descrTurno\" "
                    . " FROM "
                        . " USINAS.V_SIMOVA_TURNO_EQUIP_NEW ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }

}

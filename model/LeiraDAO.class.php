<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of LeiraDAO
 *
 * @author anderson
 */
class LeiraDAO extends OCI {

    public function verifMovLeiraMM($idBol, $movLeira) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " PMM_MOV_LEIRA "
                    . " WHERE "
                        . " BOLETIM_ID = " . $idBol
                        . " AND "
                        . " ID_CEL = " . $movLeira->idMovLeira;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
    }

    public function insMovLeiraMM($idBol, $movLeira) {

        $sql = "INSERT INTO PMM_MOV_LEIRA ("
                            . " BOLETIM_ID "
                            . " , LEIRA_ID "
                            . " , TIPO "
                            . " , DTHR "
                            . " , DTHR_CEL "
                            . " , DTHR_TRANS "
                            . " , ID_CEL "
                        . " ) "
                        . " VALUES ("
                            . " :idBol "
                            . " , :idLeira "
                            . " , :tipo "
                            . " , TO_DATE(:dthr, 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthr, 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , :idMovLeira "
                        . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idBol", $idBol);
        oci_bind_by_name($result, ":idLeira", $movLeira->idLeiraMovLeira);
        oci_bind_by_name($result, ":tipo", $movLeira->tipoMovLeira);
        oci_bind_by_name($result, ":dthr", $movLeira->dthrMovLeira);
        oci_bind_by_name($result, ":idMovLeira", $movLeira->idMovLeira);
        oci_execute($result);
        
    }
    
    public function dados() {

        $select = " SELECT "
                    . " LEIRA_ID AS \"idLeira\" "
                    . " , CD AS \"codLeira\" "
                    . " , 0 AS \"statusLeira\" "
                  . " FROM "
                    . " USINAS.LEIRA";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

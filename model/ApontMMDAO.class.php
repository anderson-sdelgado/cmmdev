<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of ApontMMFertDAO
 *
 * @author anderson
 */
class ApontMMDAO extends OCI {

    public function verifApontMM($idBol, $apont) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " PMM_APONTAMENTO "
                    . " WHERE "
                        . " ID_CEL = " . $apont->idApontMM
                        . " AND "
                        . " BOLETIM_ID = " . $idBol;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function idApontMM($idBol, $apont) {

        $select = " SELECT "
                        . " ID AS ID "
                    . " FROM "
                        . " PMM_APONTAMENTO "
                    . " WHERE "
                        . " ID_CEL = " . $apont->idApontMM
                    . " AND "
                        . " BOLETIM_ID = " . $idBol;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'ID');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function insApontMM($idBol, $apont) {

        $sql = "INSERT INTO PMM_APONTAMENTO ("
                            . " BOLETIM_ID "
                            . " , OS_NRO "
                            . " , ATIVAGR_ID "
                            . " , MOTPARADA_ID "
                            . " , DTHR "
                            . " , DTHR_CEL "
                            . " , DTHR_TRANS "
                            . " , NRO_EQUIP_TRANSB "
                            . " , LONGITUDE "
                            . " , LATITUDE "
                            . " , STATUS_CONEXAO "
                            . " , ID_CEL "
                            . " , FRENTE_ID "
                            . " , PROPRAGR_ID "
                        . " ) "
                        . " VALUES ("
                            . " :idBol "
                            . " , :nroOS "
                            . " , :idAtiv "
                            . " , :idParada "
                            . " , TO_DATE(:dthr,'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthr,'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , :nroTransb "
                            . " , :longitude "
                            . " , :latitude "
                            . " , :statusCon "
                            . " , :idApont "
                            . " , :idFrente "
                            . " , :idPropr "
                        . " )";
        
        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idBol", $idBol);
        oci_bind_by_name($result, ":nroOS", $apont->nroOSApontMM);
        oci_bind_by_name($result, ":idAtiv", $apont->idAtivApontMM);
        oci_bind_by_name($result, ":idParada", $apont->idParadaApontMM);
        oci_bind_by_name($result, ":dthr", $apont->dthrApontMM);
        oci_bind_by_name($result, ":nroTransb", $apont->nroTransbApontMM);
        oci_bind_by_name($result, ":longitude", $apont->longitudeApontMM);
        oci_bind_by_name($result, ":latitude", $apont->latitudeApontMM);
        oci_bind_by_name($result, ":statusCon", $apont->statusConApontMM);
        oci_bind_by_name($result, ":idApont", $apont->idApontMM);
        oci_bind_by_name($result, ":idFrente", $apont->idFrenteApontMM);
        oci_bind_by_name($result, ":idPropr", $apont->idProprApontMM);
        oci_execute($result);
        
    }
    
    public function updateApontMMOSAtiv($idBol, $apont) {

        $sql = "UPDATE PMM_APONTAMENTO "
                    . " SET "
                        . " OS_NRO = :nroOS "
                        . " , ATIVAGR_ID = :idAtiv "
                    . " WHERE "
                        . " BOLETIM_ID = :idBol "
                        . " AND "
                        . " OS_NRO IS NULL";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idBol", $idBol);
        oci_bind_by_name($result, ":nroOS", $apont->nroOSApontMM);
        oci_bind_by_name($result, ":idAtiv", $apont->idAtivApontMM);
        oci_execute($result);
    }
    
}

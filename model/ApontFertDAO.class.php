<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of ApontFertDAO
 *
 * @author anderson
 */
class ApontFertDAO extends OCI {
    
    public function verifApontFert($idBol, $apont) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " PMM_APONTAMENTO_FERT "
                    . " WHERE "
                        . " ID_CEL = " . $apont->idApontMMFert
                        . " AND "
                        . " BOLETIM_ID = " . $idBol . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function idApontFert($idBol, $apont) {

        $select = " SELECT "
                        . " ID AS ID "
                    . " FROM "
                        . " PMM_APONTAMENTO_FERT "
                    . " WHERE "
                        . " ID_CEL = " . $apont->idApontMMFert
                        . " AND "
                        . " BOLETIM_ID = " . $idBol . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'ID');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function insApontFert($idBol, $apont) {

        $sql = "INSERT INTO PMM_APONTAMENTO_FERT ("
                            . " BOLETIM_ID "
                            . " , OS_NRO "
                            . " , ATIVAGR_ID "
                            . " , MOTPARADA_ID "
                            . " , DTHR "
                            . " , DTHR_CEL "
                            . " , DTHR_TRANS "
                            . " , BOCALBOMBA_ID "
                            . " , PRESSAO "
                            . " , VELOCIDADE "
                            . " , RAIO "
                            . " , LONGITUDE "
                            . " , LATITUDE "
                            . " , STATUS_CONEXAO "
                        . " ) "
                        . " VALUES ("
                            . " :idBol "
                            . " , :nroOS "
                            . " , :idAtiv "
                            . " , :idParada "
                            . " , TO_DATE(:dthr,'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthr,'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , :bocal "
                            . " , :pressao "
                            . " , :veloc "
                            . " , :raio "
                            . " , :latitude "
                            . " , :longitude "
                            . " , :statusCon "
                        . " )";
        
        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idBol", $idBol);
        oci_bind_by_name($result, ":nroOS", $apont->nroOSApontFert);
        oci_bind_by_name($result, ":idAtiv", $apont->idAtivApontFert);
        oci_bind_by_name($result, ":idParada", $apont->idParadaApontFert);
        oci_bind_by_name($result, ":dthr", $apont->dthrApontFert);
        oci_bind_by_name($result, ":bocal", $apont->bocalApontFert);
        oci_bind_by_name($result, ":pressao", $apont->pressaoApontFert);
        oci_bind_by_name($result, ":veloc", $apont->velocApontFert);
        oci_bind_by_name($result, ":raio", $apont->raioApontFert);
        oci_bind_by_name($result, ":latitude", $apont->latitudeApontFert);
        oci_bind_by_name($result, ":longitude", $apont->longitudeApontFert);
        oci_bind_by_name($result, ":statusCon", $apont->statusConApontFert);
        oci_execute($result);
        
    }
    
}

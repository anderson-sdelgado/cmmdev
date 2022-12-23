<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of BoletimMMDAO
 *
 * @author anderson
 */
class BoletimMMDAO extends OCI {
    //put your code here
    
    public function verifBoletimMM($bol) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                        . " FROM "
                        . " PMM_BOLETIM "
                        . " WHERE "
                        . " DTHR_INICIAL_CEL = TO_DATE('" . $bol->dthrInicialBolMM . "','DD/MM/YYYY HH24:MI')"
                        . " AND "
                        . " EQUIP_ID = " . $bol->idEquipBolMM . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
        		
    }

    public function idBoletimMM($bol) {

        $select = " SELECT "
                . " ID AS ID "
                . " FROM "
                . " PMM_BOLETIM "
                . " WHERE "
                . " DTHR_INICIAL_CEL = TO_DATE('" . $bol->dthrInicialBolMM . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " EQUIP_ID = " . $bol->idEquipBolMM . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'ID');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function insBoletimMMAberto($bol) {

        $sql = "INSERT INTO PMM_BOLETIM ("
                            . " FUNC_MATRIC "
                            . " , EQUIP_ID "
                            . " , TURNO_ID "
                            . " , HOD_HOR_INICIAL "
                            . " , OS_NRO "
                            . " , ATIVAGR_PRINC_ID "
                            . " , DTHR_INICIAL "
                            . " , DTHR_INICIAL_CEL "
                            . " , DTHR_TRANS_INICIAL "
                            . " , STATUS "
                            . " , STATUS_CONEXAO "
                        . " ) "
                        . " VALUES ("
                            . " :matricFunc "
                            . " , :idEquip "
                            . " , :idTurno "
                            . " , :hodometroInicial "
                            . " , :nroOS "
                            . " , :idAtiv "
                            . " , TO_DATE(:dthrInicial, 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthrInicial, 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , 1 "
                            . " , :statusCon "
                        . " )";
        
        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":matricFunc", $bol->matricFuncBolMM);
        oci_bind_by_name($result, ":idEquip", $bol->idEquipBolMM);
        oci_bind_by_name($result, ":idTurno", $bol->idTurnoBolMM);
        oci_bind_by_name($result, ":hodometroInicial", $bol->hodometroInicialBolMM);
        oci_bind_by_name($result, ":nroOS", $bol->nroOSBolMM);
        oci_bind_by_name($result, ":idAtiv", $bol->idAtivBolMM);
        oci_bind_by_name($result, ":dthrInicial", $bol->dthrInicialBolMM);
        oci_bind_by_name($result, ":statusCon", $bol->statusConBolMM);
        oci_execute($result);
        
    }

    public function insBoletimMMFechado($bol) {

        $sql = "INSERT INTO PMM_BOLETIM ("
                            . " FUNC_MATRIC "
                            . " , EQUIP_ID "
                            . " , TURNO_ID "
                            . " , HOD_HOR_INICIAL "
                            . " , HOD_HOR_FINAL "
                            . " , OS_NRO "
                            . " , ATIVAGR_PRINC_ID "
                            . " , DTHR_INICIAL "
                            . " , DTHR_INICIAL_CEL "
                            . " , DTHR_TRANS_INICIAL "
                            . " , DTHR_FINAL "
                            . " , DTHR_FINAL_CEL "
                            . " , DTHR_TRANS_FINAL "
                            . " , STATUS "
                            . " , STATUS_CONEXAO "
                        . " ) "
                        . " VALUES ("
                            . " :matricFunc "
                            . " , :idEquip "
                            . " , :idTurno "
                            . " , :hodometroInicial "
                            . " , :hodometroFinal "
                            . " , :nroOS "
                            . " , :idAtiv "
                            . " , TO_DATE(:dthrInicial, 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , 2 "
                            . " , :statusCon "
                        . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":matricFunc", $bol->matricFuncBolMM);
        oci_bind_by_name($result, ":idEquip", $bol->idEquipBolMM);
        oci_bind_by_name($result, ":idTurno", $bol->idTurnoBolMM);
        oci_bind_by_name($result, ":hodometroInicial", $bol->hodometroInicialBolMM);
        oci_bind_by_name($result, ":hodometroFinal", $bol->hodometroFinalBolMM);
        oci_bind_by_name($result, ":nroOS", $bol->nroOSBolMM);
        oci_bind_by_name($result, ":idAtiv", $bol->idAtivPrincBolMM);
        oci_bind_by_name($result, ":dthrInicial", $bol->dthrInicialBolMM);
        oci_bind_by_name($result, ":dthrFinal", $bol->dthrFinalBolMM);
        oci_bind_by_name($result, ":statusCon", $bol->statusConBolMM);
        oci_execute($result);
        
    }

    public function updateBoletimMMFechado($idBol, $bol) {

        $sql = "UPDATE PMM_BOLETIM "
                        . " SET "
                            . " HOD_HOR_FINAL = :hodometroFinal "
                            . " , STATUS = 2 "
                            . " , DTHR_FINAL = TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , DTHR_FINAL_CEL = TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , DTHR_TRANS_FINAL = SYSDATE "
                        . " WHERE "
                            . " ID = :idBol ";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idBol", $idBol);
        oci_bind_by_name($result, ":hodometroFinal", $bol->hodometroFinalBolMM);
        oci_bind_by_name($result, ":dthrFinal", $bol->dthrFinalBolMM);
        oci_execute($result);
        
    }
    
    public function updateBoletimMMOSAtiv($idBol, $apont) {

        $sql = "UPDATE PMM_BOLETIM "
                        . " SET "
                            . " OS_NRO = :nroOS "
                            . " , ATIVAGR_PRINC_ID = :idAtiv "
                        . " WHERE "
                            . " ID = :idBol "
                            . " AND "
                            . " OS_NRO IS NULL ";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idBol", $idBol);
        oci_bind_by_name($result, ":nroOS", $apont->nroOSApontMM);
        oci_bind_by_name($result, ":idAtiv", $apont->idAtivApontMM);
        oci_execute($result);
        
    }

}

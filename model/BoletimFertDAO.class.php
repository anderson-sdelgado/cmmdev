<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of BoletimMMFert
 *
 * @author anderson
 */
class BoletimFertDAO extends OCI {

    public function verifBoletimFert($bol) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PMM_BOLETIM_FERT "
                . " WHERE "
                . " DTHR_INICIAL_CEL = TO_DATE('" . $bol->dthrInicialBolFert . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " EQUIP_ID = " . $bol->idEquipBolFert . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function idBoletimFert($bol) {

        $select = " SELECT "
                . " ID AS ID "
                . " FROM "
                . " PMM_BOLETIM_FERT "
                . " WHERE "
                . " DTHR_INICIAL_CEL = TO_DATE('" . $bol->dthrInicialBolFert . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " EQUIP_ID = " . $bol->idEquipBolFert . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'ID');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function insBoletimFertAberto($bol) {
        
        if ($bol->idEquipBolFert == $bol->idEquipMotoBombaBolFert) {
            $idEquipMotoBomba = null;
        }
        else{
            $idEquipMotoBomba = $bol->idEquipBombaBolFert;
        }

        $sql = "INSERT INTO PMM_BOLETIM_FERT ("
                            . " FUNC_MATRIC "
                            . " , EQUIP_ID "
                            . " , EQUIP_BOMBA_ID "
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
                            . " , :idEquipMotoBomba "
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
        oci_bind_by_name($result, ":matricFunc", $bol->matricFuncBolFert);
        oci_bind_by_name($result, ":idEquip", $bol->idEquipBolFert);
        oci_bind_by_name($result, ":idEquipMotoBomba", $idEquipMotoBomba);
        oci_bind_by_name($result, ":idTurno", $bol->idTurnoBolFert);
        oci_bind_by_name($result, ":hodometroInicial", $bol->hodometroInicialBolFert);
        oci_bind_by_name($result, ":nroOS", $bol->nroOSBolFert);
        oci_bind_by_name($result, ":idAtiv", $bol->idAtivPrincBolFert);
        oci_bind_by_name($result, ":dthrInicial", $bol->dthrInicialBolFert);
        oci_bind_by_name($result, ":statusCon", $bol->statusConBolFert);
        oci_execute($result);
        
    }

    public function insBoletimFertFechado($bol) {
        
        if ($bol->idEquipBolFert == $bol->idEquipMotoBombaBolFert) {
            $idEquipMotoBomba = null;
        }
        else{
            $idEquipMotoBomba = $bol->idEquipBombaBolFert;
        }

        $sql = "INSERT INTO PMM_BOLETIM_FERT ("
                            . " FUNC_MATRIC "
                            . " , EQUIP_ID "
                            . " , EQUIP_BOMBA_ID "
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
                            . " , :idEquipMotoBomba "
                            . " , :idTurno "
                            . " , :hodometroInicial "
                            . " , :hodometroFinal "
                            . " , :nroOS "
                            . " , :idAtiv "
                            . " , TO_DATE(:dthrInicial, 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthrInicial, 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthrFinal, 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , 2 "
                            . " , :statusCon "
                        . " )";
        
        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":matricFunc", $bol->matricFuncBolFert);
        oci_bind_by_name($result, ":idEquip", $bol->idEquipBolFert);
        oci_bind_by_name($result, ":idEquipMotoBomba", $idEquipMotoBomba);
        oci_bind_by_name($result, ":idTurno", $bol->idTurnoBolFert);
        oci_bind_by_name($result, ":hodometroInicial", $bol->hodometroInicialBolFert);
        oci_bind_by_name($result, ":hodometroFinal", $bol->hodometroFinalBolFert);
        oci_bind_by_name($result, ":nroOS", $bol->nroOSBolFert);
        oci_bind_by_name($result, ":idAtiv", $bol->idAtivPrincBolFert);
        oci_bind_by_name($result, ":dthrInicial", $bol->dthrInicialBolFert);
        oci_bind_by_name($result, ":dthrFinal", $bol->dthrFinalBolFert);
        oci_bind_by_name($result, ":statusCon", $bol->statusConBolFert);
        oci_execute($result);
        
    }

    public function updateBoletimFertFechado($idBol, $bol) {

        $sql = "UPDATE PMM_BOLETIM_FERT "
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
        oci_bind_by_name($result, ":hodometroFinal", $bol->hodometroFinalBolFert);
        oci_bind_by_name($result, ":dthrFinal", $bol->dthrFinalBolFert);
        oci_execute($result);
        
    }
    
}

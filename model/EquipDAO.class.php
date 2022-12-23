<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of EquipDAO
 *
 * @author anderson
 */
class EquipDAO extends OCI {

    public function pesq($equip) {

        $select = " SELECT "
                        . " E.EQUIP_ID AS \"idEquip\" "
                        . " , E.NRO_EQUIP AS \"nroEquip\" "
                        . " , E.CLASSEQUIP_CD AS \"classifEquip\" "
                        . " , E.CLASSOPER_CD AS \"codClasseEquip\" "
                        . " , CARACTER(E.CLASSOPER_DESCR) AS \"descrClasseEquip\" "
                        . " , E.TPTUREQUIP_CD AS \"codTurno\" "
                        . " , NVL(C.PLMANPREV_ID, 0) AS \"idCheckList\" "
                        . " , DECODE(NVL(R.TP_EQUIP, 0), 1, 2, 2, 2, 1) AS \"tipoEquip\" "
                        . " , NVL(PBH.HOD_HOR_FINAL, 0) AS \"horimetroEquip\" "
                    . " FROM "
                        . " V_EQUIP E "
                        . " , USINAS.V_EQUIP_PLANO_CHECK C "
                        . " , USINAS.ROLAO R "
                        . " , (SELECT EQUIP_ID, HOD_HOR_FINAL FROM INTERFACE.PMM_BOLETIM PB WHERE PB.ID IN "
                        . " (SELECT MAX(PB2.ID) FROM PMM_BOLETIM PB2 GROUP BY PB2.EQUIP_ID)) PBH "
                    . " WHERE  "
                        . " E.NRO_EQUIP = " . $equip
                        . " AND E.NRO_EQUIP = C.EQUIP_NRO(+) "
                        . " AND E.EQUIP_ID = R.EQUIP_ID(+) "
                        . " AND E.EQUIP_ID = PBH.EQUIP_ID(+)"
                        . " AND E.TPTUREQUIP_CD IS NOT NULL ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
        
    public function dados() {

        $select = " SELECT "
                        . " E.EQUIP_ID AS \"idEquip\" "
                        . " , E.NRO_EQUIP AS \"nroEquip\" "
                        . " , E.CLASSEQUIP_CD AS \"classifEquip\" "
                        . " , E.CLASSOPER_CD AS \"codClasseEquip\" "
                        . " , CARACTER(E.CLASSOPER_DESCR) AS \"descrClasseEquip\" "
                        . " , E.TPTUREQUIP_CD AS \"codTurno\" "
                        . " , NVL(C.PLMANPREV_ID, 0) AS \"idCheckList\" "
                        . " , CASE WHEN E.CLASSOPER_CD = 211 AND R.TP_EQUIP IS NULL THEN 4  "
                        . " ELSE NVL(R.TP_EQUIP, 0) END AS \"tipoEquipFert\" "
                        . " , NVL(PBH.HOD_HOR_FINAL, 0) AS \"horimetroEquip\" "
                    . " FROM "
                        . " V_EQUIP E "
                        . " , USINAS.V_EQUIP_PLANO_CHECK C "
                        . " , USINAS.ROLAO R "
                        . " , (SELECT EQUIP_ID, HOD_HOR_FINAL FROM INTERFACE.PMM_BOLETIM PB WHERE PB.ID IN "
                        . " (SELECT MAX(PB2.ID) FROM PMM_BOLETIM PB2 GROUP BY PB2.EQUIP_ID)) PBH "
                    . " WHERE  "
                        . " E.NRO_EQUIP = C.EQUIP_NRO(+) "
                        . " AND E.EQUIP_ID = R.EQUIP_ID(+) "
                        . " AND E.EQUIP_ID = PBH.EQUIP_ID(+)"
                        . " AND E.TPTUREQUIP_CD IS NOT NULL ";

        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }
    
}

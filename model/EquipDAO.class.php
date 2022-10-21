<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../Conn.class.php');
/**
 * Description of EquipDAO
 *
 * @author anderson
 */
class EquipDAO extends Conn {

    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;
    
    public function pesq($equip) {

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
                        . " E.NRO_EQUIP = " . $equip
                        . " AND E.NRO_EQUIP = C.EQUIP_NRO(+) "
                        . " AND E.EQUIP_ID = R.EQUIP_ID(+) "
                        . " AND E.EQUIP_ID = PBH.EQUIP_ID(+)"
                        . " AND E.TPTUREQUIP_CD IS NOT NULL ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}

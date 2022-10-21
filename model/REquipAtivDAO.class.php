<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../Conn.class.php');
/**
 * Description of REquipAtivDAO
 *
 * @author anderson
 */
class REquipAtivDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function pesq($equip) {

        $select = " SELECT "
                        . " R.EQUIP_ID AS \"idEquip\" "
                        . " , R.ATIVAGR_ID AS \"idAtiv\" "
                    . " FROM "
                        . " USINAS.R_EQUIP_ATIVAGR R "
                        . " , USINAS.EQUIP E "
                    . " WHERE "
                        . " E.NRO_EQUIP = " . $equip
                        . " AND "
                        . " R.EQUIP_ID = E.EQUIP_ID "
                    . " ORDER BY "
                        . " R.EQUIP_ID "
                    . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}

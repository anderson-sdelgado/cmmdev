<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../Conn.class.php');
/**
 * Description of PropriedadeDAO
 *
 * @author anderson
 */
class PropriedadeDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT DISTINCT "
                        . " ID_PROPR_AGR AS \"idPropriedade\" "
                        . " , COD_PROPR_AGR AS \"codPropriedade\" "
                        . " , DESCR_PROPR_AGR AS \"descrPropriedade\" "
                    . " FROM "
                        . " USINAS.V_ECM_OS ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}

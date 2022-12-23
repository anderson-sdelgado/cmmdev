<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/BoletimMMDAO.class.php');
require_once('../model/ApontMMDAO.class.php');
/**
 * Description of MotoMecControl
 *
 * @author anderson
 */
class MotoMecCTR {
    
    public function salvarDados($body) {
        $bolArray = array();
        $boletimArray = json_decode($body);
        foreach($boletimArray as $bol){
            $idBolBD = $this->salvarBoletim($bol);
            $apontArray = $this->salvarItem($idBolBD, $bol->apontList);
            $bolArray[] = array("idBolMM" => $bol->idBolMM, "apontList" => $apontArray);
        }
        return $bolArray;
    }
    
    private function salvarBoletim($bol) {
        $boletimMMDAO = new BoletimMMDAO();
        $v = $boletimMMDAO->verifBoletimMM($bol);
        if ($v == 0) {
            $boletimMMDAO->insBoletimMMFechado($bol);
            $idBolBD = $boletimMMDAO->idBoletimMM($bol);
        } else {
            $idBolBD = $boletimMMDAO->idBoletimMM($bol);
            $boletimMMDAO->updateBoletimMMFechado($idBolBD, $bol);
        }
        return $idBolBD;
    }

    private function salvarItem($idBolBD, $dadosApont) {
        $idApontArray = array();
        $apontMMDAO = new ApontMMDAO;
        $boletimMMDAO = new BoletimMMDAO();
        foreach ($dadosApont as $apont) {
            $v = $apontMMDAO->verifApontMM($idBolBD, $apont);
            if ($v == 0) {
                $apontMMDAO->insApontMM($idBolBD, $apont);
            }
//            if($apont->osApontMMFert > 0){
//                $boletimMMDAO->updateBoletimMMOSAtiv($idBolBD, $apont);
//                $apontMMDAO->updateApontMMOSAtiv($idBolBD, $apont);
//            }
            $idApontArray[] = array("idApontMM" => $apont->idApontMM);
        }
        return $idApontArray;
    }
    
}

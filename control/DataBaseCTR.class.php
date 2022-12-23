<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/AtividadeDAO.class.php');
require_once('../model/BocalDAO.class.php');
require_once('../model/ComponenteDAO.class.php');
require_once('../model/EquipDAO.class.php');
require_once('../model/EquipSegDAO.class.php');
require_once('../model/FrenteDAO.class.php');
require_once('../model/FuncDAO.class.php');
require_once('../model/ItemCheckListDAO.class.php');
require_once('../model/ItemOSMecanDAO.class.php');
require_once('../model/LeiraDAO.class.php');
require_once('../model/MotoMecDAO.class.php');
require_once('../model/OSDAO.class.php');
require_once('../model/ParadaDAO.class.php');
require_once('../model/PneuDAO.class.php');
require_once('../model/PressaoBocalDAO.class.php');
require_once('../model/ProdutoDAO.class.php');
require_once('../model/PropriedadeDAO.class.php');
require_once('../model/RAtivParadaDAO.class.php');
require_once('../model/REquipAtivDAO.class.php');
require_once('../model/REquipPneuDAO.class.php');
require_once('../model/RFuncaoAtivParDAO.class.php');
require_once('../model/ROSAtivDAO.class.php');
require_once('../model/ServicoDAO.class.php');
require_once('../model/TurnoDAO.class.php');

class DataBaseCTR {

    public function dadosAtiv() {
        $atividadeDAO = new AtividadeDAO();
        return json_encode($atividadeDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosBocal() {
        $bocalDAO = new BocalDAO();
        return json_encode($bocalDAO->dados(), JSON_NUMERIC_CHECK);
    }
        
    public function dadosComponente() {
        $componenteDAO = new ComponenteDAO();
        return json_encode($componenteDAO->dados(), JSON_NUMERIC_CHECK);
    }
        
    public function dadosEquip($info) {
        
        $dado = $info['nroEquip'];
        
        $equipDAO = new EquipDAO();
        return json_encode($equipDAO->pesq($dado), JSON_NUMERIC_CHECK);
    }
    
    public function dadosEquipSeg() {
        $equipSegDAO = new EquipSegDAO();
        return json_encode($equipSegDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosFrente() {
        $frenteDAO = new FrenteDAO();
        return json_encode($frenteDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosFunc() {
        $funcDAO = new FuncDAO();
        return json_encode($funcDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosItemCheckList() {
        $itemCheckListDAO = new ItemCheckListDAO();
        return json_encode($itemCheckListDAO->dados(), JSON_NUMERIC_CHECK);
    }
        
    public function dadosItemOSMecan() {
        $itemOSMecanDAO = new ItemOSMecanDAO();
        return json_encode($itemOSMecanDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosLeira() {
        $leiraDAO = new LeiraDAO();
        return json_encode($leiraDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosMotoMec() {
        $motoMecDAO = new MotoMecDAO();
        return json_encode($motoMecDAO->dados(), JSON_NUMERIC_CHECK);
    }

    public function dadosOS() {
                
        $osDAO = new OSDAO();
        return json_encode($osDAO->dados(), JSON_NUMERIC_CHECK);       
    }
        
    public function pesqOS($info) {
        
        $dado = $info['nroOS'];
        
        $osDAO = new OSDAO();
        return json_encode($osDAO->pesq($dado), JSON_NUMERIC_CHECK);
        
    }
    
    public function dadosParada() {
        $paradaDAO = new ParadaDAO();
        return json_encode($paradaDAO->dados(), JSON_NUMERIC_CHECK);
    }
        
    public function dadosPneu() {
        $pneuDAO = new PneuDAO();
        return json_encode($pneuDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosPressaoBocal() {
        $pressaoBocalDAO = new PressaoBocalDAO();
        return json_encode($pressaoBocalDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosProduto() {
        $produtoDAO = new ProdutoDAO();
        return json_encode($produtoDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosPropriedade() {
        $propriedadeDAO = new PropriedadeDAO();
        return json_encode($propriedadeDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosRAtivParada() {
        $rAtivParadaDAO = new RAtivParadaDAO();
        return json_encode($rAtivParadaDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosREquipAtiv($info) {
                
        $dado = $info['nroEquip'];
        
        $rEquipAtivDAO = new REquipAtivDAO();
        return json_encode($rEquipAtivDAO->pesq($dado), JSON_NUMERIC_CHECK);
    }
        
    public function dadosREquipPneu($info) {
                
        $dado = $info['nroEquip'];
        
        $rEquipPneuDAO = new REquipPneuDAO();
        return json_encode($rEquipPneuDAO->pesq($dado), JSON_NUMERIC_CHECK);
    }
    
    public function dadosRFuncaoAtivPar() {
        $rFuncaoAtivParDAO = new RFuncaoAtivParDAO();
        return json_encode($rFuncaoAtivParDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosROSAtiv() {
        $rOSAtivDAO = new ROSAtivDAO();
        return json_encode($rOSAtivDAO->dadosECM(), JSON_NUMERIC_CHECK);
    }
    
    public function pesqROSAtiv($info) {
                        
        $dado = $info['nroOS'];
        
        $rOSAtivDAO = new ROSAtivDAO();
        return json_encode($rOSAtivDAO->dados($dado), JSON_NUMERIC_CHECK);
    }
    
    public function dadosServico() {
        $servicoDAO = new ServicoDAO();
        return json_encode($servicoDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function dadosTurno() {
        $turnoDAO = new TurnoDAO();
        return json_encode($turnoDAO->dados(), JSON_NUMERIC_CHECK);
    }
    
    public function pesqEquip($info) {

        $equipDAO = new EquipDAO();
        $rEquipAtivDAO = new REquipAtivDAO();
        $rEquipPneuDAO = new REquipPneuDAO();

        $dado = $info['dado'];

        $retorno = array("Equip" => $equipDAO->pesq($dado),
                         "REquipAtiv" => $rEquipAtivDAO->pesq($dado),
                         "REquipPneu" => $rEquipPneuDAO->pesq($dado));

        return json_encode($retorno, JSON_NUMERIC_CHECK);
        
    }
    
}

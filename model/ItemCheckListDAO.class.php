<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of ItemChecklistDAO
 *
 * @author anderson
 */
class ItemCheckListDAO extends OCI {
    
    public function dados() {

        $select = " SELECT "
                        . " ITMANPREV_ID AS \"idItemCheckList\" "
                        . " , PLMANPREV_ID AS \"idCheckList\" "
                        . " , CARACTER(PROC_OPER) AS \"descrItemCheckList\" "
                    . " FROM "
                        . " V_ITEM_PLANO_CHECK "
                    . " WHERE "
                        . " PROC_OPER IS NOT NULL ";
        
        $this->Conn = parent::getConn();
        $statement = oci_parse($this->Conn, $select);
        oci_execute($statement);
        oci_fetch_all($statement, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $result;
        
    }

    public function atualCheckList($equip) {
        
        $sql = " UPDATE "
                        . " USINAS.ATUALIZA_CHECKLIST_MOBILE  "
                    . " SET "
                        . " DT_MOBILE = SYSDATE "
                    . " WHERE "
                        . " EQUIP_NRO = " . $equip;

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_execute($result);
    }

}

<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OCI
 *
 * @author anderson
 */
class OCI {

    /** @var PDO */
    private static $Connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
    private static function Conectar() {
        try {

            if (self::$Connect == null) {

                $tns = "(DESCRIPTION = (ENABLE = BROKEN)(FAILOVER = ON)(LOAD_BALANCE = YES)
						(ADDRESS = (PROTOCOL = TCP)(HOST = stafe-scan)(PORT = 1521))
						(CONNECT_DATA =
						  (SERVER = DEDICATED)
						  (SERVICE_NAME = STAFEQA)
						  (FAILOVER_MODE =
							(TYPE = SELECT)
							(METHOD = BASIC)
							(RETRIES = 180)
							(DELAY = 5)
						   )
						)
					  )";

                self::$Connect = oci_connect('INTERFACE', 'FGBNY946', $tns, 'AL32UTF8');
                
            }
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

        return self::$Connect;
    }

    protected static function getConn() {
        return self::Conectar();
    }
    
}

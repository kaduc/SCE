<?php

include_once dirname(__DIR__) . '/config.php';
include_once 'config.ini';

/**
 * Description of conector
 *
 * @author carlos
 */
class conector {

    //put your code here
    function __construct() {
        
    }

    function select($table, $where, $id = NULL) {
        if($id == NULL){
            $id = "*";
        }
        try {

            $conectar = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        } catch (Exception $ex) {

            echo "Erro: {$ex}";
        }
        //SELECT tipo FROM  `sce_produtos` WHERE STATUS =1
        $sql = "SELECT {$id} FROM {$table} WHERE {$where};";
        
        return $conectar->query($sql);
        
    }
    function insert($table, $campos ,$valores){
        
         try {

            $conectar = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        } catch (Exception $ex) {

            echo "Erro: {$ex}";
        }

        $sql = "INSERT INTO `{$table}`({$campos}) VALUES ({$valores})";

        return $conectar->query($sql);
        
    }
}

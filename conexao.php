<?php

class Db
{

    protected static $conexao = null;
        
    public static function init()
    {
        try {
            if(self::$conexao === null){
                self::$conexao = new PDO("mysql:host=localhost;dbname=database;", "root", "");
            }
            
            return self::$conexao;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

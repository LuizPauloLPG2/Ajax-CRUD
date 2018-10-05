<?php

class Db
{

    public static function _conexao()
    {
        try {
            $conexao = new PDO("mysql:host=localhost;dbname=database;", "root", "");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $conexao;
    }

}

<?php

class Db
{

    public static function _conexao()
    {
        try {
            $conexao = new PDO("mysql:host=localhost;dbname=cliente;", "vagrant", "123456");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $conexao;
    }

}

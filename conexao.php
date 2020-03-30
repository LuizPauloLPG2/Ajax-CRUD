<?php

class Db
{
        
    public static function init()
    {
        try {
            return new PDO("mysql:host=localhost;dbname=database;", "root", "", array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

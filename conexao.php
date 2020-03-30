<?php

class Db
{
        
    public static function init()
    {
        try {
            return new PDO("mysql:host=localhost;dbname=database;", "root", "");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

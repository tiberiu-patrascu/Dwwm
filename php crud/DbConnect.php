<?php

class DbConnect
{
    private static $instance = null;

    private function __construct(){

    }

    public static function getDb() {

        if (self::$instance === null) {
            try {
                $dsn= 'mysql:host=localhost;port=3306;dbname=crud;charset=UTF8';

                $option = [
                    PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES=>false
                ];

                self::$instance = new PDO($dsn,'root','',$option);

            } catch (PDOException $e) {
                exit("erreur sql".$e->getMessage());
            }
        }

        return self::$instance;
    }
}
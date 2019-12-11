<?php

namespace Models;

class Db
{
    private static $instance = null;//nombre de classe
    //private $instance; variable d'instance

    private function __construct(){}

    //self = la classe actuelle 
    public static function getInstance(){
        //is_null(Db::$instnance) sau Db::$instance !== null
        if(Db::$instance === null){
            // try{
            //     $requetteDsn = 'mysql:host=localhost;port=3306;dbname=flipquizz;charset=UTF8';

            //     $option = [
            //         \PDO::ATTR_ERRMODE =>\PDO::ERRMODE_EXCEPTION,
            //         \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
            //         \PDO::ATTR_EMULATE_PREPARES=>false
            //     ];

            //     Db::$instance = new \PDO($requetteDsn, 'root','',$option);
            // }
            // catch(\PDOException $e){
            //     exit ('Erreur SQL'.$e->getMessage());
            // }

            Db::$instance = new \PDO('mysql:host=localhost;port=3306;dbname=flipquizz;charset=UTF8','root','',[
                \PDO::ATTR_ERRMODE =>\PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES=>false
            ]);

        }

        //return Db::$instance;
        //envoyer une instance
        return self::$instance;
    }
}
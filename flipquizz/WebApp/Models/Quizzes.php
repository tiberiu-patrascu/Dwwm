<?php

namespace Models;

//une ligne vide entre balise php et namespace, apres le namespace 2lignes et après la clase
class Quizzes
{
    //static plus rapide que object
    public STATIC FUNCTION getQuizzes(){
        $sql = "SELECT * FROM quizz;";

        $pdo = Db::getInstance();
        //querry uniquement avec select envoie la requette vide
        $statement = $pdo->query($sql);

        $result = $statement->fetchAll();

        return $result;

    }

    public static function getQuiz($id)
    {
        //:id = marker 
        $sql = "SELECT * FROM quizz WHERE quizz_id=:id;";
        //preparer requette en attants requette en cash
        $stmt = Db::getInstance()->prepare($sql);

        $vars = [
            ':id' => $id
        ];

        $stmt->execute($vars);

        //rec de resultat
        $result = $stmt->fetch();

        //fermer les courseur de la requette
        $stmt->closeCursor();

        return $result;
    }
    
}
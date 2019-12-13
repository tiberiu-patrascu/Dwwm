<?php

namespace Models;

//une ligne vide entre balise php et namespace, apres le namespace 2lignes et après la clase
class Quizzes
{
    //static plus rapide que object
    public static function getQuizzes(){
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
    
    public static function insertQuiz(array $quiz){
        $sql = "INSERT INTO quizz (quizz_theme, quizz_textcolor, quizz_backcolor)
        VALUES(:quizz_theme, :quizz_textcolor, :quizz_backcolor);";

        $stmt = Db::getInstance()->prepare($sql);

        $vars = [
            ':quizz_theme' => $quiz['quizz_theme'],
            ':quizz_textcolor' => $quiz['quizz_textcolor'],
            ':quizz_backcolor' => $quiz['quizz_backcolor']
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result; 
    }

    public static function updateQuiz(array $quiz){

    }
}
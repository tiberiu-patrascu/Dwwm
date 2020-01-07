<?php

namespace Models;

class Questions extends Model
{
    // public static function getQuestions(){
    //     $sql = "SELECT * FROM fp_questions;";

    //     $pdo = Db::getInstance();

    //     $stm = $pdo->query($sql);

    //     $result = $stm->fetchAll();

    //     return $result;
    // }

    // public static function getQuestion($id)
    // {
    //     //:id = marker 
    //     $sql = "SELECT * FROM fp_questions WHERE question_id=:id;";
    //     //preparer requette en attants requette en cash
    //     $stmt = Db::getInstance()->prepare($sql);

    //     $vars = [
    //         ':id' => $id
    //     ];

    //     $stmt->execute($vars);

    //     //rec de resultat
    //     $result = $stmt->fetch();

    //     //fermer les courseur de la requette
    //     $stmt->closeCursor();

    //     return $result;
    // }
    
    public function __construct()
    {
        parent::__construct('fp_questions','question_id');
    }

    public static function insertQuestions(array $question){
        $sql = "INSERT INTO fp_questions (question_content, question_answer, question_level)
        VALUES(:question_content, :question_answer, :question_level);";

        $stmt = Db::getInstance()->prepare($sql);

        $vars = [
            ':question_content' => $question['question_content'],
            ':question_answer' => $question['question_answer'],
            ':question_level' => $question['question_level']
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result; 
    }

    public static function updateQuestions(array $question){

    }
}
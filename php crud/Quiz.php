<?php

class Quiz extends Dbtable
{
    public function __construct()
    {
        parent::__construct('fp-quizzes', 'quiz_id');
    }

    public static function select($id)
    {
        $sql = "SELECT * FROM fp_quizzes WHERE quiz_id=:id;";

        $stmt = DbConnect::getDb()->prepare($sql);

        $values = [
            'id'=>$id
        ];

        $stmt->execute($values);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }

    public static function selectAll()
    {
        $sql = "SELECT * FROM fp_quizzes;";

        $pdo = DbConnect::getDb();
        //querry uniquement avec select envoie la requette vide
        $statement = $pdo->query($sql);

        $result = $statement->fetchAll();

        return $result;

    }
}
<?php

namespace Models;

class Categories extends Model
{
    // public static function getCategories(){
    //     $sql = "SELECT * FROM fp_categories;";

    //     $pdo = Db::getInstance();

    //     $stm = $pdo->query($sql);

    //     $result = $stm->fetchAll();

    //     return $result;
    // }

    // public static function getCategory($id)
    // {
    //     //:id = marker 
    //     $sql = "SELECT * FROM fp_categories WHERE category_id=:id;";
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
        parent::__construct('fp_categories','category_id');
    }

    public static function insertQuestions(array $category){
        $sql = "INSERT INTO fp_categories (category_name, category_description)
        VALUES(:category_name, :category_description);";

        $stmt = Db::getInstance()->prepare($sql);

        $vars = [
            ':category_name' => $category['category_name'],
            ':category_description' => $category['category_description']
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result; 
    }

    public static function updateQuestions(array $category){

    }
}
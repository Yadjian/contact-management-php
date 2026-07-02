<?php

/*
* Model managing contact categories
*/
class CategoriesModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    //Method that retrieves all categories
    public function findAllCategories() {
        $sql = 'SELECT *
                FROM categories
                ORDER BY name ASC';
                
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

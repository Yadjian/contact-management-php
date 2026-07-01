<?php

class Categories {
    private $db;

    public function __construct($dto) {
        $this->db = $dto;
    }

    /* Method that retrieves all categories */
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

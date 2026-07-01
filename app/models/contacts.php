<?php

class Contacts {
    private $db;

    function __construct($pdo) {
        $this->db = $pdo;
    }

    /* Method that retrieves all contacts */
    public function findAllContact() {
        $sql = 'SELECT contacts.*, categories.name 
                FROM contacts 
                JOIN categories ON contacts.category_id = categories.id
                ORDER BY contacts.last_name ASC';

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Method that finds a single contact */
    public function findContact($id) {
        $sql = 'SELECT contacts.*, categories.name 
                FROM contacts 
                JOIN categories ON contacts.category_id = categories.id
                WHERE contacts.id = :id';

        $query = $this->db->prepare($sql);
        $query->execute(['id' => $id]);

        return $query->fetch(PDO::FETCH_ASSOC); 
    }

    /* Method that creates a new contact */
    public function addContact($data) {
        $sql = 'INSERT INTO contacts (first_name, last_name, email, phone, city, address, category_id) 
                VALUES (:first_name, :last_name, :email, :phone, :city, :address, :category_id)';

        $query = $this->db->prepare($sql);

        return $query->execute($data);
    }

    /* Method that deletes a contact */
    public function deleteContact($id) {
        $sql = 'DELETE FROM contacts 
                WHERE id = :id';
        
        $query = $this->db->prepare($sql);

        return $query->execute(['id' => $id]);
    }

    /* Method that updates an existing contact */
    public function updateContact($id, $data) {
        $sql = 'UPDATE contacts 
                SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, city = :city, address = :address, category_id = :category_id 
                WHERE contacts.id = :id';
        
        $data['id'] = $id;
        $query = $this->db->prepare($sql);
       
       return $query->execute($data);
    }
}
?>

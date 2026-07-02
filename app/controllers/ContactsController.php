<?php

/*
* Controller for managing contacts.
*/
class ContactsController {
    private $contactsModel;
    private $categoriesModel;

    public function __construct($contactsModel, $categoriesModel) {
        $this->contactsModel = $contactsModel;
        $this->categoriesModel = $categoriesModel;
    }

    /* Displays the list of contacts */
    public function list() {
        $contacts = $this->contactsModel->findAllContacts();
        require_once ("./app/views/myContacts.php");    
    }

    /* Handles the addition of a new contact */
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['phone']) || empty($_POST['email'])) {
                $error = "Le prénom, le nom, le téléphone et l'e-mail sont obligatoires.";

            } else {
                $this->contactsModel->addContact($_POST);
                header('Location: index.php?page=contacts');
                exit; 
            }
        }
        $categories = $this->categoriesModel->findAllCategories();
        require_once ("./app/views/addContact.php");
    }

    /* Deletes a contact */
    public function delete($id) {
        $this->contactsModel->deleteContact($id);
        header('Location: index.php?page=contacts');
        exit;
    }
    
    /* Handles the modification of a contact */
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['phone']) || empty($_POST['email'])) {
                $error = "Le prénom, le nom, le téléphone et l'e-mail sont obligatoires.";

            } else {
                $this->contactsModel->updateContact($id, $_POST);
                header('Location: index.php?page=contacts');
                exit;
            }
        }
        $contact = $this->contactsModel->findContact($id);
        $categories = $this->categoriesModel->findAllCategories();
        require_once("./app/views/editContact.php");
        exit;
    }
}
?>

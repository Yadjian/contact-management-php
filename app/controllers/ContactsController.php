<?php

class ContactsController {
    private $contactsModel;
    private $categoriesModel;

    public function __construct($contactsModel, $categoriesModel) {
        $this->contactsModel = $contactsModel;
        $this->categoriesModel = $categoriesModel;
    }

    public function list() {
        $contacts = $this->contactsModel->findAllContacts();
        require_once ("./app/views/myContacts.php");    
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contactsModel->addContact($_POST);
            header('Location: index.php?page=contacts');
            exit; 
        }
        $categories = $this->categoriesModel->findAllCategories();
        
        require_once ("./app/views/addContact.php");
    }

    public function delete($id) {
        $this->contactsModel->deleteContact($id);
        header('Location: index.php?page=contacts');
        exit;
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contactsModel->updateContact($id, $_POST);
            header('Location: index.php?page=contacts');
            exit;

        } else { 
            $contact = $this->contactsModel->findContact($id);
            $categories = $this->categoriesModel->findAllCategories();

            require_once("./app/views/editContactPage.php");
        }
    }
}
?>
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
        require_once ("./app/views/listContactsPage.php");    
    }

    public function form() {
        $categories = $this->categoriesModel->findAllCategories();
        require_once ("./app/views/addContactPage.php");    
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contactsModel->addContact($_POST);
            header('Location: index.php.?page=contacts');
            exit; 
        }
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
            $contacts = $this->contactsModel->findContact($id);
            $categories = $this->categoriesModel->findAllCategories();
            require_once("./app/views/editContactPage.php");
        }
    }
}
?>
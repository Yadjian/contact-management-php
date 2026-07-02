<?php

require_once ("./app/controllers/ContactsController.php");
require_once ("./app/models/ContactsModel.php");
require_once ("./app/models/CategoriesModel.php");

$pdo = require_once ("./config/db.php");
$contactsModel = new ContactsModel($pdo);
$categoriesModel = new CategoriesModel($pdo);
$contactsController = new ContactsController($contactsModel, $categoriesModel);

if (empty($_GET['page'])) {
    $url[0] = 'contacts';

} else {
    $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
}

switch ($url[0]) {
    case 'contacts':
        if (!isset($url[1])) {
            $contactsController->list();
        } else {
            switch ($url[1]) {
                case 'add':
                    $contactsController->add();
                    break;
                case 'delete':
                    $contactsController->delete($_GET['id']);
                    break;
                case 'update':
                    $contactsController->update($_GET['id']);
            }
        }
        break;
    default:
        echo "Page introuvable";
        break;
}
?>

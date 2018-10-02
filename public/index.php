<?php

use App\Controller\PersonController;

require '../vendor/autoload.php';
require __DIR__ . '/../app/connec.php';

$route = $_GET['route'] ?? 'list';

if ($route === 'list') {
    $personController = new PersonController();
    $personController->list();
} elseif ($route == 'show') {
    $personController = new PersonController();
    $personController->show($_GET['id']);
}


?>
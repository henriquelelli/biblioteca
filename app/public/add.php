<?php
require_once __DIR__ . '/../controllers/CardController.php';

$controller = new CardController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->add();
} else {
    $controller->showAddForm();
}
?>

<?php
require_once __DIR__ . '/../controllers/CardController.php';

$controller = new CardController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SERVER['REQUEST_URI'] === '/add') {
        $controller->add();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_SERVER['REQUEST_URI'] === '/') {
        $controller->index();
    } elseif ($_SERVER['REQUEST_URI'] === '/add') {
        $controller->add();
    } elseif (strpos($_SERVER['REQUEST_URI'], '/delete') === 0) {
        $id = $_GET['id'];
        $controller->delete($id);
    } elseif (strpos($_SERVER['REQUEST_URI'], '/favorite') === 0) {
        $id = $_GET['id'];
        $controller->favorite($id);
    } elseif ($_SERVER['REQUEST_URI'] === '/favorites') {
        $controller->favorites();
    }
}
?>

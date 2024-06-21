<?php
require_once __DIR__ . '/../controllers/CardController.php';

$controller = new CardController();
$id = $_GET['id'] ?? null;
if ($id) {
    $controller->favorite($id);
} else {
    echo "ID não fornecido para favoritar.";
}
?>

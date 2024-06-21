<?php
require_once __DIR__ . '/../config/db.php';

class Card {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM cards");
        return $stmt->fetchAll();
    }

    public function add($title, $description, $image_url) {
        $stmt = $this->pdo->prepare("INSERT INTO cards (title, description, image_url) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $description, $image_url]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM cards WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function favorite($id) {
        $stmt = $this->pdo->prepare("UPDATE cards SET is_favorite = !is_favorite WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getFavorites() {
        $stmt = $this->pdo->query("SELECT * FROM cards ORDER BY is_favorite DESC, id ASC");
        return $stmt->fetchAll();
    }    
    
}
?>

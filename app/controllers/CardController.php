<?php
require_once __DIR__ . '/../models/Card.php';

class CardController {
    private $card;

    public function __construct() {
        $this->card = new Card();
    }

    public function index() {
        $cards = $this->card->getAll();
        ob_start();
        foreach ($cards as $card) {
            $isFavoriteClass = $card['is_favorite'] ? 'heart-filled' : 'heart-outline';
            echo "<div class='card'>
                    <img src='{$card['image_url']}' alt='{$card['title']}'>
                    <button class='heart-button {$isFavoriteClass}' onclick='toggleFavorite({$card['id']})'></button>
                    <button class='trash-button' onclick='openModal({$card['id']}, \"{$card['title']}\")'><img src='/images/trash.svg' alt='Delete'></button>
                    <div class='card-content'>
                        <h3>{$card['title']}</h3>
                        <p>{$card['description']}</p>
                    </div>
                  </div>";
        }
        $content = ob_get_clean();
        include __DIR__ . '/../views/index.phtml';
    }

    public function showAddForm() {
        $content = file_get_contents(__DIR__ . '/../views/add_card.php');
        include __DIR__ . '/../views/index.phtml';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image_url = $_POST['image_url'];

            $this->card->add($title, $description, $image_url);
            header("Location: /");
        } else {
            $this->showAddForm();
        }
    }

    public function delete($id) {
        $this->card->delete($id);
        header("Location: /");
    }

    public function favorite($id) {
        $this->card->favorite($id);
        header("Location: /");
    }

    public function favorites() {
        $cards = $this->card->getFavorites();
        ob_start();
        foreach ($cards as $card) {
            $isFavoriteClass = $card['is_favorite'] ? 'heart-filled' : 'heart-outline';
            echo "<div class='card'>
                    <img src='{$card['image_url']}' alt='{$card['title']}'>
                    <button class='heart-button {$isFavoriteClass}' onclick='toggleFavorite({$card['id']})'></button>
                    <button class='trash-button' onclick='openModal({$card['id']}, \"{$card['title']}\")'><img src='/images/trash.svg' alt='Delete'></button>
                    <div class='card-content'>
                        <h3>{$card['title']}</h3>
                        <p>{$card['description']}</p>
                    </div>
                  </div>";
        }
        $content = ob_get_clean();
        include __DIR__ . '/../views/index.phtml';
    }
}
?>

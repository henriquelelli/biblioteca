<?php
require_once __DIR__ . '/../models/Card.php';

class CardController {
    private $card;

    public function __construct() {
        $this->card = new Card();
    }

    public function index() {
        $cards = $this->card->getAll();
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
            include __DIR__ . '/../views/add_card.php';
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
        include __DIR__ . '/../views/index.php';
    }
}
?>

<?php
require_once "BaseMemesTwigController.php"; 

class MainController extends BaseMemesTwigController{
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        if (isset($_GET['type'])){
            $query = $this->pdo->prepare("SELECT * FROM memes_objects WHERE type = :type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM memes_objects");
        }

        $context['memes_objects'] = $query->fetchAll();

        return $context;
    }

}
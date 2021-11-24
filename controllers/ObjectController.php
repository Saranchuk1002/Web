<?php
require_once "BaseMemesTwigController.php";
class ObjectController extends BaseMemesTwigController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT images, info, title, description, id FROM memes_objects WHERE id= :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['images'] = $data['images'];
        $context['info'] = $data['info'];
        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        $context['description'] = $data['description'];
        

        return $context;
    }
}

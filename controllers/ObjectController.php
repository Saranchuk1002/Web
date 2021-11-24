<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT title, description, id FROM memes_objects WHERE id= :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        $context['description'] = $data['description'];
        

        return $context;
    }
}

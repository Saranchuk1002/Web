<?php
class ObjectImageController extends ObjectController{
    public $template = "image.twig";
    public function getContext():array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT images, id FROM memes_objects WHERE id= :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute(); 
        $data = $query->fetch();

        $context['images'] = $data['images'];

        return $context;
    }
}
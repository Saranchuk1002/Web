<?php
class ObjectInfoController extends ObjectController{
    public $template = "info.twig";
    public function getContext():array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT info, id FROM memes_objects WHERE id= :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute(); 
        $data = $query->fetch();

        $context['info'] = $data['info'];

        return $context;
    }
}
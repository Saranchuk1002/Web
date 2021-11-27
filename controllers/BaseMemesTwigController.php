<?php

class BaseMemesTwigController extends TwigBaseController{
    public function getContext():array
    {
        $context = parent::getContext();

        // создаем запрос к БД
        $query = $this->pdo->query("SELECT DISTINCT type FROM memes_objects ORDER BY 1");
        $types = $query->fetchAll();
        $context['types'] = $types;

        return $context;

        
    }
}
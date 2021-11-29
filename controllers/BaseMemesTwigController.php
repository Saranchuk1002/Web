<?php

class BaseMemesTwigController extends TwigBaseController{
    public function getContext():array
    {
        $context = parent::getContext();

        // создаем запрос к БД
        $query = $this->pdo->query("SELECT DISTINCT title FROM type_table ORDER BY 1");
        $types = $query->fetchAll();
        $context['newtypes'] = $types;

        return $context;

        
    }
}
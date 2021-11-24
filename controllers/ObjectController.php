<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->query("SELECT description, id FROM memes_objects WHERE id=".$this->params['id']);
        // стягиваем одну строчку из базы
        $data = $query->fetch();
    //     print_r($data);
        
    //    echo "<pre>";
    //    print_r($this->params);
    //    echo "</pre>";

        // передаем описание из БД в контекст
        $context['description'] = $data['description'];

        return $context;
    }
}

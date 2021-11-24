<?php
require_once "KidController.php";

class KidImageController extends KidController{
    public $template = "base_image.twig";


    public function getContext(): array
    {
        $context = parent::getContext();
        $contex['image_url'] = false;
        $context['is_image'] = true;
        

        return $context;
    }
}
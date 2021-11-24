<?php
require_once "CatController.php";

class CatImageController extends CatController{
    public $template = "base_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        $contex['image_url'] = false;
        $context['is_image'] = true;
        

        return $context;
    }
}
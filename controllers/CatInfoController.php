<?php
require_once "CatController.php";

class CatInfoController extends CatController {
    public $template = "catInfo.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 
        $context['is_info'] = true;
        return $context;
    }
}

<?php
require_once "KidController.php";

class KidInfoController extends KidController {
    public $template = "kidInfo.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 
        $context['is_info'] = true;
        return $context;
    }
}

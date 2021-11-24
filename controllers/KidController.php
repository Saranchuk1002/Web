<?php
//require_once "TwigBaseController.php"; // импортим TwigBaseController

class KidController extends TwigBaseController {
    public $template = "__object.twig";
    public $title = "Success Kid";


    public function getContext(): array
    {
        $context = parent::getContext(); 
        $context['image'] = "/images/kid.png";
        $context['url'] = "/kid";
        


        return $context;
    }
}
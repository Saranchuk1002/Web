<?php
//require_once "TwigBaseController.php"; // импортим TwigBaseController

class CatController extends TwigBaseController {
    public $template = "__object.twig";
    public $title = "Угрюмый кот";


    public function getContext(): array
    {
        $context = parent::getContext(); 
        $context['image'] = "/images/Grumpy.jpg";
        $context['url'] = "/cat";
        


        return $context;
    }
}
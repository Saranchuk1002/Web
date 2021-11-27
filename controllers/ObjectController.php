<?php
require_once "BaseMemesTwigController.php";
class ObjectController extends BaseMemesTwigController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT images, info, title, description, id FROM memes_objects WHERE id= :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        
        if (isset($_GET['show']))
        {
            if(($_GET['show'])=='image')
            {
                $context['content']="images";
                $context['contentt']=$data["images"];
            }
            if(($_GET['show'])=='info'){
                $context['content']="info";
                $context['contentt']=$data["info"];
            }
        }else{
                $context['content']="description";
                $context['contentt']=$data["description"];
        }

        return $context;
    }
}

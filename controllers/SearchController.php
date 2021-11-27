<?php
require_once "BaseMemesTwigController.php";

class SearchController extends BaseMemesTwigController {
    public $template = "search.twig";
    public $title = "Поиск";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $type =isset($_GET['type']) ? $_GET['type'] : '';
        $title =isset($_GET['title']) ? $_GET['title'] : '';
        $description =isset($_GET['description']) ? $_GET['description'] : '';
        $id =isset($_GET['id']) ? $_GET['id'] : '';

        if (isset($_GET['type'])){
        if(($_GET['type'])=="Все"){
            $sql = <<< EOL
SELECT id, title, description
FROM memes_objects
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
        AND (:description = '' OR description like CONCAT('%', :description, '%'))

EOL;
        }else{
        $sql = <<< EOL
SELECT id, title, description
FROM memes_objects
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
        AND (type = :type)
        AND (:description = '' OR description like CONCAT('%', :description, '%'))
EOL;
        }
        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("description", $description);
        $query->bindValue("id", $id);
        $query->execute();


        $context['objects'] = $query->fetchAll();
    }
    
        return $context;
    }
}

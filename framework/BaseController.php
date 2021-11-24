<?php

abstract class BaseController {
   
    public PDO $pdo;
    public array $params; // добавил поле
    
    public function setParams(array $params) {
        $this->params = $params;
    }

    public function setPDO(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getContext(): array {
        return []; // по умолчанию пустой контекст
    }
    
    
    abstract public function get();
}

<?php

class restApiController extends BaseController{


    public function get(array $context) {
        header("Access-Control-Allow-Origin: *");// с любого адреса получаем
        header("Content-Type: application/json; charset=UTF-8");// определяем что json
        http_response_code(200);
        echo json_encode([1,2,3,4,5]);
    } // ну и сюда добавил в качестве параметра 
    public function post(array $context) {} // и сюда
}

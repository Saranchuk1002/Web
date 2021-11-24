<?php 
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/CatController.php";
require_once "../controllers/CatImageController.php";
require_once "../controllers/CatInfoController.php";
require_once "../controllers/KidController.php";
require_once "../controllers/KidImageController.php";
require_once "../controllers/KidInfoController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";


$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, ["debug" => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());



$title ="";
$template = "";


$contex = [];


// создаем экземпляр класса и передаем в него параметры подключения
// создание класса автоматом открывает соединение
$pdo = new PDO("mysql:host=localhost;dbname=outer_memes;charset=utf8", "root", "");




$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/cat", CatController::class);
$router->add("/memes_objects/(?P<id>\d+)", ObjectController::class); 
$router->get_or_default(Controller404::class);
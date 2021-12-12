<?php 
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php"; 
require_once "../controllers/ObjectController.php"; 
require_once "../controllers/Controller404.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/MemesObjectCreateController.php";
require_once "../controllers/TypesCreateController.php";
require_once "../controllers/MemesObjectDeleteController.php";
require_once "../controllers/UpdateController.php";
require_once "../api/restApiController.php";
require_once "../middlewares/LoginRequiredMiddleware.php";



$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, ["debug" => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

//Подключение к бд
$pdo = new PDO("mysql:host=localhost;dbname=outer_memes;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/memes_objects/(?P<id>\d+)/?", ObjectController::class); 
$router->add("/search", SearchController::class);
$router->add("/create", MemesObjectCreateController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/createtype", TypesCreateController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/memes_objects/delete", MemesObjectDeleteController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/update/(?P<id>\d+)", UpdateController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->get_or_default(Controller404::class);


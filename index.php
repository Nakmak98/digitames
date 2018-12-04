<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'Logic/Db/Db.php';
require_once 'Logic/Controller.php';
require_once 'Logic/HomePageController.php';
require_once 'Logic/AuthController.php';
require_once 'Logic/GamePageController.php';
require_once 'Logic/SignUpController.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('templates', [
        'debag' => true,
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};

$container['db'] = function () {
    return Db::getConnection();
};


$app->get('/', Logic\HomePageController::class . ':getHomePage');
$app->get('/login/', Logic\AuthController::class . ':getLoginForm');
$app->get('/logout/', Logic\AuthController::class . ':logout');
$app->post('/login/', Logic\AuthController::class . ':signIn');
$app->get('/signup/', Logic\SignUpController::class . ':getSignUpForm');
$app->post('/signup/', Logic\SignUpController::class . ':signUp');
$app->get('/game_page/{project_name}', Logic\GamePageController::class . ':getGamePage');
$app->run();
?>
<?php

use app\controllers\ApiExampleController;
use app\controllers\ParcoursController;
use app\controllers\TrajetController;

use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->group('', function (Router $router) use ($app) {

	$router->get('/', function () use ($app) {
		$parcoursController = new ParcoursController($app);
		$parcoursController->getParcours();
	});

	$router->get('/parcours/@id', function ($id) use ($app) {
		$controller = new TrajetController($app);
		$controller->detail($id);
	});
}, [SecurityHeadersMiddleware::class]);

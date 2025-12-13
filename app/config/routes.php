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

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

	$router->get('/', function() use ($app) {
		$parcoursController = new ParcoursController($app);
		$parcoursController->getParcours();
	});

	Flight::route('/parcours/@id', function($id){
    $controller = new TrajetController(Flight::app());
    $controller->detail($id);
});


	$router->get('/detail/@id:[0-9]', function($id) use ($app) {
		$parcoursController = new ParcoursController($app);
		$parcoursController->getParcoursById($id);
	});


	$router->get('/route-iray', function() use ($app) {
		echo '<h1>route iray ve!</h1>';
	});

	$router->get('/hello-world/@name', function($name) {
		echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
	});

	$router->group('/api', function() use ($router) {
		$router->get('/users', [ ApiExampleController::class, 'getUsers' ]);
		$router->get('/users/@id:[0-9]', [ ApiExampleController::class, 'getUser' ]);
		$router->post('/users/@id:[0-9]', [ ApiExampleController::class, 'updateUser' ]);
	});
	
}, [ SecurityHeadersMiddleware::class ]);
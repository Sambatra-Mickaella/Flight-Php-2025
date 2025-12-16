<?php

use app\controllers\ApiExampleController;
use app\controllers\ParcoursController;
use app\controllers\TrajetController;
use app\controllers\VehiculeController;
use app\controllers\PanneController;
use app\controllers\SalaireController;

use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->group('', function(Router $router) use ($app) {

	$router->get('/', function() use ($app) {
		$parcoursController = new ParcoursController($app);
		$parcoursController->getParcours();
	});

	$router->get('/trajets/rentables', function() use ($app) {
		$controller = new TrajetController($app);
		$controller->trajetsLesPlusRentablesParJour();
	});

	$router->get('/vehicules/par-jour', function() use ($app) {
		$controller = new VehiculeController($app);
		$controller->vehiculesParJour();
	});

	$router->get('/pannes', function() use ($app) {
		$controller = new PanneController($app);
		$controller->pannes();
	});

	$router->get('/salaires/journalier', function() use ($app) {
		$controller = new SalaireController($app);
		$controller->salaireJournalier();
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
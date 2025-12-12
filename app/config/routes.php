<?php

use app\controllers\ApiExampleController;
use app\controllers\ProduitController;
use app\controllers\DetailProduit;


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
		$app->render('index', ["hello"]);
	});

    /*$router->get('/detail/@id:[0-9]', function($id) use ($app) {
        $produitController = new DetailProduit($app);
		$produit=$produitController->getDetailProduit($id);
		$app->render('index', [ 'produit' => $produit]);
	});*/

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
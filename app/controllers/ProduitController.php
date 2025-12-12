<?php

namespace app\controllers;

use flight\Engine;
use app\models\ProduitModel;

class ProduitController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function getProduits() {
        $produitModel = new ProduitModel();
        $produit=$produitModel->getProduits();
        return $produit;
	}

    
    

}
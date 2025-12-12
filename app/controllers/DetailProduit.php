<?php

namespace app\controllers;

use flight\Engine;
use app\models\ProduitModel;
use app\models\DetailProduitModel;

class DetailProduit {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}


    public function getDetailProduit($id){
        $proModel=new ProduitModel();
        $produitdet = $proModel->getProduitById($id);

        $proDetail = new DetailProduitModel();
        $produit=$proDetail->getDetailProduitById($id);
        
        $detail=[
              'image' => $produitdet['image'],
              'name' => $produitdet['name'],
              'detail' => $produit['detail']

        ];
        return $detail;
    }
    

}
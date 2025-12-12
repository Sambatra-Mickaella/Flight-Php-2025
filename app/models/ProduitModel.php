<?php

namespace app\models;

class ProduitModel {

    public function getProduits() {
        return [
            [ 'id' => 1, 'name' => 'Cahier', 'image' => 'assets/images/1.jpg' ],
            [ 'id' => 2, 'name' => 'Stylo',  'image' => 'assets/images/2.jpg' ],
            [ 'id' => 3, 'name' => 'Gomme',  'image' => 'assets/images/3.jpg' ],
        ];
    }

    public function getProduitById($id) {
        foreach ($this->getProduits() as $produit) {
            if ($produit['id'] == $id) {
                return $produit;
            }
        }
        return null;
    }
}

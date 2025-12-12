<?php
namespace app\models;
class DetailProduitModel {
    public function getDetailProduits() {
        $detailProduit= [
            [ 'id' => 1,'idProduit' => 1,'detail' =>'voici les details'],
            [ 'id' => 2,'idProduit' => 2,'detail' =>'voici les details'],
            [ 'id' => 3,'idProduit' => 3,'detail' =>'voici les details'],
        ];
        return $detailProduit;
    }
    
    public function getDetailProduitById($id){
        $detailProduit = $this->getDetailProduits();
        foreach($detailProduit as $detail){
            if($detail['idProduit'] == $id){
                return $detail;
            }
        }
        return null;
    }
} 
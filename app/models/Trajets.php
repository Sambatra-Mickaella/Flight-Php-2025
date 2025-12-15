<?php

namespace app\models;

use Flight;

class Trajets {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getParcours($id){
        $stmt = $this->db->prepare("SELECT * FROM kptv_parcours WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getTrajetsByParcours($id){
        $stmt = $this->db->prepare("SELECT * FROM v_kptv_trajets_complets WHERE parcours_id = ? ORDER BY date_debut DESC");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

  
}

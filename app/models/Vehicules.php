<?php
namespace app\models;

class Vehicules {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getVehicules() {
        $stmt = $this->db->query("SELECT * FROM Vehicule ORDER BY immatriculation");
        return $stmt->fetchAll();
    }
    
    public function getVehiculeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Vehicule WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
<?php
require_once '../config/db.php';
class PanierModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPanierData($userId) {
        $reqet = "SELECT * FROM panier JOIN plantes ON panier.idPlante = plantes.idPlante WHERE idUtl= $userId";
        return $this->conn->query($reqet);
    }

    public function addToCart($userId, $plantId) {
        $insertQuery = "INSERT INTO panier (idUtl, idPlante, quantite) VALUES ('$userId','$plantId',1)";
        return $this->conn->query($insertQuery);
    }
}

?>
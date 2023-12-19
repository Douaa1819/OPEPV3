
<?php

require_once "../config/conn.php"; 

class PlanteModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function ajouterPlante($nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        $query = "INSERT INTO plantes (nomPlante, imagePlante, descriptionPlante, stock, prix, idCategorie) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie]);

        return $stmt->rowCount() > 0; 
    }
}
?>
?>


<?php

require_once "../config/conn.php"; 

class PlanteModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getAllPlante() {
        $query = "SELECT * FROM plantes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterPlante($nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        $query = "INSERT INTO plantes (nomPlante, imagePlante, descriptionPlante, stock, prix, idCategorie) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie]);

        return $stmt->rowCount() > 0; 
    }

    public function modifierPlante($idPlante, $nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        $query = "UPDATE plantes SET nomPlante=?, imagePlante=?, descriptionPlante=?, stock=?, prix=?, idCategorie=? WHERE idPlante=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie, $idPlante]);
    }

    public function supprimerPlante($idPlante) {
        $query = "DELETE FROM plantes WHERE idPlante=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$idPlante]);
    }
}
?>


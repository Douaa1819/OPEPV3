<?php

require_once "../config/conn.php"; 



class CategorieModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getAllCategories() {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterCategorie($nomCategorie) {
        $query = "INSERT INTO categories (nomCategorie) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nomCategorie]);
    }

    public function modifierCategorie($idCategorie, $nouveauNomCategorie) {
        $query = "UPDATE categories SET nomCategorie=? WHERE idCategorie=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nouveauNomCategorie, $idCategorie]);
    }

    public function supprimerCategorie($idCategorie) {
        $query = "DELETE FROM categories WHERE idCategorie=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$idCategorie]);
    }
   
}
?>
<?php

require_once "../config/conn.php"; 



class CategorieModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function ajouterCategorie($nomCategorie) {
        $query = "INSERT INTO categories (nomCategorie) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomCategorie]);

        return $stmt->rowCount() > 0;
    }

    public function recupererCategories() {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
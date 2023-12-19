<?php

class PlanteController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function ajouterPlante($nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        $query = "INSERT INTO plantes (nomPlante, imagePlante, descriptionPlante, stock, prix, idCategorie) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie]);
    }

    public function modifierPlante($idPlante, $nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        $query = "UPDATE plantes 
                  SET nomPlante=?, imagePlante=?, descriptionPlante=?, stock=?, prix=?, idCategorie=? 
                  WHERE idPlante=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie, $idPlante]);
    }

    public function supprimerPlante($idPlante) {
        $query = "DELETE FROM plantes WHERE idPlante=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$idPlante]);
    }
}

class CategorieController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
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

class AdminController {
    private $planteModel;
    private $categorieModel;

    public function __construct($planteModel, $categorieModel) {
        $this->planteModel = $planteModel;
        $this->categorieModel = $categorieModel;
    }

    public function traiterFormulaireModificationPlante($idPlante, $nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        if (isset($_POST['submitModificationPlante'])) {
            $result = $this->planteModel->modifierPlante($idPlante, $nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie);

            if ($result) {
                echo "<script>alert('Plante modifiée avec succès.')</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Erreur lors de la modification de la plante. Veuillez réessayer.')</script>";
            }
        }
    }

    public function traiterFormulaireSuppressionPlante($idPlante) {
        if (isset($_POST['submitSuppressionPlante'])) {
            $result = $this->planteModel->supprimerPlante($idPlante);

            if ($result) {
                echo "<script>alert('Plante supprimée avec succès.')</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Erreur lors de la suppression de la plante. Veuillez réessayer.')</script>";
            }
        }
    }

    public function traiterFormulaireAjoutCategorie($nomCategorie) {
        if (isset($_POST['submitCategorie'])) {
            $result = $this->categorieModel->ajouterCategorie($nomCategorie);

            if ($result) {
                echo "<script>alert('Catégorie ajoutée avec succès.')</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Erreur lors de l\'ajout de la catégorie. Veuillez réessayer.')</script>";
            }
        }
    }

    public function traiterFormulaireModificationCategorie($idCategorie, $nouveauNomCategorie) {
        if (isset($_POST['submitModificationCategorie'])) {
            $result = $this->categorieModel->modifierCategorie($idCategorie, $nouveauNomCategorie);

            if ($result) {
                echo "<script>alert('Catégorie modifiée avec succès.')</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Erreur lors de la modification de la catégorie. Veuillez réessayer.')</script>";
            }
        }
    }

    public function traiterFormulaireSuppressionCategorie($idCategorie) {
        if (isset($_POST['submitSuppressionCategorie'])) {
            $result = $this->categorieModel->supprimerCategorie($idCategorie);

            if ($result) {
                echo "<script>alert('Catégorie supprimée avec succès.')</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Erreur lors de la suppression de la catégorie. Veuillez réessayer.')</script>";
            }
        }
    }
}

// Initialisation des modèles
$planteModel = new PlanteModel($conn);
$categorieModel = new CategorieModel($conn);

// Initialisation des contrôleurs
$planteController = new PlanteController($planteModel);
$categorieController = new CategorieController($categorieModel);

?>

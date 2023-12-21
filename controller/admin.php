<?php

// Inclure le fichier de configuration pour établir la connexion à la base de données
require_once '../config/conn.php';
require_once '../Model/plant.php';
require_once '../Model/categories.php';

class AdminController {
    private $planteModel;
    private $categorieModel;

    public function __construct($planteModel, $categorieModel) {
        $this->planteModel = $planteModel;
        $this->categorieModel = $categorieModel;
    }

    public function traiterFormulaireAjoutPlante($nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie) {
        global $conn; // Ajouter cette ligne pour rendre la variable $conn globale

        // Vérifier si la connexion est définie
        if ($this->planteModel->setConn($conn)) {
            $result = $this->planteModel->ajouterPlante($nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie);

            if ($result) {
                echo "<script>alert('Plante ajoutée avec succès.')</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Erreur lors de l\'ajout de la plante. Veuillez réessayer.')</script>";
            }
        } else {
            echo "<script>alert('Erreur de connexion à la base de données.')</script>";
        }
    }

    public function traiterFormulaireAjoutCategorie($nomCategorie) {
        $result = $this->categorieModel->ajouterCategorie($nomCategorie);

        if ($result) {
            echo "<script>alert('Catégorie ajoutée avec succès.')</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 1000);</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'ajout de la catégorie. Veuillez réessayer.')</script>";
        }
    }
}

// Initialisation de la connexion à la base de données
$conn = new PDO("mysql:host=localhost;dbname=opep2", "root", "");

// Gestion des erreurs
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Initialisation des modèles
$planteModel = new PlanteModel($conn);
$categorieModel = new CategorieModel($conn);

// Initialisation du contrôleur principal
$adminController = new AdminController($planteModel, $categorieModel);

// Traiter les formulaires


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitPlante'])) {
        $adminController->traiterFormulaireAjoutPlante(
            $_POST['nomPlante'],
            $_POST['imagePlante'],
            $_POST['descriptionPlante'],
            $_POST['stockPlante'],
            $_POST['prix'],
            $_POST['idCategorie']
        );
    } elseif (isset($_POST['submitCategorie'])) {
        $adminController->traiterFormulaireAjoutCategorie($_POST['nomCategorie']);
    }
    // Ajoutez d'autres conditions pour traiter d'autres formulaires si nécessaire
}
// Appelez la méthode


// Initialisation des modèles
$planteModel = new PlanteModel($conn);
$categorieModel = new CategorieModel($conn);

// Initialisation du contrôleur principal
$adminController = new AdminController($planteModel, $categorieModel);

// Traiter les formulaires 



// Appelez la méthode
?>

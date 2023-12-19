<?php
require_once '../config/conn.php';
require_once "../Model/plant.php";
require_once "../Model/categories.php";
require_once "../controller/admin.php";

$conn = new PDO("mysql:host=localhost;dbname=opep2", "root", "");
$planteModel = new PlanteModel($conn);
$categorieModel = new CategorieModel($conn);
$adminController = new AdminController($planteModel, $categorieModel);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitPlante'])) {
        $AdminController->traiterFormulaireAjoutPlante(
            $_POST['nomPlante'],
            $_POST['imagePlante'],
            $_POST['descriptionPlante'],
            $_POST['stockPlante'],
            $_POST['prix'],
            $_POST['idCategorie']
        );
    }

    if (isset($_POST['submitCategorie'])) {
        $adminController->traiterFormulaireAjoutCategorie($_POST['nomCategorie']);
    }

}

$planteController = new PlanteController($planteModel);
$categorieController = new CategorieController($categorieModel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   
    <title>OPEP</title>
</head>
<body>

    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#" onclick="afficherFormulaireAjoutCategorie()">
                        <div class="sidebar--item">Ajouter Catégorie</div>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="afficherFormulaireModificationCategorie()">
                        <div class="sidebar--item">Modifier Catégorie</div>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="afficherFormulaireAjoutPlante()">
                        <div class="sidebar--item">Ajouter Plante</div>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="afficherFormulaireSuppressionPlante()">
                        <div class="sidebar--item">Supprimer Plante</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--container">
            <div class="form-container" id="formContainer">
                <!-- Le contenu des formulaires sera ajouté ici par JavaScript -->
            </div>
        </div>
    </section>

    <script>
        function afficherFormulaireAjoutCategorie() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaire()">X</div>
                <h2>Ajouter Catégorie</h2>
                <form method="POST" action="" onsubmit="return submitForm('formAjoutCategorie')">
                    <!-- Ajoutez ici les champs pour le formulaire d'ajout de catégorie -->
                    <button type="submit" name="submitCategorie">Ajouter</button>
                </form>
            `;
        }

        function afficherFormulaireModificationCategorie() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaire()">X</div>
                <h2>Modifier Catégorie</h2>
                <form method="POST" action="" onsubmit="return submitForm('formModificationCategorie')">
                    <!-- Ajoutez ici les champs pour le formulaire de modification de catégorie -->
                    <button type="submit" name="submitModificationCategorie">Modifier</button>
                </form>
            `;
        }

        function afficherFormulaireAjoutPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaire()">X</div>
                <h2>Ajouter Plante</h2>
                <form method="POST" action="" onsubmit="return submitForm('formAjoutPlante')">
                    <!-- Ajoutez ici les champs pour le formulaire d'ajout de plante -->
                    <button type="submit" name="submitPlante">Ajouter</button>
                </form>
            `;
        }

        function afficherFormulaireSuppressionPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaire()">X</div>
                <h2>Supprimer Plante</h2>
                <form method="POST" action="" onsubmit="return submitForm('formSuppressionPlante')">
                    <!-- Ajoutez ici les champs pour le formulaire de suppression de plante -->
                    <button type="submit" name="submitSuppressionPlante">Supprimer</button>
                </form>
            `;
        }

        function fermerFormulaire() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";
        }

  
    </script>
</body>
</html>

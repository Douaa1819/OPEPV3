<?php
require_once '../config/conn.php';
require_once "../controller/admin.php";
require_once "../Model/plant.php";
require_once "../Model/categories.php";

$categories = $categorieModel->getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>OPEP</title>
    <style>
    </style>
</head>
<body class="body">
<section class="header">
        <h1><span style="color: #567255;">O</span>P<span style="color: #567255;">E</span>P</h1>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#"  onclick="afficherFormulaireAjoutCategorie()">
                        <div class="sidebar--item">Ajouter Catégorie</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sidebar--item" onclick="afficherFormulaireModificationCategorie()">Modifier Catégorie</div>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="afficherFormulaireAjoutPlante()">
                        <div class="sidebar--item">Ajouter Plante</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sidebar--item" onclick="afficherFormulaireSuppressionPlante()">Supprimer Plante</div>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="main--container">
            <div class="form-container" id="formContainer">
           
            </div>
        </div>
    </section>
    </section>

    <script>
        function afficherFormulaireAjoutPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaireAjoutPlante()">X</div>
                <h2>Ajouter Plante</h2>
                <form method="POST">
                    <label for="idCategorie">Catégorie :</label>
                    <select id="idCategorie" name="idCategorie" required>
                        <?php
                        // Afficher les catégories récupérées depuis la base de données
                        foreach ($categories as $categorie) {
                            echo "<option value='{$categorie['idCategorie']}'>{$categorie['nomCategorie']}</option>";
                        }
                        ?>
                    </select><br>
                    <label for="nomPlante">Nom de la Plante:</label>
                    <input type="text" id="nomPlante" name="nomPlante" required><br>
                    <label for="imagePlante">Image de la Plante (URL):</label>
                    <input type="file" id="imagePlante" name="imagePlante" required><br>
                    <label for="descriptionPlante">Description:</label>
                    <textarea id="descriptionPlante" name="descriptionPlante" required></textarea><br>
                    <label for="stockPlante">Stock:</label>
                    <input type="number" id="stockPlante" name="stockPlante" required><br>
                    <label for="prixFr">Prix (en DH):</label>
                    <input type="number" id="prixFr" name="prix" required><br>
                    <button type="submit" name="submitPlante">Ajouter</button>
                </form>
            `;
        }

        function afficherFormulaireAjoutCategorie() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaireAjoutCategorie()">X</div>
                <h2>Ajouter Catégorie</h2>
                <form method="POST">
                    <label for="nomCategorie">Nom de la Catégorie:</label>
                    <input type="text" id="nomCategorie" name="nomCategorie" required><br>
                    <button type="submit" name="submitCategorie">Ajouter</button>
                </form>
            `;
        }

        function afficherFormulaireSuppressionPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaireSuppressionPlante()">X</div>
                <h2>Supprimer Plante</h2>
                <form method="POST">
                    <label for="idPlanteSuppression">Sélectionnez la plante à supprimer :</label>
                    <select id="idPlanteSuppression" name="idPlanteSuppression" class="form-control" required>
                        <?php
                        $plantesQuery = $conn->query("SELECT * FROM plantes");

                    
                                echo "<option value='{$plante['idPlante']}'>{$plante['nomPlante']}</option>";

                        
                        ?>
                    </select><br>
                    <button id="bttn" type="submit" name="submitSuppressionPlante">Supprimer</button>
                </form>
            `;
        }

        function afficherFormulaireModificationCategorie() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <div class="close-button" onclick="fermerFormulaireModificationCategorie()">X</div>
                <h2>Modifier Catégorie</h2>
                <form method="POST">
                    <label for="idCategorieModification">Sélectionnez la catégorie à modifier :</label>
                    <select id="idCategorieModification" name="idCategorieModification" class="form-control" required>
                        <?php
                        $categoriesQuery = $conn->query("SELECT * FROM categories");

                            echo "<option value='{$categorie['idCategorie']}'>{$categorie['nomCategorie']}</option>";
                        
                        ?>
                    </select><br>
                    <label for="nouveauNomCategorie">Nouveau nom de la catégorie :</label>
                    <input type="text" id="nouveauNomCategorie" name="nouveauNomCategorie" class="form-control" required><br>
                    <button type="submit" name="submitModificationCategorie">Modifier</button>
                </form>
            `;
        }

        function fermerFormulaireModificationCategorie() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";
        }

        function fermerFormulaireSuppressionPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";
        }

        function fermerFormulaireAjoutPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";
        }

        function fermerFormulaireAjoutCategorie() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";
        }

        var input = document.querySelectorAll('#champSelectionne');
        input.forEach(btn => {
            btn.addEventListener("click", function () {
                let x = this.value;
                console.log(x);
            });
        });

        function afficherChampSelectionne(selectElement) {
            const selectedValue = selectElement.value;
            console.log("Selected Value:", selectedValue);
        }
    </script>
</body>
</html>

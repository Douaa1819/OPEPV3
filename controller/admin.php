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
        $stmt->execute([$nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prix, $idCategorie]);

        
    }}
    ?>
<!-- categorie -->
<?php

class CategorieController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function ajouterCategorie($nomCategorie) {
        // ... votre code d'ajout de catégorie ici ...
    }

   
}
?>

<?php

class ThemeController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function ajouterTheme($nomTheme, $descriptionTheme, $imageTheme, $tags) {
     //hati fct dyl ajouter theme 
    }

    public function supprimerTheme($idTheme) {
     //hati fct dyl supp  
    }

    public function modifierTheme($idThemeModification, $nouveauNomTheme, $nouvelleDescriptionTheme, $nouvelleImageTheme, $tags) {
        
    }


}
?>
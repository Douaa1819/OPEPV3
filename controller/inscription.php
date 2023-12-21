<!-- Post -->


<?php 
require_once '../Model/utilisateurs.php';

class InscriptionController {
    private $utilisateurModel;
    public function __construct($utilisateurModel) {
        $this->utilisateurModel = $utilisateurModel;
    }

    public function traiterFormulaireInscription() {
        if (isset($_POST['submitInsc'])) {
            $nom = $_POST["nomInsc"];
            $prenom = $_POST["prenomInsc"];
            $email = $_POST["emailInsc"];
            $mdp = $_POST["mdpInsc"];

            $this->inscriptionUtilisateur($nom, $prenom, $email, $mdp);
        }
    }


    
    public function inscriptionUtilisateur($nom, $prenom, $email, $mdp) {
        // Appel méthode
        $lastUserId = $this->utilisateurModel->inscription($nom, $prenom, $email, $mdp);
    
        if ($lastUserId) {
            $_SESSION['idUser'] = $lastUserId;
            // Inscription réussie, wa sir la page "role" m3al'ID de l'utilisateur
            header("location:role.php?id=$lastUserId");
            exit; 
        } else {
            echo "<script>alert('Erreur lors de l\'inscription. Veuillez remplir tous les champs.')</script>";
        }
    }
    
    }


?>













//

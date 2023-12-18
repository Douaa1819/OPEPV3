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

    private function inscriptionUtilisateur($nom, $prenom, $email, $mdp) {
        $lastUserId = $this->utilisateurModel->inscription($nom, $prenom, $email, $mdp);
        if ($lastUserId) {
            header("Location: role.php?id=$lastUserId");
        } else {
            echo "<script>alert('Remplir tous les champs')</script>";
        }
    }
}
?>
















<!-- php
require_once("../Model/utilisateurs.php");
require_once("../config/conn.php");
if (isset($_POST['submitInsc'])) {

$nom = $_POST["nomInsc"];
$prenom = $_POST["prenomInsc"];
$email = $_POST["emailInsc"];
$mdp = $_POST["mdpInsc"];}



$Signup=new Inscription($nom,$prenom,$email,$mdp)
$Signup->signupUser();

//goo bacck
header("location: ../View/index.php?error=none")
  -->


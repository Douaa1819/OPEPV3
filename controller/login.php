<!-- 
//TraitementController.php  -->
<?php
require_once '../Model/roles.php';
require_once '../Model/utilisateurs.php';
class TraitementController {
    private $traitementModel;

    public function __construct($traitementModel) {
        $this->traitementModel = $traitementModel;
    }

    public function traiterFormulaireConnexion() {
        if (isset($_POST['submitConn'])) {
            $emailConn = $_POST["emailConn"];
            $mdpConn = $_POST["mdpConn"];

            $this->connexionUtilisateur($emailConn, $mdpConn);
        }
    }

    private function connexionUtilisateur($emailConn, $mdpConn) {
         $this->traitementModel->verifierConnexion($emailConn, $mdpConn);

    }
}
?>
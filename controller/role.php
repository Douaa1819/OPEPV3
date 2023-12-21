<?php
require_once '../Model/roles.php';


class RoleController {
    private $roleModel;

    public function __construct($roleModel) {
        $this->roleModel = $roleModel;
    }

    public function traiterFormulaireRole() {
        

     
            
            if (isset($_POST['submitRole']) && isset($_SESSION['idUser'])) {
                
                $role = $_POST["role"];
                $idUtilisateur = $_SESSION['idUser'];

                //mmchach
                
                     $this->roleModel->addRole($role, $idUtilisateur);

                    // Vérifier si l'ajout du rôle a réussi

                }else {
            echo "Utilisateur non connecté.";
        }
    
}
}

?>

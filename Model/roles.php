<?php

require_once '../config/db.php';
class RoleModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
    public function addRole($role, $idUtilisateur) {
        $query = "INSERT INTO roles (nomRole, idUtl) VALUES (:role, :idUtilisateur)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':idUtilisateur', $idUtilisateur);
        
        if($stmt->execute()){
            header("Location: login.php");
            session_destroy();
        }else{
            echo "erreur";
        }
    }
    
}


?>



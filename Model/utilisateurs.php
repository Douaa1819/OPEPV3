<?php

require_once '../config/db.php';

class UtilisateurModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function inscription($nom, $prenom, $email, $mdp) {
        $query = "INSERT INTO utilisateurs (nomUtl, prenomUtl, emailUtl, mdpUtl) VALUES (:nom, :prenom, :email, :mdp)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);

       
        if ($stmt->execute()) {
            return $this->connection->lastInsertId();
        } else {
            return 0;
        }
    }
}

class TraitementModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function verifierConnexion($emailConn, $mdpConn) {
       // session_start();
        $query = "SELECT r.nomRole, u.idUtl
                  FROM utilisateurs u
                  JOIN roles r ON u.idUtl = r.idUtl
                  WHERE u.emailUtl = :email AND u.mdpUtl = :mdp";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $emailConn);
        $stmt->bindParam(':mdp', $mdpConn);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['nomRole'] == 'admin') {
            $_SESSION['idUser'] = $row['idUtl'];
            header('location: dashbord.php');
            exit;
        } else {
            $_SESSION['idUser'] = $row['idUtl'];
            header('location: clien.php');
            exit;
        }
        
    }
}

?>

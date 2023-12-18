<!-- methode/classe/insert -->


<!-- inscription -->
<?php
require_once '../config/db.php';
class UtilisateurModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function inscription($nom, $prenom, $email, $mdp) {
        if (!empty($email) && !empty($mdp) && !empty($nom) && !empty($prenom)) {
            $query = "INSERT INTO utilisateurs (emailUtl, mdpUtl, nomUtl, prenomUtl) VALUES ('$email','$mdp','$nom','$prenom')";
            $result = $this->connection->query($query);
            if ($result) {
                return $this->connection->insert_id;
            }
        }
        return false;
    }
}
?>















































<!-- php 
require_once("../config/conn.php");
class Inscription  {

private $nom;
private $prenom ;
private $email;
private $mdp;

}
//obtenir data qui envoyer par utilisateur
//not the salme but should be equal
public function__construct($nom,$prenom,$email,$mdp){
$this->nom=$nom;
$this->prenom=$prenom;
$this->email=$email;
$this->mdp=$mdp;
}


//wahd function
private function emptyInputs(){
$result;
if(empty($this->nom) || empty($this->prenom) || empty($this->email) || empty($this->nmdp)){
    $result=false;
}
else{
    $result=true;
}
return $result;
$this -> setUser($this->nom,$this->prenom,$this->email,$this->nmdp)
}

//if uu have a time ajouter rejex !!!!!!!!!!!!!!!!!

public function signupUser(){
if($this->emptyInputs() == false){
   //echo "Empty inputs!!";
   header("location: ../View/index.php? error=emptyinput");
   exit();
}
//repeter la meme if statement if uu ajouter rtejex
}


// insription :) 


class Signup extends Database {
protected function setUser($idUlt,$emailUtl,$mdpUtl){

    $stm =$this -> conn()->prepare('INSERT INTO  utilisateurs (prenomUtl,nomUtl,emailUtl) VALUE (?,?,?)')

}

}
-->

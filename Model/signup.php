<!-- methode/classe/insert -->


<?PHP
require_once("../config/db.php");
class Utilisateur extends Database
{

    private $conn;
    public function __construct()
    {
        $this->conn = $this->conn();
    }
    public function insert_user($nomInsc, $prenomInsc, $emailInsc, $mdpInsc)
    {
        $sql = "INSERT INTO utilisateurs ( emailUtl,mdpUtl,nomUtl,prenomUtl) VALUES ('$emailInsc','$mdpInsc','$nomInsc','$prenomInsc')";
        $this->conn->exec($sql);
    }

    public function getConn(){
        return $this->conn;
    }
}

<?PHP
require_once("../config/db.php");
class Utilisateur extends Database
{

    private $conn;
    public function __construct()
    {
        $this->conn = $this->conn();
    }
    public function insert_user( $emailInsc, $mdpInsc)
    {
        if (!empty($emailConn) && !empty($mdpConn)) {
            $query = "SELECT r.nomRole , u.idUtl
            FROM utilisateurs u
            JOIN roles r ON u.idUtl = r.idUtl
            WHERE u.emailUtl = '$emailConn' AND u.mdpUtl = '$mdpConn'";
            $result = $conn->query($query);
    
        
            
           
            if ($result->num_rows > 0) {
                $rests=$result->fetch_assoc();
                foreach($rests as $rest){
                    $tabl[]=$rest;
                }
                
                $_SESSION['idUtl']=$tabl[1];
                $nomRole = $tabl[0];
                
               
    
                if ($nomRole == "client") {
                    header("Location: client.php");
                } else if ($nomRole == "admin") {
                    header("Location: admin.php");
                } else {
                    echo "<script>alert('Rôle inconnu')</script>";
                }
            } else {
                echo "<script>alert('Email ou mot de passe incorrect')</script>";
            }
        } else {
            echo "<script>alert('Remplir tous les champs')</script>";
        }
    }}

        $this->conn->exec($sql);
  


    public function getConn(){
        return $this->conn;
    }
?>



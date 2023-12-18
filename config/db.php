
<?php

define('host', 'localhost');

define('database', 'opep2');

define('user', 'root');

define('password', '');



// Inclure le fichier contenant la classe Database
require_once 'conn.php'; 



 try {
    // Obtenez une instance de la classe Database
    $db = Database::getInstance();
    // Obtenez la connexion à la base de données
    $connection = $db->getConnection();

    // Si vous arrivez jusqu'ici sans lever d'exception, la connexion est établie
 } catch (PDOException $e) {
    echo  $e->getMessage();
} 


?>




























<!-- ?php /* 
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "opep2";


    public function conn()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";

        try {
            $db = new PDO($dsn, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connection successful!";
            return $db;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
    
    
}
$test = new Database();
$test->conn();
-- >
*/
<?php
require_once '../config/db.php';
class PlanteModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPlantes($start, $limit, $categoryFilter = "", $search = "") {
        $filter = "";
        if (!empty($categoryFilter)) {
            $filter = "WHERE idCategorie = $categoryFilter";
        }

        if (!empty($search)) {
            $filter = "WHERE nomPlante LIKE '%$search%'";
        }

        $plantesQuery = $this->conn->query("SELECT * FROM plantes $filter LIMIT $start, $limit");
        return $plantesQuery;
    }

    public function getTotalPlantes() {
        $result = $this->conn->query("SELECT COUNT(idPlante) AS total FROM plantes");
        $row = $result->fetch_assoc();
        return $row["total"];
    }
}

?>
?>


?>

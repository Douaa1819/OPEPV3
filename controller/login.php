<?php

require_once("../config/db.php");
$tabl=array();
if (isset($_POST['submitConn'])) {

    session_start();
    $emailConn = $_POST["emailConn"];
    $mdpConn = $_POST["mdpConn"];
}
?>

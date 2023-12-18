<?php

require_once("../config/db.php");
require_once("../Model/signin.php");
$tabl=array();
if (isset($_POST['submitConn'])) {

    session_start();
    $emailConn = $_POST["emailConn"];
    $mdpConn = $_POST["mdpConn"];
}
?>

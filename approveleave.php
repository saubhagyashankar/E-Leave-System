<?php
session_start();
include_once 'includes/dbh.inc.php';
if(!isset($_GET['lid']) || !isset($_GET['ldays']) || !isset($_GET['ltype'])){

    header("Location: house.php");

}else{
    $playerName=mysqli_real_escape_string($conn, $_SESSION['uid']);
    $lid = $_GET['lid'];
    $ldays = $_GET['ldays'];
    $ltype = $_GET['ltype'];

    $sql = "UPDATE leavetable
    SET lstatus = 'approved'
    WHERE id = $lid;";
    if ($conn->query($sql) === TRUE) {
        header("Location: approve.php?cancel=success");
        exit();
    }
         else {
        header("Location: approve.php?cancel=failed");
            exit();
    }



}
?>
<?php
session_start();

if(!isset($_SESSION['uid'])){
  header("Location: index.php");
  exit();
}else{
  $name = $_SESSION['uid'];
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="home.css" />
</head>
<body bgcolor="#7F7FBF">
<div class="jumbotron text-center">
<h1>Easy Leave</h1>
</div>
<div class = "userlogout">
<p class="username"><h3>Welcome <?php echo $name; ?></h3> </p>
<br>
<a href="logout.php" id="logout" class="logout"><h3>Logout</h3></a>
</div>
<div class="tab">
  <button class="tablinks" id="home">Home</button>
  <button class="tablinks" id="apply">Apply</button>
  <button class="tablinks" id="cancel">Cancel</button>
  <button class="tablinks" id="approve">Approve</button>
  <button class="tablinks" id="history">History</button>
  <button class="tablinks" id="contact">Contact</button>
</div>
<script type="text/javascript" src="tabs.js"></script>   

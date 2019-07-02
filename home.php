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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="home.css" />
</head>
<body>
<img class="top-right" src="includes/logo1.php" alt="E-Leave" height="140" width="140">
<div class="jumbotron text-center">
<h1>Easy Leave</h1>
</div>
<div class="colll">
<div class = "userlogout">
<p class="username"><h3>Welcome <?php echo $name; ?></h3> </p>
<br>
<a href="logout.php" id="logout" class="logout"><h3>Logout</h3></a>
</div>
</div>
<nav class="navbar navbar-inverse">
<ul class="nav navbar-nav">
  <li ><a  href="house.php">Home</a></li>
  <li><a  href="apply.php">Apply</a></li>
  <li><a  href="approve.php">Approve</a></li>
  <li><a  href="cancel.php">Cancel</a></li>
  <li><a  href="history.php">History</a></li>
  <li><a  href="contact.php">Contact</a></li>
</ul>
</nav>
<script type="text/javascript" src="tabs.js"></script>   

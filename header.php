<?php

session_start();

if(isset($_SESSION['uid'])){
    header("Location: house.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Easy-Leave Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  
</head>
<body>
<header>
        <nav>
            <div class="main-wrapper">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                </ul>
                <div class="nav-login">
                  
                        <form class="signin-form" action="includes/login.inc.php" method="POST">
                            <input type="text" name="uid" placeholder="Username">
                            <input type="password" name="pwd" placeholder="password">
                            <button type="submit" name="submit">Login</button>
                        </form>
                        <a href="signup.php">Sign-up</a>

                </div>
            </div>

        </nav>

</header>
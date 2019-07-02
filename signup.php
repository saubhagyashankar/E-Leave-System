<?php
include_once "header.php";
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Signup</h2>
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="first" placeholder="Firstname">
            <input type="text" name="last" placeholder="Lastname">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="password">
            <button type="submit" name="submit" >Sign up</button>
</form>
<p><?php 
if(isset($_GET['signup'])){
if($_GET['signup']=="success"){
    echo "SignUp Successful!, please Login.";
}else if($_GET['signup']=="email"){
    echo "SignUp Failed!,Invalid Email.";
}else if($_GET['signup']=="empty"){
    echo "SignUp Failed!, Empty Field.";
}else if($_GET['signup']=="invalid"){
    echo "SignUp Failed!, Invalid Characters entered.";
}else if($_GET['signup']=="usertaken"){
    echo "SignUp Failed!, Username is taken.";
} 
}
?></p>

    </div>
</section>
    
<?php
include_once 'footer.php';
?>

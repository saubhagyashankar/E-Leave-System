<?php
include_once 'header.php';
if(isset($_GET['login'])){
    if($_GET['login']=="error"){
        echo "Login Failed!, invalid username or password.";
    } 
    }
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Easy Leave</h2>
        <img src="includes/ll.png" alt="Leave" width="50%" height="50%" class="ll">
    </div>
</section>
    
<?php
include_once 'footer.php';
?>

<?php
session_start();


if(isset($_POST['submit'])){

    include_once 'dbh.inc.php';

    $uid =mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd =mysqli_real_escape_string($conn,$_POST['pwd']);
    //check errors

    if(empty($uid)||empty($pwd)){
        header("Location:../index.php?login=empty");
        exit();
    }else{
        $sql="SELECT * from users where user_uid='$uid';";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1){
            header("Location:../index.php?login=error");
            exit();
        }else{

            if($row =mysqli_fetch_assoc($result)){
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd,$row['user_pwd']);
                 if($hashedPwdCheck == false){
                    header("Location:../index.php?login=error");
                    exit();
                 }else if($hashedPwdCheck == true){
                     $_SESSION['first']=$row['user_first'];
                     $_SESSION['last']=$row['user_last'];
                     $_SESSION['email']=$row['user_email'];
                     $_SESSION['id']=$row['user_id'];
                     $_SESSION['uid']=$row['user_uid'];
                        header("Location: ../house.php");

                 }
            }
        }
    }


}else{
    header("Location:../index.php?login=error");
    exit();
}

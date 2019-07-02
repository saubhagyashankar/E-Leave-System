<?php

session_start();
include_once "includes/dbh.inc.php";

if(!isset($_POST['reason'])||!isset($_POST['startdate'])||!isset($_POST['enddate'])||!isset($_POST['leavetype']))
	header("Location: apply.php?submit=empty");
	else if($_POST['reason']==="")
	header("Location: apply.php?submit=empty");


function months($sd,$sm,$ed,$em) {
$sum=0;

if($sm === $em){
	return ($ed-$sd);
}else{
switch ($sm){
	case 1:
		$sum+=31;
		if(1==($em-1)){
			break;
		}

	case 2:
		$sum+=28;
		if(2==($em-1)){
			break;
		}
	case 3:
		$sum+=31;
		if(3==($em-1)){
			break;
		}
	case 4:
		$sum+=30;
		if(4==($em-1)){
			break;
		}
	case 5:
		$sum+=31;
		if(5==($em-1)){
			break;
		}
	case 6:
		$sum+=30;
		if(6==($em-1)){
			break;
		}
	case 7:
		$sum+=31;
		if(7==($em-1)){
			break;
		}
	case 8:
		$sum+=31;
		
		if(8==($em-1)){
			break;
		}
	case 9:
		$sum+=30;
		if(9==($em-1)){
			break;
		}
	case 10:
		$sum+=31;
		if(10==($em-1)){
			break;
		}
	case 11:
		$sum+=30;
		if(11==($em-1)){
			break;
		}
	case 12:
		$sum+=31;
		if(12==($em-1)){
			break;
		}
}
$sum = ($sum-$sd)+$ed;

}
return $sum;
}


$playerName =mysqli_real_escape_string($conn, $_SESSION['uid']);
$rawdate = $_POST['startdate'];
$sdate = strtotime($rawdate);
$startday = date('j', $sdate);
$startmonth =date("n",$sdate); 
$startyear = date("Y",$sdate);
$sdate = date('Y-m-d',strtotime($rawdate));
$rawdate = $_POST['enddate'];
$edate = strtotime($rawdate);
$endday = date('j', $edate);
$endmonth =date("n",$edate); 
$endyear = date("Y",$edate);
$edate = date('Y-m-d',strtotime($rawdate));
$ltype = $_POST['leavetype'];
$lreason =mysqli_real_escape_string($conn,$_POST['reason']);



if(((($endyear - $startyear) < 0)||(($endyear - $startyear) > 0)||(($endmonth - $startmonth)>2) ||(($endmonth - $startmonth)<0))||(($endmonth==$startmonth)&&(($endday-$startday)<0))) {

	header("Location: apply.php?submit=overflow");
	exit();

}else{
	

$count = "SELECT * from users where user_uid ='$playerName'";
$lcount=$conn->query($count);
$leavecount=mysqli_fetch_array($lcount);

if($leavecount[$ltype] >= ($leavetaken=months($startday,$startmonth,$endday,$endmonth)+1) ) {

$diff = ($leavecount[$ltype]-$leavetaken);

$sql ="UPDATE users 
		SET $ltype=($diff)
		WHERE user_uid = '$playerName';";


if (($conn->query($sql)) === TRUE) {
	
//$sql = "INSERT INTO scoreList(pName,score) VALUES ($playerName,$score)";
$sql = "INSERT INTO leavetable(pname,sdate,edate,ltype,lstatus,days,lreason) VALUES('$playerName','$sdate','$edate','$ltype','pending',$leavetaken,'$lreason');";

if ($conn->query($sql) === TRUE) {
	//echo "inserted successfully";
	
} else {
    echo "Error not inserted " . $conn->error;
}




$conn->close();
//echo "Data Sent,Redirecting plz wait!";
header("Location: apply.php?submit=success");
 /* Redirect browser */


    }else{
		echo "error unable to update".$conn->error;
	}
}else{
	header("Location: apply.php?submit="."overflow");
	exit();
}

}

?>
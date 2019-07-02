<?php
include_once 'home.php';
?>

<link rel="stylesheet" type="text/css" media="screen" href="cancel.css" />
<h1 id="text">Leaves that can be canceled. </h1>

<?php

include_once "includes/dbh.inc.php";


$playerName =mysqli_real_escape_string($conn, $_SESSION['uid']);


$sql = "SELECT * FROM `leavetable` where pname = '$playerName' && lstatus = 'pending';"; 
$i=0;
$lid = array();
$ldays=array();
$ltype=array();
$result=$conn->query($sql);
$count = 0;
while($row=mysqli_fetch_array($result)) { 
  if($count ==0){
    echo "<table class='table table-hover table-dark'>
    <thead>
      <tr>
        <th scope='col'>START-DATE</th>
        <th scope='col'>END-DATE</th>
        <th scope='col'>REASON</th>
        <th scope='col'>CANCEL</th>
      </tr>
    </thead>";
  }
    $lid[$i]=$row['id'];
    $ldays[$i]=$row['days'];
  $sdate=$row['sdate']; 
  $edate=$row['edate'];
  $ltype[$i]=$row['ltype'];
  $status = $row['lstatus']; 
  $lreason = $row['lreason'];
  $count =1;
    echo "<tbody>
    <tr >
      <td>".$sdate."</td>
      <td>".$edate."</td>
      <td>".$lreason."</td>
      <td><a href='cancelleave.php?lid=".urlencode($lid[$i])."&ldays=".urlencode($ldays[$i])."&ltype=".urlencode($ltype[$i])."' class='btn btn-danger' role='button'>Cancel THIS LEAVE</a></td>
    </tr>";
  
    $i++;
    } 

    if($count == 0){
      echo "<p class='zero'>No leaves to Cancel</p>";
    }else{
      echo "</tbody>
</table>";
    }
?>
<p><?php
if(!isset($_GET['cancel'])){

}else{
  $value = $_GET['cancel'];
  if($value == "success")
  echo "<div class='alert alert-success alert-dismissible fade in'>
  <a href='cancel.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> Leave deleted.
</div>";
}
?>
</p>
<?php
include_once 'footer.php';
?>
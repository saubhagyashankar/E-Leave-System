<?php
include_once 'home.php';
?>
<div class="body">
<link rel="stylesheet" type="text/css" media="screen" href="house.css" />
<h2 id="text">(Insert User Details)<br>These are your pending leaves-</h2>
<p>
<?php
  include_once 'includes/dbh.inc.php';
  $playerName = $_SESSION['uid'];
  echo "<table class='table table-hover table-dark'>
  <thead>
    <tr>
      <th scope='col'>Start-Date</th>
      <th scope='col'>Last-Date</th>
      <th scope='col'>Leave Type</th>
      <th scope='col'>Status</th>
    </tr>
  </thead>";
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $sql = "SELECT * FROM `leavetable` where pname = '$playerName'"; 

$response = array();
$topScores = array();
$result=$conn->query($sql);
$count = 0;
$ii=1;
while($row=mysqli_fetch_array($result)) { 
  $sdate=$row['sdate']; 
  $edate=$row['edate'];
  $ltype=$row['ltype'];
  $status = $row['lstatus']; 

    if($status == 'pending'){

        $count =1;
  echo "<tbody>
  <tr>
    <td>".$sdate."</td>
    <td>".$edate."</td>
    <td>".$ltype."</td>
    <td>".$status."</td>
  </tr>";
  $ii++;
} 

}
if($count == 0){
    echo "<tbody>
    <tr>
      <td>--</td>
      <td>--</td>
      <td>--</td>
      <td>--</td>
    </tr>";
}
echo "</tbody>
</table>";
$conn->close();

}



?>
</p>
</div>
<?php
include_once 'footer.php';
?>

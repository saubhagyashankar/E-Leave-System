<?php
include_once 'home.php';
?>

<link rel="stylesheet" type="text/css" media="screen" href="history.css" />
<h2 id="text">All your leave history</h2>
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
while($row=mysqli_fetch_array($result)) { 
  $sdate=$row['sdate']; 
  $edate=$row['edate'];
  $ltype=$row['ltype'];
  $status = $row['lstatus']; 
$count =1;
  echo "<tbody>
  <tr >
    <td>".$sdate."</td>
    <td>".$edate."</td>
    <td>".$ltype."</td>
    <td>".$status."</td>
  </tr>";
} 
if($count == 0){
    echo "<tbody>
    <tr >
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

<?php
include_once 'footer.php';
?>
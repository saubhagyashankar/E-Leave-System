<?php
include_once 'home.php';
?>
<link rel="stylesheet" type="text/css" media="screen" href="apply.css" />


<h2 id="text">Apply Leave </h2>

<h3>Available leaves -

<?php
include_once 'includes/dbh.inc.php';
$playerName =mysqli_real_escape_string($conn, $_SESSION['uid']);
$sql = "SELECT * FROM users WHERE user_uid = '$playerName';";
$result=$conn->query($sql);
$count=0;
while($row=mysqli_fetch_array($result)) { 
  echo "<br>"."CL -".$row['cl']."<br>"." SL -".$row['sl']."<br>"." EL -".$row['el']."<br>"." ML -".$row['ml'];
  $count=1;
}
if($count ==0){
  header("Location: apply.php");
}
?>
</h3>
<p>
<?php
if(!isset($_GET['submit'])){

}else{
$submit=$_GET['submit'];
if( $submit === "overflow"){
echo "<p class='text-danger'>Not enough leaves</p>";
}
else if($submit === "empty"){
 echo "<div class='alert alert-danger alert-dismissible fade in'>
  <a href='apply.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Failed!</strong> Fields empty.
</div>" ;
}
else if($submit === "success"){
  echo "<div class='alert alert-success alert-dismissible fade in'>
  <a href='apply.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> Leave applied, wait for approval.
</div>";
}
}
?>
</p>

<div class="container">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Apply Leave</button>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Apply Leave:</h4>
        </div>
        <div class="modal-body">
        

<pre>
<form action="applyleave.php" method="post">
  <p class="bg-warning">Fill all the fields to apply for a leave</p>

  From:
  <input type="date" required="required" name="startdate">
  To:
  <input type="date" required="required" name="enddate">
  Leave Type:
  <select name="leavetype" >
  <option value="cl" >CL</option>
  <option value="el" >EL</option>
  <option value="sl" >SL</option>
  <option value="ml" >ML</option>
</select>
<br>
Reason:
<textarea class="form-control" required="required" rows="5" id="comment" name="reason"></textarea>
  <input type="submit" class='btn btn-success'>
</form>
</pre>


        </div>
        <div class="modal-footer">
        <p> Have a pleasant day!</p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php
include_once 'footer.php';
?>
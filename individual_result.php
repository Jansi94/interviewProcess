<!DOCTYPE HTML> 
<html>
<head>
</head>
<center><form name="result_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <table name="result_table">
    <tr><td colspan='2'><b>Please enter the candidate id to view the rank</b></td></tr>
   <tr><td>Candidate id:</td>
    <td> <input type="text" name="cid" required></td></tr>
   <tr><td><input type="submit" name="submit" value="View"></td>
    <td><input type="reset" name="reset" value="Clear"></td></tr>
    <tr><td colspan='2'><a href="logout.php">LogOut</a></td></tr>
</form> </center>
<?php
session_start();
         $name=$_SESSION['name'];
         //$cid=$_POST["cid"]; 
if(isset($_POST['submit'])) 
{ 
    $cid = $_POST['cid'];
$host="localhost";
$uname="root";
$pwd="";
$db="interview_process";
$count=0;
$conn=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//To get the interviewer name using uname of the interviewer
$result=mysqli_query($conn,"SELECT * from candidate_new order by mark DESC") or die(mysql_error());
     
         //echo'welcome :'. $name.'<br>';

         if( mysqli_num_rows( $result )==0 )
         {
        	echo 'No Rows Returned';
      	}
      	else
      	{
        	//echo "<table><tr><th>Candidate ID</th><th>Candidate Name</th></tr>";
          echo "<table><tr><th>Rank</th><th>Candidate ID</th><th>Candidate Name</th></tr>";
    // output data of each row
   while($row1 = mysqli_fetch_array($result)) {
        $count++;
        if($row1["cid"]==$cid)
        echo "<tr><td>".$count."</td><td>".$row1["cid"]."</td><td>".$row1["cname"]."</td></tr>";
        //echo "<tr><td>".$row1["cid"]."</td><td>".$row1["cname"]."</td></tr>";
    }
    echo "</table>";
    }
mysqli_close($conn);
}
?>

</body>
</html>

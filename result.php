<!DOCTYPE HTML> 
<html>
<head>
</head>
<?php
session_start();
         $name=$_SESSION['name']; 
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
        echo "<tr><td>".$count."</td><td>".$row1["cid"]."</td><td>".$row1["cname"]."</td></tr>";
        //echo "<tr><td>".$row1["cid"]."</td><td>".$row1["cname"]."</td></tr>";
    }
    echo "</table>";
    }
mysqli_close($conn);
?>
<h4 align="center">  click here  <a href="logout.php">LogOut</a> </h4>
</body>
</html>

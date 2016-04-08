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
$conn1=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

//To get the interviewer name using uname of the interviewer
$result1=mysqli_query($conn1,"SELECT * from interviewer where uname='".$name."'") or die(mysql_error());
     
         //echo'welcome :'. $name.'<br>';

         if( mysqli_num_rows( $result1 )==0 )
         {
        	echo 'No Rows Returned';
      	}
      	else
      	{
        	while( $row2 = mysqli_fetch_assoc( $result1 ) )
        	{
          	$interviewer_id=$row2['interviewer_id'];
          	//echo $interviewer_id;
        	}
    	}
mysqli_close($conn1);

$conn=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//To get the interviewer name using uname of the interviewer
$result=mysqli_query($conn,"SELECT * from candidate_interview_new where interviewer_id='".$interviewer_id."'") or die(mysql_error());
     
         //echo'welcome :'. $name.'<br>';

         if( mysqli_num_rows( $result )==0 )
         {
        	echo 'No Rows Returned';
      	}
      	else
      	{
        	//echo "<table><tr><th>Candidate ID</th><th>Candidate Name</th></tr>";
          echo "<table><tr><th>Candidate ID</th><th>Marks awarded by you</th></tr>";
    // output data of each row
   while($row1 = mysqli_fetch_array($result)) {
        
        echo "<tr><td>".$row1["cid"]."</td><td>".$row1["mark"]."</td></tr>";
        //echo "<tr><td>".$row1["cid"]."</td><td>".$row1["cname"]."</td></tr>";
    }
    echo "</table>";
    }
mysqli_close($conn);
?>
<h4 align="center">  click here  <a href="logout.php">LogOut</a> </h4>
</body>
</html>



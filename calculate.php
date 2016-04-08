<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 
<?php
session_start();

        // $cid_for_mark=$_SESSION['cid_for_mark']; 
         //$mark=$_SESSION['mark'];
if(isset($_POST['submit']))
{
      		$name=$_SESSION['name']; 
      		$cid_for_mark=$_POST['cid_for_mark'];
          //$cid_for_mark=$_SESSION['cid_for_mark']; 
      		//echo $cid_for_mark;
      		$mark=$_POST['mark'];
          //$mark=$_SESSION['mark'];
      		//$portion_of_mark=$mark/3;

$host="localhost";
$uname="root";
$pwd="";
$db="interview_process";

// To get the interviewer id
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
        	while( $row1 = mysqli_fetch_assoc( $result1 ) )
        	{
          	$interviewer_id=$row1['interviewer_id'];
          	//echo $interviewer_id;
        	}
    	}
mysqli_close($conn1);

//End ofInterviewer id retrived

$conn=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$sql = "INSERT INTO candidate_interview (cid,interviewer_id,mark) VALUES ('".$cid_for_mark."','".$interviewer_id."','".$mark."');";
$sql = "INSERT INTO candidate_interview_new (cid,interviewer_id,mark) VALUES ('".$cid_for_mark."','".$interviewer_id."','".$mark."');";
//echo $cid_for_mark;
//echo $interviewer_id;
//echo $mark;
if (mysqli_query($conn, $sql)) {
    //echo "Mark updated successfully";
    echo "<script> alert('Mark updated successfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$trigger_drop = "DROP TRIGGER IF EXISTS marktrigger";
if(mysqli_query($conn, $trigger_drop)){
  echo "<script> alert('Trigger dropped successfully');</script>";
}


$marktrigger1="CREATE TRIGGER marktrigger AFTER INSERT ON candidate_interview_new FOR EACH ROW UPDATE candidate_new SET mark=mark+'".$mark."' WHERE cid = '".$cid_for_mark."';";
//$marktrigger1="CREATE TRIGGER marktrigger AFTER INSERT ON candidate_interview FOR EACH ROW UPDATE candidate SET mark=mark+'".$portion_of_mark."' WHERE cid = '".$cid_for_mark."';";
  if (mysqli_query($conn, $marktrigger1)) {

    echo "Candidate mark has been updated successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}


?>
<h4 align="center">  click here  <a href="mark_update.php">To award a new candidate</a> </h4>
<h4 align="center">  click here  <a href="individual_result.php">To view the individual candidate rank</a> </h4>
<h4 align="center">  click here  <a href="result.php">To view all the candidates rank</a> </h4>
<h4 align="center">  click here  <a href="logout.php">LogOut</a> </h4>
</body>
</html>
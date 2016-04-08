<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 
<?php
$host="localhost";
$uname="root";
$pwd="";
$db="interview_process";
$candidate_name=$_POST['candidate_name'];
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
$gender=$_POST['gender'];

$conn=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//$result = mysqli_query($conn,"SELECT * FROM candidate;");
//$num_rows = mysqli_num_rows($result);
//$no = (int)$num_rows + 1;
//$num_rows = "C00".(string)$no;
//$sql = "INSERT INTO candidate (cid,cname, uname, pwd, position, gender) VALUES ('".$num_rows."','".$candidate_name."','".$username."','".$password."','".$position."','".$gender."');";

$result = mysqli_query($conn,"SELECT * FROM candidate_new;");
$num_rows = mysqli_num_rows($result);
$no = (int)$num_rows + 1;
$num_rows =(string)$no;
$sql = "INSERT INTO candidate_new (cid,cname, uname, pwd, position, gender) VALUES ('".$num_rows."','".$candidate_name."','".$username."','".$password."','".$position."','".$gender."');";

if (mysqli_query($conn, $sql)) {
    echo "Candidate details registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<h4 align="center">  click here to <a href="logout.php">LogOut</a> </h4>
</body>
</html>
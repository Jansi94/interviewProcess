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

session_start();
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];


$conn=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if($username!=''&&$password!='')
 {
   $query=mysqli_query($conn,"SELECT * from interviewer where uname='".$username."' and pwd='".$password."'") or die(mysql_error());
   $res=mysqli_fetch_row($query);
   if($res)
   {
    $_SESSION['name']=$username;
    header('location:mark_update.php');
   }
   else
   {
    //echo'You entered username or password is incorrect';
    echo "<script> alert('The username or password is incorrect.Please enter valid credentials');</script>";
    //header('location:interviewer_login.php');
    echo "<center><h4><table><tr rowspane='2'><td> Click here </td><td><a href='interviewer_login.php'>Try Again</a></td></tr> </h4></center>";
    echo "<center><h4><tr><td>Click here to home page </td><td><a href='index.php'>Home page</a> </h4></center>";

    //echo "<script> alert(The username or password is incorrect<br>Please enter valid credentials);</script>";
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
mysqli_close($conn);
?>
</body>
</html>
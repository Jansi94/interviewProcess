<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<?php
// define variables and set to empty values
session_start();
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $username = test_input($_POST["username"]);
   $password = test_input($_POST["password"]);
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<center><h3> Interviewer Login </h3><center>
<!--<form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
 <center>  <form method="post" action="interviewer_login_validate.php">
   <table name="interviewer_login_form">
   <tr><td>User name:</td><td> <input type="text" name="username"></td></tr>
   
   <tr><td>password: </td><td><input type="password" name="password"></td></tr>
   
   <tr><td><input type="submit" name="submit" value="Submit"></td>
      <td><input type="reset" name="reset" value="Clear"></td></tr>
      <tr><td colspan='2'><a href='index.php'>Back to home</a></td></tr>
   </table>
</form></center>
</body>
</html>
<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<?php
// define variables and set to empty values
session_start();
$candidate_name = $username = $password = $position = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $candidate_name = test_input($_POST["candidate_name"]);
   $username = test_input($_POST["username"]);
   $password = test_input($_POST["password"]);
   $position = test_input($_POST["position"]);
   $gender = test_input($_POST["gender"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<center><h2>Candidate Registration</h2></center>
<!--<form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
  <center> <form method="post" action="candidate_save.php">
      <table name="registration_table">
   <tr><td>Name:</td><td> <input type="text" name="candidate_name" required></td></tr>
   
   <tr><td>User name:</td><td><input type="text" name="username" required></td></tr>
   
   <tr><td>password:</td><td><input type="password" name="password" required></td></tr>
   
   <tr><td>Position to apply:</td><td><input name="position" required></td></tr>
   
   <tr><td>Gender:
   <input type="radio" name="gender" value="female">Female
   </td><td><input type="radio" name="gender" value="male">Male</td></tr>
   
   <tr><td><input type="submit" name="submit" value="Submit"> </td>
      <td><input type="reset" name="reset" value="Clear"><td></tr>
         <tr><td colspan='2'><a href='index.php'>Back to home</a></td></tr></table>
</form></center>



</body>
</html>
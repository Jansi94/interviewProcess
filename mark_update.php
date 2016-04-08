<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 
<?php
session_start();
         $name=$_SESSION['name']; 
$host="localhost";
$uname="root";
$pwd="";
$db="interview_process";
$conn=mysqli_connect($host,$uname,$pwd,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//To get the interviewer name using uname of the interviewer
$result=mysqli_query($conn,"SELECT * from interviewer where uname='".$name."'") or die(mysql_error());
     
         //echo'welcome :'. $name.'<br>';

         if( mysqli_num_rows( $result )==0 )
         {
        	echo 'No Rows Returned';
      	}
      	else
      	{
        	while( $row = mysqli_fetch_assoc( $result ) ){
          echo "<center><b>Welcome :" .$row['interviewer_name']."</b></center>";
        }
    }
mysqli_close($conn);

//To retrive the candidate details from the candidate table
$host1="localhost";
$uname1="root";
$pwd1="";
$db1="interview_process";
$conn1=mysqli_connect($host1,$uname1,$pwd1,$db1);
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}


//To View the candidate details in table format

//$result1 = mysqli_query($conn1,"SELECT * from candidate") or die(mysql_error());
$result1 = mysqli_query($conn1,"SELECT * from candidate_new") or die(mysql_error());

   echo "<table><tr><th>Candidate ID</th><th>Candidate Name</th></tr>";
    
   while($row1 = mysqli_fetch_array($result1)) {
        echo "<tr><td>".$row1["cid"]."</td><td>".$row1["cname"]."</td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result1);
mysqli_close($conn1);


/*

//To select the candidate id from drop down list
echo "<center><form name='test'>";
echo "<table><tr><td>Select the Candidate</td><td>"
echo "<select name='cid_for_mark1'>";
echo "<option value=''>Select...</option>";

    $result2 = mysqli_query($conn1,"SELECT * from candidate") or die(mysql_error());
    while($row2 = mysqli_fetch_array($result2)) {
      $current_id = $row2["cid"];
  		echo "<option value=''>".$current_id."</option>";
    	
    }
  echo "</select><td></table></form></center>";
  mysqli_free_result($result2);
mysqli_close($conn1);
*/






//To update a mark get the cid and mark and save it as session variable
$cid_for_mark = $mark = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $cid_for_mark = test_input($_POST["cid_for_mark"]);
   $mark = test_input($_POST["mark"]);
   $_SESSION['cid_for_mark']=$cid_for_mark;
   $_SESSION['mark']=$mark;
 
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<center><form name="mark_form" method="post" action="calculate.php" onsubmit=" return validateForm()">
   <table name="mark_table">
    <tr><td colspan='2'><b>Please enter the candidate id from the above list</b></td></tr>
   <tr><td>Candidate id:</td>
    <td> <input type="text" name="cid_for_mark" required></td></tr>
   
   <tr><td>Mark:</td>
    <td><input type="text" name="mark" required></td></tr>
   
   <tr><td><input type="submit" name="submit" value="Update mark"></td>
    <td><input type="reset" name="reset" value="Clear"></td></tr>
    <tr><td colspan='2'><a href="logout.php">LogOut</a></td></tr>
</form> </center>
<h4 align="center">  click here  <a href="individual_rating_view.php">To view the marks you given previously</a> </h4>
<script>
  function validateForm() {
    var x = document.forms['mark_form']['cid_for_mark'].value;
    x=x.trim;
    if (x == null || x == "") 
    {
        alert('please enter the candidate id');
        return false;
    }
    
    var y = document.forms['mark_form']['mark'].value;
    //var val = document.getElementById('mark').value;
    
    var n=parseInt(y,10);
    var letters = /^[A-Za-z]+$/; 
    if(y.match(letters))
      {
        alert('Letters not allowed.Please enter the mark 1 to 5');
        return false;
    }

    if (n<1 || n>5 )
    
    {
        alert('Please enter the mark 1 to 5');
        return false;
    }
    
}
</script>
</body>
</html>






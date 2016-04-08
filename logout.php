
<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> <?php
session_start();
if(session_destroy())
{
header("Location:index.php");
}
?>
</body>
</html>

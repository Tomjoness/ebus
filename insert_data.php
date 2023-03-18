<!DOCTYPE html>
<html>
<head>
<!--This is a comment. Comments are not displayed in the browser-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Author" content="Your Name">
<title>PHP MySQL</title>
</head>
<body>
<h1> This is the response:  </h1>
<br>
<?php
// Input your own MySQL username and password!
$host="mysql5";
$user="username";
$password="password";
$connection = mysqli_connect($host,$user,$password);
 
 
if (!$connection)
{
die("Couldn't connect to server");
}
else
{
// this program does not need any data passed to it by a form
// select database  
$dbname = "username";
$db_selected = mysqli_select_db($connection, $dbname);
if (!$db_selected)
{
   die ('Can\'t use $user : ' . mysqli_error());
}
 
 
$student_name = $_POST['student_name'];
 $student_number = $_POST['ID'];
$module_description = $_POST['module_description'];
 
$query = "Insert INTO Student VALUES('$student_number','$student_name')";
 
 
$result = mysqli_query($connection, $query)
or die ("Couldn't execute query");
echo "<br>";
echo "<p> Module Added: </p>";
echo "<br>";
}
$query = "Insert INTO StudentModule VALUES('$student_number','$student_number')";
 
$result = mysqli_query($connection, $query);
$query = "Insert INTO Module VALUES('$student_number','$module_description')";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
?>
 
</body>
</html>
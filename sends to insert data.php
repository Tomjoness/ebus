<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="Author" content="Your Name">
  <title>Database query</title>        
</head>
<body>
<h1> This is a form:  </h1>
Add student to a Module
<br>
<!--  action gives the name and location of you php program -->
<form action="NewStudentaddModule.php" method="POST">
 
<p>
<!--  This is where you get input from the user -->
 
Enter the students's name: <input type="text" name="student_name">
Enter the students's ID: <input type="text" name="ID">
Enter the Module: <input type="text" name="module_description">
</p>
<p>
<!--  This creates a button on the form which, when clicked causes the action, above, to happen -->
 
<input type="submit" value="GO">
 
</p>
 
</form>
</body>
</html>
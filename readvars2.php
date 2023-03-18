<!DOCTYPE html>
<html>
<head>
	<title>General read form</title>
	<meta charset="utf-8">
</head>

<body>



<table> <tr> <td> NAME </td> <td> </td> <td> VALUE </td> </tr>

<?php
foreach ($_POST as $varname => $varvalue) {
    echo ("
		<tr> <td>$varname </td> 
		<td>&nbsp; = &nbsp;</td> 
		<td> $varvalue </td> 
		</tr> "); 
}
?>

</table> 

<table> <tr> <td> NAME </td> <td> </td> <td> VALUE </td> </tr>

<?php
foreach ($_GET as $varname => $varvalue) {
    echo ("
		<tr> <td>$varname </td> 
		<td>&nbsp; = &nbsp;</td> 
		<td> $varvalue </td> 
		</tr> <br>"); 
}
?>

</table> 
<p> The following are obtained from the $_ REQUEST  array - which contains is all the variables sent by both the GET and POST Methods and related cookies</p>  

<?php
foreach ($_REQUEST as $varname => $varvalue) {
    echo ("$varname = $varvalue <br>"); }
?>

<br/><br/>

</body>
</html>

<html>
<body >
<?php
$dbh=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($dbh,'movie') or die (mysqli_error($dbh));

$var=mysqli_query($dbh,"SELECT * from distributor");
echo"<table border size=1>";
echo"<tr><th>movid</th><th>revstars</th> <th>amountspent</th><th>amountgained</th></tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td></tr>";
}
echo"</table>";

?>
<h4><font color="cyan"><a href="index.html">click here to go back to the home page </a></font></h4>
</body>
</html>
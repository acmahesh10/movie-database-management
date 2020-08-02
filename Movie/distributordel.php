

<html>
<head>
<title>delete the distributor info</title>
</head>
<body>
<hr><h1 align="centre"><font color="red">To delete distributor details</font></h1>
<form action="distributordel.php">
enter the movieid:<br>
<input type ="text" name="movid"><br>

<input type ="submit" value="delete"><br>
</form>
</body>
</html>




<html>
<body >
<?php
$dbh=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($dbh,'movie') or die (mysqli_error($dbh));

$movid=$_REQUEST['movid'];



$query="delete from distributor where movid='$movid'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from distributor");
echo"<table border size=1>";
echo"<tr><th>movid</th><th>revstars</th> <th>amountspent</th><th>amountgained</th></tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td></tr>";
}
echo"</table>";

?>

<h4><font color="cyan"><a href="distributordel.html">click here to delete the distributor details</a></font></h4>
<h4><font color="cyan"><a href="index.html"><button>home</button></a></font></h4>
</body>
</html>
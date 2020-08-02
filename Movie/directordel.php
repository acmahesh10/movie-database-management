

<html>
<head>
<title>delete the director info</title>
</head>
<body>
<hr><h1 align="centre"><font color="red">To delete director details</font></h1>
<form action="directordel.php">
enter the directorid:<br>
<input type ="text" name="dirid"><br>

<input type ="submit" value="delete"><br>
</form>
</body>
</html>




<html>
<body >
<?php
$dbh=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($dbh,'movie') or die (mysqli_error($dbh));

$dirid=$_REQUEST['dirid'];



$query="delete from director where dirid='$dirid'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from director");
echo"<table border size=1>";
echo"<tr><th>dirid</th> <th>dirname</th> <th>phone</th><th>address</th></tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td></tr>";
}
echo"</table>";

?>

<h4><font color="cyan"><a href="directordel.html">click here to delete the director details</a></font></h4>
<h4><font color="cyan"><a href="index.html"><button>home</button></a></font></h4>
</body>
</html>
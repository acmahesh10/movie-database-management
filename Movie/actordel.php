

<html>
<head>
<title>delete the actor info</title>
</head>
<body>
<hr><h1 align="centre"><font color="red">To delete actor details</font></h1>
<form action="actordel.php">
enter the actorid:<br>
<input type ="text" name="actid"><br>

<input type ="submit" value="delete"><br>
</form>
</body>
</html>




<html>
<body >
<?php
$dbh=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($dbh,'movie') or die (mysqli_error($dbh));

$actid=$_REQUEST['actid'];



$query="delete from actor where actid='$actid'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from actor");
echo"<table border size=1>";
echo"<tr><th>actid</th> <th>actname</th> <th>gender</th><th>phone</th><th>address</th></tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";

?>

<h4><a href="actordel.html">click here to delete the actor details</a></h4>
<h4><a href="index.html"><button> home  </button></a></h4>
</body>
</html>
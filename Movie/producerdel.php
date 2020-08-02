

<html>
<head>
<title>delete the producer info</title>
</head>
<body>
<hr><h1 align="centre"><font color="red">To delete producer details</font></h1>
<form action="producerdel.php">
enter the producerid:<br>
<input type ="text" name="pid"><br>

<input type ="submit" value="delete"><br>
</form>
</body>
</html>




<html>
<body >
<?php
$dbh=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($dbh,'movie') or die (mysqli_error($dbh));

$pid=$_REQUEST['pid'];



$query="delete from producer where pid='$pid'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from producer");
echo"<table border size=1>";
echo"<tr><th>pid</th> <th>movid</th> <th>budject</th><th>industrycollection</th></tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td></tr>";
}
echo"</table>";

?>

<h4><a href="producerdel.html">click here to delete the producer details</a></h4>
<h4><a href="index.html"> <button>home</button>  </a></h4>
</body>
</html>
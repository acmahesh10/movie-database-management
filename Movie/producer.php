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
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));
	
	if(isset($_POST['submit'])){
		
		$pid = $_POST['pid'];
		$movid = $_POST['movid'];
		$budject = $_POST['budject'];
		$industrycollection=$_POST['industrycollection'];
		
		
		$query = "INSERT INTO producer VALUES ('$pid','$movid','$budject','$industrycollection')";
		$result = mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "producer Data Inserted Successfully!!!";
	}
	
	
	
	
	
	

   $var=mysqli_query($dbh,"SELECT * FROM producer");

  echo"<table border size=1>";
  echo"<tr><th>pid</th><th>movid</th> <th>budject</th><th>industrycollection</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td></tr>";
   }
   echo"</table>";
?>

<?php
$db_host="localhost";
$db_name="movie";
$db_user="root";
$db_pass="";
$con = mysqli_connect("$db_host","$db_user","$db_pass") or die ("could not connect");
mysqli_select_db($con,'movie') or die(mysqli_error($con));
$p0=mysqli_query($con,"call total_collection(@out);");
$rs=mysqli_query($con,'SELECT @out');
	while ($arr=mysqli_fetch_row($rs))
	{
		echo 'Total Industry Collection is=Rs. '.$arr[0];
	}
	mysqli_close($con);
	?>




<h4><font color="cyan"><a href="producerdel.html"><button> delete </button> </a></font></h4>
<h4><font color="cyan"><a href="updateproducer.php"><button> update</button></a></font></h4>
<h4><font color="cyan"><a href="index.html"><button> home </button> </a></font></h4>

</body>
</html>




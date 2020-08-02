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
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));
	
	if(isset($_POST['submit'])){
		
		$movid = $_POST['movid'];
		$revstars = $_POST['revstars'];
		$amountspent = $_POST['amountspent'];
		$amountgained=$_POST['amountgained'];
		$profit=null;
		
		
		$query = "INSERT INTO distributor VALUES ('$movid','$revstars','$amountspent','$amountgained','$profit')";
		$result = mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "distributor Data Inserted Successfully!!!";
	}
	
	
	
	
	
	

   $var=mysqli_query($dbh,"SELECT * FROM distributor");

  echo"<table border size=1>";
  echo"<tr><th>movid</th><th>revstars</th> <th>amountspent</th><th>amountgained</th><th>profit</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
   }
   echo"</table>";
?>
<h4><font color="cyan"><a href="distributordel.html"><button> delete </button> </a></font></h4>
<h4><font color="cyan"><a href="updatedistributor.php"><button> update</button></a></font></h4>
<h4><font color="cyan"><a href="index.html"><button> home </button> </a></font></h4>

</body>
</html>




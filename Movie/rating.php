




<html>
<head>
<title>delete the rating info</title>
</head>
<body>
<hr><h1 align="centre"><font color="red">To delete rating details</font></h1>
<form action="ratingdel.php">
enter the Movieid:<br>
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
		
		$query = "INSERT INTO rating VALUES ('$movid','$revstars')";
		$result = mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "rating Data Inserted Successfully!!!";
	}
	
	
	
	
	
	

   $var=mysqli_query($dbh,"SELECT * FROM rating");

  echo"<table border size=1>";
  echo"<tr><th>movid</th> <th>revstars</th> </tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> </tr>";
   }
   echo"</table>";
?>
<h4><font color="cyan"><a href="ratingdel.html"><button> delete </button> </a></font></h4>
<h4><font color="cyan"><a href="updaterating.php"><button> update</button></a></font></h4>
<h4><font color="cyan"><a href="index.html"><button> home </button> </a></font></h4>

</body>
</html>




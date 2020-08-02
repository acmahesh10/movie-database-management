




<html>
<head>
<title>delete the Director info</title>
</head>
<body>
<hr><h1 align="centre"><font color="red">To delete Director details</font></h1>
<form action="directordel.php">
enter the directorid:<br>
<input type ="text" name="dirid"><br>

<input type ="submit" value="delete"><br>
</form>



<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));
	
	if(isset($_POST['submit'])){
		
		$dirid = $_POST['dirid'];
		$dirname = $_POST['dirname'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];

		if($dirid!="" && $dirname!="" && $phone!="" && $address!="")
		{
		
		$query = "INSERT INTO director VALUES ('$dirid','$dirname','$phone','$address')";
		$result = mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "director Data Inserted Successfully!!!";
		}
		else {
			echo "all fields required";
		     }
	
		}
	
	
	
	

   $var=mysqli_query($dbh,"SELECT * FROM director");

  echo"<table border size=1>";
  echo"<tr><th>actid</th> <th>actname</th><th>phone</th><th>address</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td></tr>";
   }
   echo"</table>";
?>

<h4><a href="directordel.html"><button> delete </button> </a></h4>
<h4><a href="updatedirector.php"><button> update </button></a></h4>
<h4><a href="index.html"><button> home </button> </a></h4>

</body>
</html>




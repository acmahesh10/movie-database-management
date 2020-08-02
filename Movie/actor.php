




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
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));
	
	if(isset($_POST['submit'])){
		
		$actid = $_POST['actid'];
		$actname = $_POST['actname'];
		$gender = $_POST['gender'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
                  
		if($actid!="" && $actname!="" && $gender!="" && $phone!="" && $address!="")
		{
		
		$query = "INSERT INTO actor VALUES ('$actid','$actname', '$gender','$phone','$address')";
		$result = mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "actor Data Inserted Successfully!!!";
		}
		else {
			echo "all fields required";
		     }
	}
	
	
	
	
	

   $var=mysqli_query($dbh,"SELECT * FROM actor");

  echo"<table border size=56>";
  echo"<tr><th>actid</th> <th>actname</th> <th>gender</th><th>phone</th><th>address</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
   }
   echo"</table>";
?>
<h4><font color="blue"><a href="actordel.html"><button> delete </button> </a></font></h4>
<h4><font color="cyan"><a href="updateactor.php"><button> update</button></a></font></h4>
<h4><font color="blue"><a href="index.html"><button> home </button> </a></font></h4>
<table border size=56 color=#fcfcch>



</table>

</body>
</html>




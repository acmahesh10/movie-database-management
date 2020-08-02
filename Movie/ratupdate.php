

<html>
<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));








if(isset($_POST['updaterating'])){
			$movid = $_POST['movid'];
		$revstars = $_POST['revstars'];
	
		$query = "UPDATE `rating` SET `revstars`='$revstars' WHERE `movid`='$movid'";
		mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "Data Updated Successfully!!!";
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
<h4><font color="cyan"><a href="index.html"><button>home</button></a></font></h4>
</html>
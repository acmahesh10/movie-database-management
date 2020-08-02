
<html>

<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));








if(isset($_POST['updatedirector'])){
		$dirid = $_POST['dirid'];
		$dirname = $_POST['dirname'];
		
		$phone=$_POST['phone'];
		$address = $_POST['address'];
	
		$query = "UPDATE `director` SET `dirname`='$dirname',`phone`='$phone',`address`='$address' WHERE `dirid`='$dirid'";
		mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "Data Updated Successfully!!!";
	}
	
	
	   $var=mysqli_query($dbh,"SELECT * FROM director");

  echo"<table border size=1>";
  echo"<tr><th>dirid</th> <th>dirname</th> <th>phone</th><th>address</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td></tr>";
   }
   echo"</table>";
	
	
	
	
	?>
<h4><font color="blue"><a href="index.html"><button> home </button> </a></font></h4>
</html>
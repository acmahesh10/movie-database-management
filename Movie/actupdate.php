<html>

<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));








if(isset($_POST['updateactor'])){
		$actid = $_POST['actid'];
		$actname = $_POST['actname'];
		$gender = $_POST['gender'];
		$phone=$_POST['phone'];
		$address = $_POST['address'];
	
		$query = "UPDATE `actor` SET `actname`='$actname',`gender`='$gender',`phone`='$phone',`address`='$address' WHERE `actid`='$actid'";
		mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "Data Updated Successfully!!!";
	}
	
	
	   $var=mysqli_query($dbh,"SELECT * FROM actor");

  echo"<table border size=1>";
  echo"<tr><th>actid</th> <th>actname</th> <th>gender</th><th>phone</th><th>address</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
   }
   echo"</table>";
	
	
	
	
	
	?>
	
	<h4><font color="blue"><a href="index.html"><button> home </button> </a></font></h4>
</html>
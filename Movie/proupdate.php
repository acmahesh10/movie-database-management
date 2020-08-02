
<html>

<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));








if(isset($_POST['updateproducer'])){
		$pid = $_POST['pid'];
		$movid = $_POST['movid'];
		$budject = $_POST['budject'];
		$industrycollection=$_POST['industrycollection'];
		
	
		$query = "UPDATE `producer` SET `movid`='$movid',`budject`='$budject',`industrycollection`='$industrycollection' WHERE `pid`='$pid'";
		mysqli_query($dbh,$query) or die(mysql_error($dbh));
		echo "Data Updated Successfully!!!";
	}
	
	
	   $var=mysqli_query($dbh,"SELECT * FROM producer");

  echo"<table border size=1>";
  echo"<tr><th>pid</th> <th>movid</th> <th>budject</th><th>industrycollection</th></tr>";
  while ($arr=mysqli_fetch_row($var))
  {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td></tr>";
   }
   echo"</table>";
	
	
	
	
	
	?>
<h4><font color="blue"><a href="index.html"><button> home </button> </a></font></h4>
</html>
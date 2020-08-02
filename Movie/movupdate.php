
<html>
<body>

<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));








if(isset($_POST['updatemovie'])){
		
		$movid = $_POST['movid'];
		$movtitle = $_POST['movtitle'];
		$movyear = $_POST['movyear'];
		$movlang=$_POST['movlang'];
		$dirid=$_POST['dirid'];
		$actid=$_POST['actid'];
		
		$query = "UPDATE `movie` SET `movtitle`='$movtitle',`movyear`='$movyear',`movlang`='$movlang',`dirid`='$dirid',`actid`='$actid' WHERE `movid`='$movid'";
		mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "Data Updated Successfully!!!";
	}
	
	
	   $var=mysqli_query($dbh,"SELECT * FROM movie");

  echo"<table border size=1>";
    echo"<tr><th>movid</th> <th>movtitle</th> <th>movyear</th><th>movlang</th><th>dirid</th><th>actid</th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[5]</td></tr>";
   }
   echo"</table>";
		
	?>
	
	<h4><font color="blue"><a href="index.html"><button> home </button> </a></font></h4>
	</body>
	</html>
	
	
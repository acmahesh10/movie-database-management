<html>

<?php								 
    
	$dbh = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($dbh,'movie') or die(mysqli_error($dbh));






if(isset($_POST['updatedistributor'])){
		$movid = $_POST['movid'];
		$region = $_POST['region'];
		$amountspent = $_POST['amountspent'];
		$amountgained=$_POST['amountgained'];
		
	
		$query = "UPDATE `distributor` SET `movid`='$movid',`region`='$region',`amountspent`='$amountspent',`amountgained`='$amountgained' WHERE `movid`='$movid'";
		mysqli_query($dbh,$query) or die(mysqli_error($dbh));
		echo "Data Updated Successfully!!!";
	}
	
          $var=mysqli_query($dbh,"SELECT * FROM distributor");



           echo"<table border size=1>";
           echo"<tr><th>movid</th> <th>region</th> <th>amountspent</th><th>amountgained</th></tr>";
         while ($arr=mysqli_fetch_row($var))
        {
       		 echo"<tr><td>$arr[0]</td><td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td></tr>";
        }
         echo"</table>";
	
	?>
	
	<h4><font color="blue"><a href="index.html"><button> home </button> </a></font></h4>
</html>
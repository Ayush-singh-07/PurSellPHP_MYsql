<!DOCTYPE html>
<html>
<head>
	<title>stock</title>
</head>
<body>
	<form method="POST">
	<br>
<table style="text-align: center;margin-left:40%;">
  <tr>
  	<th>
  		Form date:<input type="date" name="fdate" required>
  	</th>
	<th>
		to date:<input type="date" name="tdate" required>
	</th></tr>
</table>
<br>
<div style="margin-left:50%;">
<input type="submit" name="submit" value="search">
</div>
</form>
<br><br>
<table style="margin-left: 30%;width:40%;" border="1" >
	<tr>

		<th>itemname</th>
        <th>purchase</th>
        <th>sale</th>
        <th>stock</th>
	</tr>
<?php
if(isset($_POST["submit"]))
{    
	$db=mysqli_connect("localhost","root","","usersdata");
	$a1=$_POST["fdate"];
	$a2=$_POST["tdate"];
	$q=mysqli_query($db,"SELECT * FROM `salemaster` WHERE `timeofsale` BETWEEN '$a1' AND '$a2'");
	 for ($i=1;$row=mysqli_fetch_array($q); $i++)
	 {  
	 	$c=$row['id'];
	 	$h=mysqli_query($db,"SELECT pquantity FROM purchasedetails WHERE id='$c'");
	 	$r=mysqli_fetch_array($h);
	 	$j=$r['pquantity']-$row['quantity'];
	  ?>
              <tr>
                   <?php echo"
                <td>".$row['itemname']."</td>
                <td>".$r['pquantity']."</td>
                <td>".$row['quantity']."</td>
                <td>$j</td>
                </tr>
                ";	
	}
}
?>

</table>
</body>
</html>
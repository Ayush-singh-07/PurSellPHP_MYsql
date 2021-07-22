<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <label>From date</label><input type="date" name="fromdate">
        <label>To date</label ><input type="date" name="date">
        <input type="Submit" name="submit" value="SERACH">
</form>

<?php
require_once('database.php');
$sql="SELECT * FROM SELECT * FROM `salemaster` WHERE `timeofsale` BETWEEN '$a1' AND '$a2'";
$stmt=$connectDB->query($sql);
while($row=$stmt->fetch()){
    $salqnt=$row['quantity'];
    $itemname=$row['itemname'];
    $sid=$row['id'];

  
    $sqlx="SELECT pquantity FROM purchasedetails WHERE id='$sid'";
    $stmtx=$connectDB->query($sqlx);
}



?>



</body>
</html>
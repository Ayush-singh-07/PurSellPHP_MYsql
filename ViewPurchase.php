<?php  require_once("database.php")  ?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Purchase</title>
</head>
<body>


<table width="1000" border="5" align="center">
<tr>
<th>Purchase ID</th>
<th>Item ID</th>
<th>Purchase Number</th>
<th>Quantity</th>
<th>Rate</th>
<th>Total Amount</th>
<th>Time Of Purchase</th>
</tr>

<?php

$sql="SELECT purchasedetails.purchasemsid,
purchasemaster.itemid,
purchasemaster.purchaseno,
purchasedetails.pquantity,
purchasedetails.rate,
purchasemaster.totalamt,
purchasemaster.stampdate
FROM purchasemaster
INNER JOIN purchasedetails ON purchasemaster.id = purchasedetails.id";

$stmt=$connectDB->query($sql);

while($datarow=$stmt->fetch()){
    $pid=$datarow['purchasemsid'];
    $itemid=$datarow['itemid'];
    $pno=$datarow['purchaseno'];
    $qty=$datarow['pquantity'];
    $rate=$datarow['rate'];
    $totalamt=$datarow['totalamt'];
    $sdate=$datarow['stampdate'];

?>
    <tr>
    <td> <?php echo $pid; ?> </td>
    <td> <?php echo $itemid; ?> </td>
    <td> <?php echo $pno; ?> </td>
    <td> <?php echo $qty; ?> </td>
    <td> <?php echo $rate; ?> </td>
    <td> <?php echo $totalamt; ?> </td>
    <td> <?php echo $sdate; ?> </td>
    </tr>

<?php } ?>

</table>

</body>
</html>
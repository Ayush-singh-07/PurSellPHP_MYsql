

<?php
require_once("database.php");
$searchQuery=$_GET['id'];
if(isset($_POST['deleteit'])){

    $cname=$_POST['contname'];
    $mobile=$_POST['mobnum'];
    $itemname=$_POST['item_name'];
    $quantity=$_POST['quantity'];
    $rate=$_POST['rate'];
    $total=$_POST['totalamt'];
    $saleno= rand(100,1000);
    $date = time();
        
        $sql= "DELETE FROM  saledetails  WHERE saleid='$searchQuery'     ";
        $Execute = $connectDB -> query($sql);
}

?>
<?php
        require_once('database.php');
        $searchQuery=$_GET['id'];
    ?>
<?php
if(isset($_POST['addtotemp'])){
    $cname=$_POST['contname'];
    $mobile=$_POST['mobnum'];
    $itemname=$_POST['item_name'];
    $quantity=$_POST['quantity'];
    $rate=$_POST['rate'];
    $total=$_POST['totalamt'];
    $saleno= rand(100,1000);

   

    $sql="INSERT INTO saledetails(customername,mobile,itemname,quantity,rate,totalamt,saleno)
                VALUES(:cnameE,:mobileE,:itemnameE,:quantityE,:rateE,:totalE,:salenoE)";
                 $stmt=$connectDB -> prepare($sql);
                 $stmt->bindvalue('cnameE',$cname);
                 $stmt->bindvalue('mobileE',$mobile);
                 $stmt->bindvalue('itemnameE',$itemname);
                 $stmt->bindvalue('quantityE',$quantity);
                 $stmt->bindvalue('rateE',$rate);
                 $stmt->bindvalue('totalE',$total);
                 $stmt->bindvalue('salenoE',$saleno);



                 $Execute = $stmt -> execute();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALE MASTER</title>
    <style>
        .saledetail{
            padding: 25px;
            display: flex;
            justify-content: center;
            border: 5px solid black;
        }
        </style>

</head>
<body>
<h2 align="center">Items Available For sale</h2>
<?php include 'ViewPurchase.php';?>



<!-- DELETE -->
<?php
$sql="SELECT * FROM saledetails WHERE saleid='$searchQuery' ";
$stmt=$connectDB->query($sql);
while($datarow=$stmt->fetch()){
    $saleid=$datarow['saleid'];
    $saleno=$datarow['saleno'];
    $itemname=$datarow['itemname'];
    $quant=$datarow['quantity'];
    $rate=$datarow['rate'];
    $total=$datarow['totalamt'];
    $time=$datarow['time'];
    $mobile=$datarow['mobile'];
}
?>
<h2 align="center"> Delete items From Cart</h2>
<div class="saledetail">
    
<form method="POST">
<br><br><label>Customer Name:  </label><input type="text" placeholder="customer_name" name="contname" value="<?php echo $saleid; ?>"><br><br>
    <label>Mobile No.:  </label><input type="text" placeholder="Mobile No." name="mobnum" value="<?php echo $mobile; ?>"><br><br>


    <label>Select Item: </label>   
<select name ="item_name" onchange="myFunction(this.value)">
  <option value="0">--Select--</option>
  <?php
  $sql=  " SELECT * FROM itemmaster";
    $stmt=$connectDB->query($sql);
  while($row = $stmt->fetch())
  {
  ?>
  <option value="<?=$row['itemname']?>"><?=$row['itemname']?></option>
  <?php } ?>

  </select><br><br>


  <label>Quantity:  </label><input type="text" id="quant" placeholder="Quantity" name="quantity"  value="<?php echo $quant; ?>"><br><br>
    <label>rate:  </label><input type="text" id="rte" placeholder="Rate" name="rate" onchange="calc()"  value="<?php echo $rate; ?>"><br><br>
    <label>Total:  </label><input type="text" id="total" placeholder="0.00" name="totalamt"  value="<?php echo $total; ?>"><br><br>
    <input type="Submit" name="deleteit" value="DELETE" name="sub">
</form>

  </div>


  <h2 align="center">Change items in Cart Here</h2>
<table width="1000" border="5" align="center">
<tr>
<th>Sale Id</th>
<th>Sale No</th>
<th>Item name</th>
<th>Quantity</th>
<th>Rate</th>
<th>Total Amount</th>
<th>Time Of sale</th>
<th>DELETE</th>
</tr>

<?php
$sqlx="SELECT * FROM saledetails";
$stmt=$connectDB->query($sqlx);
while($datarow=$stmt->fetch()){
    $saleid=$datarow['saleid'];
    $saleno=$datarow['saleno'];
    $itemname=$datarow['itemname'];
    $quant=$datarow['quantity'];
    $rate=$datarow['rate'];
    $total=$datarow['totalamt'];
    $time=$datarow['time'];


?>
<tr>
<td><?php echo $saleid; ?></td>
<td><?php echo $saleno; ?></td>
<td><?php echo $itemname; ?></td>
<td><?php echo $quant; ?></td>
<td><?php echo $rate; ?></td>
<td><?php echo $total; ?></td>
<td><?php echo $time; ?></td>
<td><a href="salesdelete.php?id=<?=$saleid;?>">delete</a></td>
</tr>


<?php } ?>




</table>


<script>
function calc(){
    var quant=document.getElementById('quant').value;
    var rate=document.getElementById('rte').value;
    var result=quant*rate;
    document.getElementById('total').value=result;
}
</script>



</body>
</html>
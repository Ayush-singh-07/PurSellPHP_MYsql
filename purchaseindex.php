<!-- INSERT INTO PDETAILS AND PMASTER  -->
<?php
//insert.php;
require_once("database.php");
if(isset($_POST["submit"]))
{

  $a5=$_POST["contact_id"];
  $a6=$_POST["subtotal"];
  echo $a5."&nbsp;";
 $connect =mysqli_connect("localhost","root","","usersdata");
 for($count = 0; $count <count($_POST["item_id"]); $count++)
 {
   $a1=$_POST["item_id"][$count];
   $a2=$_POST["item_quantity"][$count];
   $a3=$_POST["item_rate"][$count];
   $a4=$_POST["item_total"][$count];
  $purchaseno=rand(100,1000); 
  $q=mysqli_query($connect,"INSERT INTO purchasemaster(`contactid`,`purchaseno`,`itemid`,`totalamt`,`stampdate`,`statuss`) 
  VALUES ('$a5','$purchaseno','$a1','$a6',now(),1)
  ");
  $b=mysqli_insert_id($connect);
  $qq=mysqli_query($connect,"INSERT INTO purchasedetails(`purchasemsid`,`itemid`,`pquantity`,`rate`,`ptotal`,`status`) 
  VALUES ('$b','$a1','$a2','$a3','$a4',1)");
 }
 if(isset($q,$qq))
 {
  echo 'Purchase Successfull';
 }
}
?>
<!-- INSERT CLOSE -->



<!-- FETCH ITEM FROM ITEMMASTER -->
<?php
$connect = new PDO("mysql:host=localhost;dbname=usersdata", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM itemmaster";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["id"].'">'.$row["itemname"].'</option>';
 }
 return $output;
}
?>
<!-- FETCH CLOSE -->




<!DOCTYPE html>
<html>
 <head>
  <title>purchase</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .view{
      margin-top: 15px;
      margin-right: 145px;
    }
  </style>
 </head>
 <body>

<!-- FETCH CONTACT  -->

 <h4 align="center">Contacts</h4>
   <form method="POST" action="" id="">
  <br>
  <table border="5" width="1000" style="margin-left:12%;">
  <tr><th>Contact Details</th><th>
  <select  id="mySelect" name="contact_id" onchange="myFunction()" required>
  <option value="">contacts Available</option>
      <?php  $db=mysqli_connect("localhost","root","","usersdata"); 
      $q=mysqli_query($db,"SELECT * FROM contact");
      while ($r=mysqli_fetch_array($q)) {
      $ids=$_GET['id'];
      ?>  <option value="<?php echo $r['addresss'];echo '&nbsp;&nbsp;<br>'.$r['mobile']; ?>"><?php  echo $r['uname']?></option>
      <?php }?>
        </select>
            </th>
        </tr>
      <tr>
       <th><p>Address<br>Mobile number</p></th>
       <th><p id="demo"></p></th></tr>
  </table>
  <br>

 <!-- COTACT END -->



<!-- PURCHASE PANEL STARTS -->

<div class="container">
   <h4 align="center">Purchase Panel</h4>
   <br />
    <div class="table-repsonsive">
     <span id="error"></span>
     <table border="5" width="1000" height="40" class="" id="item_table">
      <tr>
       <th>Select item</th>
       <th>choose Quantity</th>
       <th>Rate</th>
       <th>total</th>
       <th><button type="button" name="add" class="btn  btn-sm add">Add</button></th>
        </tr>
       <tfoot>
        <tr>
        <td></td>
        <td></td>
        <td>SUB TOTAL</td>
        <td><input style="background-color:white;border:none;" type="text" class="grdtot" value="" name="subtotal" readonly/></td>
        </tr>
        </tfoot>  
       </table>
        <div align="center">
      <input  type="submit" name="submit" class="btn " value="purchase" />
     </div>
    </div>
   </form>
  </div>
  <!-- PURCHASE PANEL CLOSE -->
        <div class="view">
  <?php include 'ViewPurchase.php';?>
      </div>

 </body>
</html>






 <!-- js for onchnage -->
<script>
function myFunction() {
  const x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = x;
}
</script>
<!-- js onchnage close -->
<script>
$(document).ready(function(){ 
 $(document).on('click', '.add', function(){
  var newelem = '';
  newelem += '<tr>';
  newelem += '<td><select name="item_id[]" class="form-control item_name" required><option value="">Select item</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  newelem += '<td><input type="text" name="item_quantity[]" id="qty" min="1" max="10" class="form-control qty" /></td>';
  newelem += '<td><input type="text" name="item_rate[]" id="price" value="" class="form-control price" /></td>';
  newelem += '<td><input type="text" name="item_total[]" id="total" value="" readonly class="form-control total"/></td>';
  newelem += '<td><button type="button" name="remove" class="btn  btn-sm remove">Remove</span></button></td></tr>';
  // for total
  (function() {
    "use strict";

    $("table").on("change", "input", function() {
      var row = $(this).closest("tr");
      var qty = parseFloat(row.find(".qty").val());
      var price = parseFloat(row.find(".price").val());
      var total = qty * price;
      row.find(".total").val(isNaN(total) ? "" : total);
      // t
      if (!isNaN(total)) {
    row.find('.total').val(total.toFixed(2));
    var grandTotal = 0;
    $(".total").each(function () {
        var stval = parseFloat($(this).val());
        grandTotal += isNaN(stval) ? 0 : stval;
    });
    $('.grdtot').val(grandTotal.toFixed(2));
  }
      // t
    });
  })();
  // for total
  $('#item_table').append(newelem);
 });
  $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
  
 });});


</script>
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
  $qq=mysqli_query($connect,"INSERT INTO purchasedetails(`purchasemsid`,`itemid`,`quantity`,`rate`,`total`,`status`) 
  VALUES ('$b','$a1','$a2','$a3','$a4',1)");
 }
 if(isset($q,$qq))
 {
  echo 'Purchase Successfull';
 }
}
?>
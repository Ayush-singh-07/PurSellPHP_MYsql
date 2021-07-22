<?php  require_once("database.php")  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View and Update</title>
</head>
<body>


<table width="1000" border="5" align="center">
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last name</th>
<th>Date of birth</th>
<th>email</th>
<th>Contact</th>
<th>Address</th>
<th>Update</th>
<th>Delete</th>
</tr>

<?php

$sql="SELECT * FROM userrecords";
$stmt=$connectDB->query($sql);
while($datarow=$stmt->fetch()){
    $Id=$datarow['id'];
    $fname=$datarow['firstname'];
    $lname=$datarow['lastname'];
    $dob=$datarow['dob'];
    $email=$datarow['email'];
    $contact=$datarow['contact'];
    $address=$datarow['homeaddress'];

?>
    <tr>
    <td> <?php echo $Id; ?> </td>
    <td> <?php echo $fname; ?> </td>
    <td> <?php echo $lname; ?> </td>
    <td> <?php echo $dob; ?> </td>
    <td> <?php echo $email; ?> </td>
    <td> <?php echo $contact; ?> </td>
    <td> <?php echo $address; ?> </td>
    <td><a href="updatepage.php?id=<?php echo $Id; ?>">Edit</a></td>
    <td><a href="Deletepage.php?id=<?php echo $Id; ?>">Delete</a></td>
    </tr>

<?php } ?>

</table>

</body>
</html>
<?php

require_once("database.php");
$searchQuery=$_GET['id'];
if(isset($_POST['answer'])){

        $firstName=$_POST['FirstName'];
        $lastname=$_POST['lasName'];
        $dob=$_POST['Dob'];
        $contactno=$_POST['ContactNo'];
        $email=$_POST['email'];
        $address=$_POST['Address'];
        $picture=$_POST['picture'];

        
        $sql= "UPDATE userrecords SET firstname='$firstName', lastname='$lastname' ,dob='$dob',contact='$contactno',
                email='$email',homeaddress='$address'   WHERE id='$searchQuery'     ";
        $Execute = $connectDB -> query($sql);
         
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdatePage</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
<?php include 'navbarUpper.php';?>
<?php
$sql="SELECT * FROM userrecords WHERE id='$searchQuery' ";
$stmt=$connectDB->query($sql);
while($datarow=$stmt->fetch()){
    $Id=$datarow['id'];
    $fname=$datarow['firstname'];
    $lname=$datarow['lastname'];
    $dob=$datarow['dob'];
    $email=$datarow['email'];
    $contact=$datarow['contact'];
    $address=$datarow['homeaddress'];
}
?>

    
    <div class="RegisterForm">
    <h1>Update User</h1>
    <div class="innerform">
    <form action="updatepage.php?id=<?php echo $searchQuery; ?>" method="Post"> 
    <label>First Name: </label><input class="inputs" type="text" id="fname" name="FirstName" value="<?php echo $fname; ?>"><br><br>

    <label>last name: </label><input class="inputs" type="text" id="lname" name="lasName" value="<?php echo $lname; ?>"><br><br>

    <label>DOB: </label><input class="inputs" type="date" id="dob" name="Dob" value="<?php echo $dob;?>"><br><br>

    <label>Contact Number: </label><input class="inputs" type="text" id="Cnumber" name="ContactNo" value="<?php echo $contact; ?>"><br><br>

    <label>Email: </label><input class="inputs" type="email" id="Email" name="email" value="<?php echo $email; ?>"><br><br>

    <label>Address: </label><input class="inputs" type="text" id="address" name="Address" value="<?php echo $address; ?>"><br><br>
    <input type="file" accept="image/*" id="file-input" name="picture"><br><br>
    <input class="submit" type="Submit" name="answer" id="answer" value="Submit"/>
    </form>
    </div>
    </div>
    <?php include 'ViewAndUpdate.php';?>
    <?php include 'footer.php';?>

</body>
</html>
<?php

require_once("database.php");
if(isset($_POST['answer'])){
    if(!empty($_POST['FirstName']) && !empty($_POST['email'])){
        $firstName=$_POST['FirstName'];
        $lastname=$_POST['lasName'];
        $dob=$_POST['Dob'];
        $contactno=$_POST['ContactNo'];
        $email=$_POST['email'];
        $address=$_POST['Address'];
        $picture=$_POST['picture'];

        
        $sql= "INSERT INTO userrecords(firstname,lastname,dob,contact,email,homeaddress,picture) 
               VALUES(:fname,:lname,:fob,:contact,:emails,:addresss,:pictures)";
        $stmt=$connectDB -> prepare($sql);
        $stmt->bindvalue('fname',$firstName);
        $stmt->bindvalue('lname',$lastname);
        $stmt->bindvalue('fob',$dob);
        $stmt->bindvalue('contact',$contactno);
        $stmt->bindvalue('emails',$email);
        $stmt->bindvalue('addresss',$address);
        $stmt->bindvalue('pictures',$picture);
        
        $Execute = $stmt -> execute();
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
<?php include 'navbarUpper.php';?>
    <div class="RegisterForm">
        <h1>Register User</h1>
    <div class="innerform">
    <form method="Post"> 
    <label>First Name: </label><input class="inputs" type="text" id="fname" name="FirstName"><br><br>
    <label>last name: </label><input class="inputs" type="text" id="lname" name="lasName"><br><br>
    <label>DOB: </label><input class="inputs" type="date" id="dob" name="Dob"><br><br>
    <label>Contact Number: </label><input class="inputs" type="text" id="Cnumber" name="ContactNo"><br><br>
    <label>Email: </label><input class="inputs" type="email" id="Email" name="email"><br><br>
    <label>Address: </label><input class="inputs" type="text" id="address" name="Address"><br><br>
    <input type="file" accept="image/*" id="file-input" name="picture"><br><br>
    <input class="submit" type="Submit" name="answer" id="answer" value="Submit"/>
    </form>
    </div>
    </div>
    <?php include 'ViewAndUpdate.php';?>
    <?php include 'footer.php';?>
</body>
</html>
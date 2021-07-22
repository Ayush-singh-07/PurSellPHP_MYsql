<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="calculatorstyle.css">
</head>
<body>

<?php include 'navbarUpper.php';?>

<div class="calculator">
<form method="Post">
<label class="operation">Add </label><input class="radios" type="radio" name="radio" id="add" value="addit" checked="true">
<label class="operation">Subtract </label><input class="radios" type="radio" name="radio" id="sub" value="sub">
<label class="operation">Multiply </label><input class="radios" type="radio" name="radio" id="mult" value="mult">
<label class="operation">Divide </label><input class="radios" type="radio" name="radio" id="divs" value="divs">
    
    <div class="inputs">
    <label>First Number: </label><input class="inputs" type="text" id="fnumber" name="fnumber"><br><br>
    <label>Second Number: </label><input class="inputs" type="text" id="Snumber" name="Snumber">
</div>
<input class="submit" type="Submit" name="answer" id="answer" value="Submit"/>
</form>
</div>

<div class="php">
<?php

// $fnumber=$_POST['fnumber'];
// $Snumber=$_POST['Snumber'];


if(isset($_POST['answer'])){
    if($_POST['radio'] == "addit"){$_POST['Snumber'];
        echo "<h2> Addition is: </h2>"."<h2>".$_POST['fnumber']+$_POST['Snumber']."</h2>";
    }
    else if($_POST['radio'] == "sub"){
        echo "<h2> Subtraction is: </h2>"."<h2>".$_POST['fnumber']-$_POST['Snumber']."</h2>";
    }
    else if($_POST['radio'] == "mult"){
        echo "<h2> Multiplication is: </h2>" ."<h2>".$_POST['fnumber']*$_POST['Snumber']."</h2>";
    }else{
        echo "<h2> Divide is: </h2>" . "<h2>".$_POST['fnumber']/$_POST['Snumber']."</h2>";
    }$_POST['Snumber'];


}

?>
</div>

<div class="footer">
<?php include 'footer.php';?>
</div>



</body>
</html>
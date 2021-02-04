
<?php


$host="localhost";
$username="root";
$password="root";
$databasename="phpegpract";

$con=mysqli_connect($host,$username,$password,$databasename);

//Register
if(isset($_POST["regt"])!=null){
    $usname=$_POST["usnm"];
    $passd=$_POST["pasd"];
    $cy=$_POST["cty"];
    header("Loction:login.php");
}
$sql="insert into student(uersname,password,city) values('$usname','$passd','$cy')";

$result=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
    <label for="username">Username</label>
    <input type="text" name="usnm" id="usnm"></br>
    <label for="password">Password</label>
    <input type="password" name="pasd" id="pasd"></br>
    <label for="city">City</label>
    <input type="text" name="cty" id="cty"></br>
    <button type="submit" name="regt" id="regt">Register</button>
    </form>
</body>
</html>
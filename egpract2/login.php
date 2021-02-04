<?php

session_start();

$errmessage="";
$host = "localhost";
$username = "root";
$password = "root";
$database = "phpegpract";

$con = mysqli_connect($host,$username,$password,$database);

if(isset($_POST["btn"]) != null){
    $errmessage="";
    $user = $_POST["txtuname"];
    $pass = $_POST["txtpassword"];

    $sql = "select * from student where username='$user' && password='$pass' ";

    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_array($result)){
        $_SESSION["user"]=$row["username"];
        $_SESSION["pass"]=$row["password"];
        header("Location : add.php");
    }
    $errmessage="Invalid Credentials";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <label for="username">Username</label>
    <input type="text" name="txtuname" id="txtuname"></br>
    <label for="password">Password</label>
    <input type="password" name="txtpassword" id="txtpassword"></br>
    <input type="submit" value="Login" name="btn" id="btn">
    <div style="color:red;"><?php echo $errmessage ?></div>
    <input type="button"onclick="location.href='register.php'" value="Register" name="reg" id="reg">
    
    </form>
</body>
</html>
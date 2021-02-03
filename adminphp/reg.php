<?php include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>    
    <script src="main.js"></script>
</head>
<body>
<center>
<div class="container mt-4">
<form action="" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>first Name</td>
        <td>
        <input type="text" name="fname"  placeholder="first name">
        </td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td>
        <input type="text" name="lname"  placeholder="Last name">
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
        <input type="text" name="email"  placeholder="email">
        </td>
    </tr>
    <tr>
        <td>Profile</td>
        <td>
            <input type="file" name="profile" class="form-control">
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
        <input type="password" name="password"  placeholder="Password">
        </td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="submit"></td>
    </tr>
</table>
</form>
</div>
</center>
    
</body>
</html>
<?php

if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST["password"];

    $file_type=$_FILES['profile']['type'];
        $path="./upload/";
       
        if(is_dir($path))
        {
            //mkdir($path,0777,true);
            $img=$_FILES['profile']['name'];
            $type=$_FILES['profile']['type'];
            $tempname=$_FILES['profile']['tmp_name'];
            move_uploaded_file($tempname,"$path/$img");
            // echo "type of file : $type";
        }
        else
        {
            die("failed to upload");
        }
    
    
    $query="INSERT INTO `tbl_admin` (`id`, `fname`, `lname`, `email`, `profile`, `password`) VALUES (NULL, '$fname', '$lname', '$email', '$img', '$password');";
    $run=mysqli_query($conn,$query);
    if(!$run)
    {
        ?>
        <script>alert('error in insertion');</script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('insertion done');
        header('location:index.php');
        </script>
        <?php
    }
}




?>
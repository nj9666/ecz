<?php
    session_start();
    if($_SESSION["id"]==null){
        header("Location:login.php");
    }
    if(isset($_POST["btnlogout"])!=null){
        session_destroy();
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <?php 
        if($_SESSION["user"]!=null){
            echo "Hello".$_SESSION["user"];
        }
    ?>

    <form action="addAction.php" method="post" enctype="multipart/form-data">
    <label for="pname">Name</label>
    <input type="text" name="pname" id="pname"></br>

    <label for="cat">Category</label>
    <input type="text" name="cat" id="cat"></br>

    <label for="imag">Image</label>
    <input type="file" name="imag" id="imag"></br>

    <button type="submit" name="btnadd" id="btnadd">Add</button>
    </form>

    <form method="get" enctype="multipart/form-data">
    <table border="1">
    <tr>
    <td>Product Name</td>
    <td>Category</td>
    <td>Image</td>
    </tr>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "phpegpract";
    
    //Connection
    $con = mysqli_connect($host,$username,$password,$database);
    $sql="select * from product";

    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_array($result))
    { ?>
        <tr>
            <td><?php  echo $row["pname"] ?></td>
            <td><?php  echo $row["category"] ?></td>
            <td><img src="<?php  echo $row['image'] ?>"  width="100px" height="100px"></td>
    </tr>
    <?php }

    ?>
    </table>
    </form>
    <form method="post">
    <button type="submit" name="btnlogout" id="btnlogout">Logout</button>
    </form>
</body>
</html>
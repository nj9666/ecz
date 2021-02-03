<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<h1>view Data</h1>
    <div class="container">
    <table class="table table-striped table-hover table-bordered">
    <tr>
        <th>id</th>
        <th>Firstname</th>
        <th>Last name</th>
        <th>email</th>
        <th>profile</th>
        <th>password</th>
        <th>Edit</th>
    </tr>
    
    <?php
        include 'connect.php';
        $email=$_SESSION["email"];
        $query="select * from tbl_admin where email='$email'";
        $run=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($run))
        {
            ?>
                <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><img src="./upload/<?php echo $row[4]; ?>" class="img-fluid" alt=""></td>
                <td><?php echo $row[5]; ?></td>
                <td><a href="./editprofile.php?id=<?php echo $row['0']; ?>">Edit</a></td>
                </tr><?php
        }
    ?>

    </table>
    </div>
</body>
</html>
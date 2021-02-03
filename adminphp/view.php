<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello</h1>
    <?php echo $_SESSION["email"] ?>
    <a href="./viewprofile.php">View Profile</a>

    <a href="./editprofile.php">Edit Profile</a>

    <a href="./logout.php">Logout</a>

</body>
</html>
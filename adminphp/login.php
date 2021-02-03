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
<div class="container d-flex justify-content-center mt-4  p-4 w-50 mt-4">
        <form action="" method="POST">
        <table>
            <thead>
           <tr>
            <td> <h1>E-com System</h1></td>
           </tr>
            </thead>
           
            <tr>
                <td><input type="text"  id="" name="email" placeholder="email" require="require" class="form-control  p-2"></td>  
            </tr>
            <tr>
                <td><input type="password"   id="" name="password" placeholder="password" require="require" class="form-control  p-2"></td>
            </tr>
           
            <tr>
                <td><input type="submit" name="btnsub" value="Login" id="btn"  class="btn btn-success w-100"></td>
            </tr>
           
        </table>
        
        </form>
    </div>
	<?php
	include 'connect.php';
    if(isset($_POST['btnsub']))
    
    {
        $email=$_POST['email'];
        $ps=$_POST['password'];
        $_SESSION['email']=$email;
        


          $sql=mysqli_query($conn,"select email from tbl_admin where email='$email' and password='$ps' ");
          if(mysqli_num_rows($sql)){
          
            header('Location:view.php');
          }else{
            echo "username or password is wrong";
          }
	}
	?>		
</body>
</html>
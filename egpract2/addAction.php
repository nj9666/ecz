<?php

$host = "localhost";
$username = "root";
$password = "root";
$database = "phpegpract";

//Connection
$con = mysqli_connect($host,$username,$password,$database);

if(isset($_POST["btnadd"]) != null){
    $prname=$_POST["pname"];
    $pcat=$_POST["cat"];
    $fil="images/".$_FILES["imag"]["name"];   
    

if(move_uploaded_file($_FILES["imag"]["tmp_name"],$fil)){
    echo "Uploading Done.";
}

$sql = "insert into product(pname,category,image) values('$prname','$pcat','$fil')";

$result=mysqli_query($con,$sql);

}
?>
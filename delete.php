<?php
include 'connection.php';//connect to database
$id=$_GET['deleteid'];//get the id from the url

$sql="Delete from  `mycontactlist` where Id=$id";
$result=mysqli_query($con,$sql);
if($result){
    header('location:show.php');
}else{
    die(mysqli_error(($conn)));
}


?>
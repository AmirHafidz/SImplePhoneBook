<?php
$con = mysqli_connect('localhost','root','','myphonebook');
// if($con){
//     echo "Connection Succesfully";
// }
// else{
//     die(mysqli_error("Error"+$con));
// }
if(!$con){
    die(mysqli_error("Error"+$con));
}

?>
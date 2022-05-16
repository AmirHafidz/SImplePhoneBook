<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="Select * from `mycontactlist` where Id =$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$Image=$row['Image'];
$FirstName = $row['FirstName'];
$LastName = $row['LastName'];
$Email = $row['Email'];
$Mobile = $row['Mobile'];

if(isset($_POST['update'])){

$FirstName = $_POST['FirstName'];
$LastName =$_POST['LastName'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];


$sql="Update `mycontactlist` set FirstName='$FirstName',LastName='$LastName',Email='$Email',Mobile='$Mobile' where Id='$id'";
$result=mysqli_query($con,$sql);
if($result){
    header('location:show.php');
}else{
    die(mysqli_error($con));
}
}

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
    <!-- <link rel="stylesheet" href="viewnew.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<!-- image source=https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg -->

</head>
<body style="background-color: #28223F;">
    <form method="POST">
    <div class="container rounded  mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="<?php echo $row['Image'] ?>">
                    <span class="font-weight-bold" style="color: white"><?php echo $row['FirstName']." ".$row['LastName'] ?></span>
                    <span class="text-black-50" style="color: white"><?php echo $row['Email'] ?></span>

                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right" style="color: white">Edit Contact</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels" style="color: white">First Name</label><input type="text" class="form-control"  value="<?php echo $row['FirstName'] ?>" name="FirstName"></div>
                        <div class="col-md-6"><label class="labels" style="color: white">Last Name</label><input type="text" class="form-control" value="<?php echo $row['LastName'] ?>"    name="LastName" ></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels" style="color: white">Email Address</label><input type="text" class="form-control" placeholder="enter email address" value="<?php echo $row['Email'] ?>" name="Email"></div>
                        <div class="col-md-12"><label class="labels " style="color: white" >Mobile Number</label><input type="text" class="form-control" placeholder="enter mobile number" value="<?php echo $row['Mobile'] ?>" name="Mobile"></div>

                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" name="update">Save</button>
                        <button class="btn btn-primary profile-button" type="button" name="cancel"><a style="color:white; text-decoration:none"href="<?= $previous ?>">Cancel</a></button>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </form>
    
</body>
</html>
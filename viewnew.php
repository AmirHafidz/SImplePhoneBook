<?php
include 'connection.php';
$mydata = $_GET['data'];
$sql="Select * from `mycontactlist` where Id='$mydata'";
$result=mysqli_query($con,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
};

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
    <title>View Contact</title>
    <link rel="stylesheet" href="viewnew.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 style="color:white">View Contact</h1>
    <div class="card-container">

        <img class="round" src="<?php echo $row['Image']  ?>" alt="user" style="width:200px; height:auto;"/>
        <h3><?php echo $row['FirstName']." ".$row['LastName'] ?></h3>
        <h6><?php echo $row['Email'] ?></h6>
        <p><?php echo $row['Mobile'] ?></p>
        <div class="buttons">
            <button class="primary">
                <a href="mailto:abc@example.com" style="text-decoration:none;color:white;">Email</a>
                <i class="fa-solid fa-envelope"></i>
                
            </button>
            <button class="primary ghost">
            <a   style="text-decoration:none;color:white;"href="https://wa.me/<?php echo $row['Mobile'] ?>" target="_blank"><?php echo $row['Mobile'] ?></a>

            <i class="fa-brands fa-whatsapp"></i>
            </button>
        </div>
        <div style="margin:15px">
        <i class="fa-solid fa-arrow-left"></i>
            <a href="<?= $previous ?>" style="text-decoration:none; color:white">Back</a>

        </div>
    </div>
    
    <footer>
        <p>
            Created by
            <a target="_blank" href="https://github.com/AmirHafidz">Amir Hafidz</a>

        </p>
    </footer>
</body>
</html>
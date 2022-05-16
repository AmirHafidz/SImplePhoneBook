<?php
include 'connection.php';
require_once('./operation.php');
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
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h1 class="text-center my-3">Add Contact</h1>
    <div class="container d-flex justify-content-center">
        <form action="show.php" class="w-50" method="POST" enctype="multipart/form-data">
            <?php

                inputFields("First Name","FirstName","","text");
                inputFields("Last Name","LastName","","text");
                inputFields("Email Address","Email","","email");
                inputFields("Mobile Number","Mobile","","text");
                inputFields("","File","","file");
            ?>
            <button class="btn btn-dark" type="submit" name="add">Add</button>
            <button class="btn btn-primary"><a style="text-decoration:none;color:white;" href="<?= $previous ?>">Back</a></button>
        </form>
    </div>
</body>
</html>
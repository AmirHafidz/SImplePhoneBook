<?php
include 'connection.php';

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
    <title>Search Contact</title>
    <!-- <link rel="stylesheet" href="zari.css"> -->
    <link rel="stylesheet" href="search.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        img{
            width: 100px;
        }
    </style>
</head>
<body>
<div class="s009">
      <form method="GET" action="searchcontact.php">
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
              <input id="search" type="text" placeholder="Type Keywords" name="search"/>
            </div>
          </div>
          <div class="advance-search">            
            <div class="row third">
              <div class="input-field">
                <div class="group-btn">
                    <button class="btn-search" name="submit"><i class="fa-solid fa-arrow-left"></i>
            <a href="<?= $previous ?>" style="text-decoration:none; color:white">BACK</a></button>
                  <!-- <button class="btn-delete" id="delete">RESET</button> -->
                  <button class="btn-search" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i>SEARCH</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>



     
       

</body>
</html>
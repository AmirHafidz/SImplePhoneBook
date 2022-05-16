<?php
    include 'connection.php';
    $sql="Select * from `mycontactlist`";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    if(isset($_POST['add'])){
        $FirstName=$_POST['FirstName'];
        $LastName=$_POST['LastName'];
        $Email=$_POST['Email'];
        $Mobile=$_POST['Mobile'];
        $Image=$_FILES['File'];
    
        $ImageName=$Image['name'];
        $ImageError=$Image['error'];
        $ImageTemp=$Image['tmp_name'];
        $fileName_separate=explode('.',$ImageName);
        $FileExtension=strtolower($fileName_separate[1]);

        $extension=array('jpeg','jpg','png');
        if(in_array($FileExtension,$extension)){
            $UploadImage='images/'.$ImageName;
            move_uploaded_file($ImageTemp,$UploadImage);
            $sql="Insert into `mycontactlist` (Image,FirstName,LastName,Email,Mobile) values('$UploadImage','$FirstName','$LastName',
            '$Email','$Mobile')";
            $result=mysqli_query($con,$sql);
            if($result){
    
            }
            else{
                die(mysqli_error($con));
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Contact</title>
    <link rel="stylesheet" href="show.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container" style="background-color: #28223F;">
        <h3 style="color: white;">List of Contacts</h3>
        <div class="thetable thetable-btn" style="background-color: #231E39;">
            <div class="kontena">
                <button class="button-31"><a href="index.php"><i class="fa-solid fa-angle-left"></i> Back</a></button>
                <button class="button-31" ><a href="addcontact.php"><i class="fa-solid fa-user-plus"></i> Add Contact</a></button>

            </div>
            <!-- <div class="kontena">
                <form method="POST">
                    <input type="search" placeholder="search contact" name="search">
                    <button type="submit" name="submit" class="button-31"><i class="fa-solid fa-magnifying-glass"></i></button>                   
                </form>
            </div> -->
            <div class="wrap">
        <form method="POST">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="What are you looking for?" name="search">
                <button type="submit" class="searchButton" name="submit">
                  <i class="fa fa-search"></i>
               </button>
             </div>
        </form>
     </div>




        </div>
        <div class="thetable" style="background-color: #231E39;">
           <table>
                <tr>
                    <th style="background-color: #656174">Id</th>
                    <th style="background-color: #656174;">Profile</th>
                    <th style="background-color: #656174;">First Name</th>
                    <th style="background-color: #656174;">Last Name</th>
                    <th style="background-color: #656174;">Email</th>
                    <th style="background-color: #656174;">Mobile</th>
                    <th class="td-operation" style="background-color: #656174;">Operations</th>
                </tr>
            <?php
                $sql="Select * from `mycontactlist`";
                $result = mysqli_query($con,$sql);
                $num= mysqli_num_rows($result);
                $numPages=3;
                $TotalPages=ceil($num/$numPages);

                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }else{
                    $page=1;
                }

                $startinglimit=($page-1)*$numPages;
                $sql="Select * from `mycontactlist` LIMIT ".$startinglimit.','.$numPages;
                $result=mysqli_query($con,$sql);


                if(!isset($_POST['submit'])){
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<tr>
                        <td>'.$row['Id'].'</td>
                        <td><img src="'.$row['Image'].'"</td>
                        <td>'.$row['FirstName'].'</td>
                        <td>'.$row['LastName'].'</td>
                        <td>'.$row['Email'].'</td>
                        <td>'.$row['Mobile'].'</td>
                        <td class="td-operation">
                        <button class="button-28 button-view" role="button"><a href="viewnew.php?data='.$row['Id'].'"> <i class="fa-regular fa-eye"></i></a></button>
                        <button class="button-28 button-update" role="button"><a href="updatenew.php?updateid='.$row['Id'].'"> <i class="fa-regular fa-pen-to-square"></i></a></button>
                        <button class="button-28 button-delete" role="button"><a href="deleteid.php?deleteid='.$row['Id'].'"> <i class="fa-regular fa-trash-can"></i></a></button>
                        </td>
                    </tr>';
                    }
                    for($button=1;$button<=$TotalPages;$button++){
                        echo '<button><a href="show.php?page='.$button.'">'.$button.'</a></button>';
                    }
               }
                else{
                    $search=$_POST['search'];
                    $sql="Select * from `mycontactlist` where ID like '%$search%' or FirstName like '%$search%'
                    or LastName like '%$search%' or Email like '%$search%' or Mobile like '%$search%'";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$row['Id'].'</td>
                            <td><img src="'.$row['Image'].'"</td>
                            <td>'.$row['FirstName'].'</td>
                            <td>'.$row['LastName'].'</td>
                            <td>'.$row['Email'].'</td>
                            <td>'.$row['Mobile'].'</td>
                            <td class="td-operation">
                            <button class="button-28 button-view" role="button"><a href="viewnew.php?data='.$row['Id'].'"> <i class="fa-regular fa-eye"></i></a></button>
                            <button class="button-28 button-update" role="button><a href="updatenew.php?updateid='.$row['Id'].'"> <i class="fa-regular fa-pen-to-square"></i></a></button>
                            <button class="button-28 button-delete" role="button"><a href="deleteid.php?deleteid='.$row['Id'].'"> <i class="fa-regular fa-trash-can"></i></a></button>
                            </td>
                        </tr>';
                        }
                        echo '<button class="button-31"><a href="show.php">Show All</a></button>';
                    }
                    
                }
            ?>
            </table>
        </div>

        <!-- <div>
            <?php for($button=1;$button<=$TotalPages;$button++){
                echo '<div class="thetable-pagi"><a href="show.php?page='.$button.'>'.$button.'</a></div>';
            } ?>
        </div> -->

    <footer>
        <p>
            Created by
            <a target="_blank" href="https://github.com/AmirHafidz">Amir Hafidz</a>
        </p>
    </footer>

</body>
</html>
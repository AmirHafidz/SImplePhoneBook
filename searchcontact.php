<?php
    include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Search</title>
    <link rel="stylesheet" href="searchcontact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        img{
            width: 100px;
        }
    </style>
</head>
<body style="background-color: #28223F;">
        <div class="container" style="background-color: #28223F;">
            <h3 style="color: white;">List of Contacts</h3>
                        <div class="thetable thetable-btn" style="background-color: #231E39;">
                            <div class="kontena">
                                <button class="button-31"><a href="index.php"><i class="fa-solid fa-angle-left"></i> Back</a></button>
                                <button class="button-31" ><a href="addcontact.php"><i class="fa-solid fa-user-plus"></i> Add Contact</a></button>

                            </div>

                        </div>
        <div class="thetable">
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
                
                $mydata=$_GET['search'];
                $startinglimit=($page-1)*$numPages;
                $sql="Select * from `mycontactlist` where Id like '%$mydata%' or FirstName like '%$mydata%' or LastName like '%$mydata%'";
                $result=mysqli_query($con,$sql);


                // if(!isset($_POST['submit'])){
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

            //    }
                // else{
                //     $search=$_POST['search'];
                //     $sql="Select * from `mycontactlist` where ID like '%$search%' or FirstName like '%$search%'
                //     or LastName like '%$search%' or Email like '%$search%' or Mobile like '%$search%'";
                //     $result=mysqli_query($con,$sql);
                //     if($result){
                //         while($row=mysqli_fetch_assoc($result)){
                //             echo '<tr>
                //             <td>'.$row['Id'].'</td>
                //             <td><img src="'.$row['Image'].'"</td>
                //             <td>'.$row['FirstName'].'</td>
                //             <td>'.$row['LastName'].'</td>
                //             <td>'.$row['Email'].'</td>
                //             <td>'.$row['Mobile'].'</td>
                //             <td class="td-operation">
                //             <button class="button-28 button-view" role="button"><a href="viewnew.php?data='.$row['Id'].'"> <i class="fa-regular fa-eye"></i></a></button>
                //             <button class="button-28 button-update" role="button><a href="updatenew.php?updateid='.$row['Id'].'"> <i class="fa-regular fa-pen-to-square"></i></a></button>
                //             <button class="button-28 button-delete" role="button"><a href="deleteid.php?deleteid='.$row['Id'].'"> <i class="fa-regular fa-trash-can"></i></a></button>
                //             </td>
                //         </tr>';
                //         }
                //         echo '<button class="button-31"><a href="show.php">Show All</a></button>';
                //     }
                    
                // }
            ?>
            </table>
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
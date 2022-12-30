<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient view Details</title>
    <style>
        /* .pic{
            float: left;
        } */
        .pic2 {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%
        }
        </style>
</head>

<body>
    <?php include("../header.php");
    include("../conn.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-40px;">

                    <?php include("sidenav.php"); ?>


                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">View patient Diet Chart</h5>
                    <img src="../diet.jpg" class="pic2">
                </div>
                <!-- <div class="col-md-10">
                    <h5 class="text-center my-3">View patient Details</h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $patient=$_SESSION['patient'];
                        $query = "SELECT*FROM patient WHERE id='$id'";
                        $res = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($res);
                    }

                    ?> -->
                <!-- //     <div class="col-md-12">
                //         <div class="row">
                //             <div class="col-md-3"></div>
                //             <div class="col-md-6">
                //                 <?php
                //                 echo 
                //                 '<img src="./img/"'.$row['profile'].'" class="col-md-10 my-2" style="height: 200px;">';?>
                //                 <table class="table table-bordered">
                //                     <tr>
                //                         <th colspan="3" class="text-center my-2">My Detailes</th>
                //                     </tr>
                //                     <tr>
                //                         <td>Firstname</td>
                //                         <td><?php echo $row['firstname'];?></td>
                //                     </tr>
                //                     <tr>
                //                         <td>Surname</td>
                //                         <td><?php echo $row['surname'];?></td>
                //                     </tr>
                //                     <tr>
                //                         <td>Username</td>
                //                         <td><?php echo $row['username'];?></td>
                //                     </tr>
                //                     <tr>
                //                         <td>Email</td>
                //                         <td><?php echo $row['email'];?></td>
                //                     </tr>
                //                     <tr>
                //                         <td>Phone Number</td>
                //                         <td><?php echo $row['phone'];?></td>
                //                     </tr>
                //                     <tr>
                //                         <td>Gender</td>
                //                         <td><?php echo $row['gender'];?></td>
                //                     </tr>
                //                     <tr>
                //                         <td>Country</td>
                //                         <td><?php echo $row['country'];?></td>
                //                     </tr>

                //                 </table>
                //             </div>

                //         </div>
                //     </div>
                // </div> -->
            </div>
        </div>
    </div>
</body>

</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>

<body>
    <?php include("../header.php");
    include("../conn.php");
    ?>
    <div class="container-fluid" style="margin-left:-40px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Total Patients</h5>
                    <?php
                    $patient=$_SESSION['patient'];
                    $query = "SELECT * FROM patient ";
                    $res = mysqli_query($conn, $query);
                    $output="";
                    $output .='
                    <table class="table table-bordered">
                    <tr>
                        
                        <td>ID</td>
                        <td>Firstname</td>
                        <td>Surname</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Gender</td>
                        <td>Country</td>
                        <td>Date</td>
                        <td>Action</td>
                      </tr>
                      
                  
                    
                    ';
                    if(mysqli_num_rows($res)<1){
                        $output .="
                         <tr>
                         <td class='text-center' colspan='10'>No patient yet</td>
                         </tr>
                        ";
                    }
                    while($row=mysqli_fetch_array($res)){
                        $output .="
                           <tr>
                           <td>".$row['id']."</td>
                           <td>".$row['firstname']."</td>
                           <td>".$row['surname']."</td>
                           <td>".$row['username']."</td>
                           <td>".$row['email']."</td>
                           <td>".$row['phone']."</td>
                           <td>".$row['gender']."</td>
                           <td>".$row['country']."</td>
                           <td>".$row['date']."</td>
                           <td>
                             <a href='view.php?".$row['id']."'><button class='btn btn-info'>View</a>
                           </td>
                           
                        ";
                    }
                    $output .="
                      </tr>
                      </table>
                    ";
                    echo $output;

    ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>
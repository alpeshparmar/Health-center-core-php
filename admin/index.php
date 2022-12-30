<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script type=text/javascript src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"> -->
    <title>Admin index</title>
</head>

<body>
    <?php include("../header.php");
          include("../conn.php")
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-40px;">

                    <?php include("sidenav.php"); ?>


                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height:150px; border-radius: 25px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                            $ad=mysqli_query($conn,"SELECT*FROM admin ");
                                            $num=mysqli_num_rows($ad)  
                                            ?>
                                            <h5 class="my-2 text-white"><?php echo $num; ?></h5>
                                            <h5>Total</h5>
                                            <h5>Admin</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="admin.php"><i class="fa-solid fa-address-book fa-3x my-2" style="color: black;"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3 bg-info mx-2" style="height:150px; border-radius: 25px;"><div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white">0</h5>
                                            <h5>Total</h5>
                                            <h5>Doctors</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa fa-user-md fa-3x my-2"></i>
                                        </div>
                                    </div>
                                </div> </div>
                            <div class="col-md-3 bg-warning mx-2" style="height:150px; border-radius: 25px;"> <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                        <?php
                                            $ad=mysqli_query($conn,"SELECT*FROM patient ");
                                            $n1=mysqli_num_rows($ad)  
                                            ?>
                                            <h5 class="my-2 text-white"><?php echo $n1; ?></h5>
                                            <!-- <h5 class="my-2 text-white">0</h5> -->
                                            <h5>Total</h5>
                                            <h5>Patients</h5>
                                        </div>
                                        <div class="col-md-3">
                                        <a href="./patient.php"><i class="fa fa-procedures fa-3x my-2"></i></a>
                                        </div>
                                    </div>
                                </div></div>
                            <div class="col-md-3 bg-danger mx-2 my-4" style="height:150px; border-radius: 25px;"><div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white">0</h5>
                                            <h5>Total</h5>
                                            <h5>Reports</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa fa-medkit fa-3x my-2"></i>
                                        </div>
                                    </div>
                                </div> </div>

                            <!-- <div class="col-md-3 bg-warning mx-2 my-4" style="height:150px; border-radius: 25px;"><div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white">0</h5>
                                            <h5>Total</h5>
                                            <h5>JOB Reaquest</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa-solid fa-address-book fa-3x my-2"></i>
                                        </div>
                                    </div>
                                </div> </div> -->
                            <div class="col-md-3 bg-success mx-2 my-4" style="height:150px; border-radius: 25px;"> <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white">0</h5>
                                            <h5>Total</h5>
                                            <h5>Account</h5>
                                        </div>
                                        <div class="col-md-3">
                                        <!-- <i class="fa-solid fa-album-collection-circle-plus fa-3x my-2"></i> -->
                                            <i class="fa-solid fa-address-book fa-3x my-2"></i>
                                        </div>
                                    </div>
                                </div></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
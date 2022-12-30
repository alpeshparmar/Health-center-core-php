<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dasboard</title>
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

                <div class="col-md-12 container-fluid ">
                        <div class="row" style="float:right">
                            <div class="col-md-3"></div>
                            <div class="col-md-3 jumbotron bg-info my-5 " style="height: 300px; border-radius: 25px; width: 600px;">
                                <h5 class="text-center">Send a Report</h5>
                                <form method="post">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" autocomplete="off" placeholder="enter title of report">
                                    <label>Message</label>
                                    <input type="text" name="msg" class="form-control" autocomplete="off" placeholder="enter message">
                                    <input type="submit" name="send" value="Send Report" class="btn btn-success container-fluid my-3">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                    <h4 class="my-2">Patient Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-3 bg-info my-2" style="height:150px; border-radius: 25px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-black my-1">My profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="../patient/profile.php"><i class="fa fa-user circle fa-3x my-4 " style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 bg-warning  my-2" style="height:150px; border-radius: 25px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-black my-2">Book Appointment</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href=""><i class="fa fa-calendar fa-3x my-4 " style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 bg-success my-2" style="height:150px; border-radius: 25px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-black my-2">Get diet chart</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="../admin/getdiet.html"><i class="fas fa-bread-slice fa-3x my-4 " style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                


                            </div>

                        </div>
                    </div>
                    <?php
                    if (isset($_POST['send'])) {
                        $title = $_POST['title'];
                        $msg = $_POST['msg'];
                        if (empty($title)) {
                        } elseif (empty($msg)) {
                        } else {
                            $user = $_SESSION['patient'];
                            $query = "INSERT INTO report(title,message,username,data_send) VALUES('$title','$msg','$user',NOW())";

                            $res = mysqli_query($conn, $query);
                            if ($res) {
                                echo "<script>alert('You have sent Your Report')</script>";
                            } else {
                                echo "<script>alert('failed')</script>";
                            }
                        }
                    }
                    ?>
                    <!-- <div class="col-md-12 container-fluid ">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3 jumbotron bg-info my-5 " style="height: 500px; border-radius: 25px; width: 600px;">
                                <h5 class="text-center">Send a Report</h5>
                                <form method="post">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" autocomplete="off" placeholder="enter title of report">
                                    <label>Message</label>
                                    <input type="text" name="msg" class="form-control" autocomplete="off" placeholder="enter message">
                                    <input type="submit" name="send" value="Send Report" class="btn btn-success container-fluid my-3">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>

    </div>
</body>

</html>
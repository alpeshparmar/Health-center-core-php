<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
</head>

<body>
    <?php include("../header.php");
    include("../conn.php")
    ?>
    <div class="container-fluid" style="margin-left:-40px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php include("sidenav.php");
                    $patient = $_SESSION['patient'];
                    $query = "SELECT * FROM patient WHERE username='$patient'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);

                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                if (isset($_POST['upload'])) {
                                    $img = $_FILES['img']['name'];
                                    if (empty($img)) {
                                    } else {
                                        $query = "UPDATE patient SET profile='$img' WHERE username='$patient'";
                                        $res = mysqli_query($conn, $query);

                                        if ($res) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/" . $img);
                                        } else {
                                            print_r('no uploaded image');
                                        }
                                    }
                                }
                                ?>

                                <h5 class="text-center">My Profile</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <?php echo "<img src='http://localhost/Health-Center/admin/img/" . $row['profile'] . "' class='col-md-12' style='height: 200px; width:200px'>"; ?> -->

                                    <?php echo "<img src='" . $getUrl . '/admin/img/' . $row['profile'] . "' class='col-md-12' style='height: 200px; width:200px'>"; ?>


                                    <!-- <?php echo "<img src='img/$profile' class='col-md-12' style='height: 200px; width:200px'>";
                                            ?> -->
                                    <input type="file" name="img" class="form-control my-2">
                                    <input type="submit" value="update profile" class="btn btn-info " name="upload">
                                </form>
                                <table class="table table-bordered my-3">
                                    <tr>
                                        <th colspan="2" class="text-center my-3">My Detailes</th>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country']; ?></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-6">
                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                    if (isset($_POST['update'])) {
                                        $uname = $_POST['uname'];
                                        if (empty($uname)) {
                                        } else {
                                            $query = "UPDATE patient SET username='$uname' WHERE username='$patient'";
                                            $res = mysqli_query($conn, $query);
                                            if ($res) {
                                                $_SESSION['patient'] = $uname;
                                            }
                                        }
                                    }
                                    ?>
                                    <h5 class="text-center">Enter Username</h5>


                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="enter username">
                                    <br>
                                    <input type="submit" value="Update username" name="update" class="btn btn-success my-2">
                                </form>
                                <img src="../diet.jpg" class='my-5'>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
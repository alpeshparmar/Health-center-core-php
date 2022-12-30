<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin profile</title>
</head>

<body>
    <?php include("../header.php");
    include("../conn.php");



    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username!='$ad' ";
    $res = mysqli_query($conn, $query);
    // echo $res;


    while ($row = mysqli_fetch_array($res)) {
        $username = $row['username'];

        $profile = $row['profile'];
    }
    ?>

    <div class="container-fluid" style="margin-left:-40px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">


                                <h4><?php echo $username; ?> Profile</h4>
                                <?php
                                if (isset($_POST['update'])) {
                                    $profile = $_FILES['profile']['name'];
                                    if (empty($profile)) {
                                    } else {
                                        $query = "UPDATE admin SET profile='$profile' WHERE username='$ad'";
                                        // echo $query;
                                        $res = mysqli_query($conn, $query);

                                        if ($res) {
                                            move_uploaded_file($_FILES['profile']['tmp_name'], "img/".$profile);
                                            
                                        } else {
                                            print_r('no uploaded image');
                                        }
                                    }
                                }
                                ?>
                                <form method="post" enctype="multipart/form-data">
                        
                                    <?php echo "<img src='img/$profile' class='col-md-12' style='height: 200px; width:200px'>";
                                    ?>
                                    <div class="form-group">
                                        <label>Update Profile</label>
                                        <input type="file" name="profile" class="form-control">


                                        <input type="submit" value="update" name="update" class="btn btn-success">
                                    </div>


                                    <!-- <img src='img/download .png' class='col-md-12' style='height: auto;'> -->
                                </form>
                                <!-- <br><br> -->
                                <!-- <div class="form-group">
                                    <label>Update Profile</label>
                                    <input type="file" name="profile" class="form-control">
                                </div>
                                <br>
                                <input type="submit" value="update" name="update" class="btn btn-success">
 -->
                                <br>
                                <br>
                                <div style=" border:1px solid; height: 600px;">
                                    <div class="col-md-6 mx-2">
                                        <?php
                                        if (isset($_POST['change'])) {
                                            $username = $_POST['uname'];
                                            if (empty($username)) {
                                            } else {
                                                $query = "UPDATE admin SET username='$username' WHERE username='$ad'";
                                                $res = mysqli_query($conn, $query);
                                                if ($res) {
                                                    $_SESSION['admin'] = $username;
                                                }
                                            }
                                        }

                                        ?>
                                        <form method="post" enctype="multipart/form-data">
                                            <h5 class="text-center">Change Username</h5>

                                            <input type="text" name="uname" class="form-control" autocomplete="off">
                                            <br>
                                            <input type="submit" value="Change Username" name="change" class="btn btn-success">

                                        </form> <br><br>
                                        <?php
                                        if (isset($_POST['upass'])) {
                                            $newp = $_POST['newp'];
                                            $oldp = $_POST['oldp'];
                                            $conp = $_POST['conp'];
                                            $error = array();

                                            $old = mysqli_query($conn, "SELECT * FROM admin WHERE username='$ad'");
                                            $row = mysqli_fetch_array($old);
                                            $pass = $row['password'];
                                            if (empty($oldp)) {
                                                $error['p'] = "please enter old password";
                                            } elseif (empty($newp)) {
                                                $error['p'] = "please enter new password";
                                            } elseif (empty($conp)) {
                                                $error['p'] = "please enter confirm password";
                                            } elseif ($oldp != $pass) {
                                                $error['p'] = "Invalid old password";
                                            } elseif ($newp != $conp) {
                                                $error['p'] = "Old password and New password are not match";
                                            }

                                            if (count($error) == 0) {
                                                $query = "UPDATE admin SET password='$newp' WHERE username='$ad'";

                                                mysqli_query($conn, $query);
                                            }
                                            if (isset($error['p'])) {
                                                $er = $error['p'];
                                                $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                            } else {
                                                $show = "";
                                            }
                                        }

                                        ?>
                                        <form method="post" enctype="multipart/form-data">
                                            <h5 class="text-center">Change Password</h5>
                                            <div><?php echo $show; ?></div>
                                            <label>New Password</label>
                                            <input type="password" name="newp" class="form-control">
                                            <br>
                                            <label>Old Password</label>
                                            <input type="password" name="oldp" class="form-control">
                                            <br>
                                            <label>Confirm Password</label>
                                            <input type="password" name="conp" class="form-control"><br>
                                            <input type="submit" value="Update Password" name="upass" class="btn btn-success">
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
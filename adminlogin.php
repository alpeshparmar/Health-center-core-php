<?php
include("./conn.php");
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $error = array();

    if (empty($username)) {
        $error['admin'] = "Please Enter Username";
    } elseif (empty($password)) {
        $error['admin'] = "Please Enter Password";
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            echo '<script language="javascript">';
            echo '<script>alert("you have login as an admin")</script>';
            $_SESSION['admin'] = $username;
            header("location:admin/index.php");
            exit();
        } else {
            echo '<script>alert("Invalid Username and Password")</script>';
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
    <title>Document</title>
</head>

<body>
    <?php include("header.php") ?>
    <div class="container shadow bg-info " style="height:400px; width:50% ">
        <!-- <h1>Admin Login</h1> -->
        <!-- <div class="col-md-12 ">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-4 p-5 text-black rounded">
                    <form method="post" class="shadow">
                        <div class="form-group ">
                            <label>Username</label>
                            <input type="text" name="uname" id="" autocomplete="off" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" id="" autocomplete="off" placeholder="Enter password">
                        </div>


                        <input type="submit" name="Login" class="btn btn-success">


                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div> -->
        <form method="post">


            <h1 class="mt-4 text-center">Admin Login</h1>
            <div class="alert alert-danger">
                <?php
                if (isset($error['admin'])) {

                    $sh = $error['admin'];
                    // echo 'hello', $sh;
                    $show = "<h5 class='alert alert-danger'>" . $sh . "</h5>";
                    // $show = $sh;
                } else {
                    $show = '';
                }
                echo $show;
                ?>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="" autocomplete="off" placeholder="Enter username">

            </div>
            <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" id="" autocomplete="off" placeholder="Enter password">
            </div>
            <br>
            <button type="submit" class="btn btn-success container-fluid" name=login>Login</button>
        </form>
    </div>
</body>

</html>
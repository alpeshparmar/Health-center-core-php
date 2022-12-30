<?php
session_start();
include("conn.php");
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];


    if (empty($username)) {
        echo "Please Enter Username";
    } elseif (empty($password)) {
        echo "Please Enter Password";
    } else {
        $query = "SELECT * FROM patient WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            
            header("location:patient/index.php");
            $_SESSION['patient'] = $username;
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

    <div class="container shadow bg-info  " style="height:340px; width:50% ">
        <form method="post">
            <h1 class="mt-4 text-center">Patient Login</h1>
            <div class="mb-3 mt-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="" autocomplete="off" placeholder="Enter username">

            </div>
            <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" id="" autocomplete="off" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-success center" name="login">Login</button>
            <p>
            <h5 class="text-center">I don't have an account <a href="account.php">Click here....</a></h5>
            </p>
        </form>
    </div>

</body>

</html>
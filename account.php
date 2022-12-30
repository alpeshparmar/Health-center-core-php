<?php
session_start();
include("conn.php");
// echo "test";
if (isset($_POST['create'])) {
    // echo "teste";
    $fname = $_POST['fname'];
    // echo $fname;
    // exit();
    $sname = $_POST['sname'];
    
    
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $pass = $_POST['pass'];

    $error = array();

    if (empty($fname)) {
        $error['patient'] = "please enter firstname";
    } elseif (empty($sname)) {
        $error['patient'] = "please enter surname";
    } elseif (empty($uname)) {
        $error['patient'] = "please enter username";
    } elseif (empty($email)) {
        $error['patient'] = "please enter email";
    } elseif ($gender=="") {
        $error['patient'] = "please select gender";
    } elseif ($country=="") {
        $error['patient'] = "please select country";
    } elseif (empty($pass)) {
        $error['patient'] = "please enter password";
    }
    if (count($error) == 0) {
        $query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,country,password,date,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$country','$pass',NOW(),'a1.jpg')";
        // echo $query;

        $res = mysqli_query($conn, $query);
        if ($res) {
            header("location:patientlogin.php");
        } else {
            echo "<script>alert('failed')</script>";
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
    <title>Admin account</title>
</head>

<body>
    <?php include("header.php") ?>
    <div class="container shadow bg-info" style="height:850px; width:50% ">
        <form method="post">
            <h1 class="mt-4 text-center">Create account</h1>
            <div class="mb-3 mt-3">
                <label class="form-label">Firstname</label>
                <input type="text" class="form-control" name="fname" id="" autocomplete="off" placeholder="Enter Firstname">

            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Surname</label>
                <input type="text" class="form-control" name="sname" id="" autocomplete="off" placeholder="Enter Surname">

            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="" autocomplete="off" placeholder="Enter Username">

            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="" autocomplete="off" placeholder="Enter Email">

            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Phone Number</label>
                <input type="number" class="form-control" name="phone" id="" autocomplete="off" placeholder="Enter Phone-Number">

            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="">Select your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>


            </div>
            <div class="mb-3 mt-3 form-group">
                <label class="form-label">Country</label>
                <select name="country" class="form-control">
                    <option value="">Select your Country</option>
                    <option value="Surat">Surat</option>
                    <option value="Ahemdabad">Ahemdabad</option>
                </select>


            </div>
            <div class="mb-3 mt-3 form-group">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" id="" autocomplete="off" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-success text-center container-fluid" name="create">Create Account</button>
            <p>
            <h5 class="text-center">I already have an account <a href="patientlogin.php">Click here....</a></h5>
            </p>

        </form>
    </div>
</body>

</html>
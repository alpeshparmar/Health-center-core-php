<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account page</title>
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 55%;
        }
        
    </style>
</head>

<body>
    <?php include("header.php")
    ?>
    <div class="container">
        <div class="col-md-12 my-5">
            <div class="row">
                <div class="col-md-3 mx-4  shadow" style="width:22%; height:350px ">
                    <img src="logo1.jpg" style="height: 200px; width:200px" class=" my-2 center">
                    <div class="text-center">
                        <h5>Click on the button for more information.....</h5>
                        <a href="">
                            <button class="btn btn-success my-1px">More Info!!!</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 mx-2 shadow" style="width:22%; height:350px">
                    <img src="h1.jfif" style="margin-top:20px">
                    <div class="text-center">
                        <h5>We are applying for fitness treatment.....</h5>
                        <a href="">
                            <button class="btn btn-success">Apply Now!!!</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 mx-2 shadow" style="width:23%">
                    <img src="h2.jfif" style="margin-top:20px">
                    <div class="text-center">
                        <h5 class="my-2">Create Account for patient</h5>
                        <a href="account.php">
                            <button class="btn btn-success">Create account!!!</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
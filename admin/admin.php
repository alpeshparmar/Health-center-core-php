<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("../header.php");
    include("../conn.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-40px;  height:90vh;">

                    <?php include("sidenav.php"); ?>


                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>
                                <?php
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username!='$ad' ";
                                $res = mysqli_query($conn, $query);
                                $output = "
                                <table class='table table-bordered'>
                                    
                                       <tr>
                                        
                                            <th scope='col'>id</th>
                                            <th scope='col'>username</th>
                                            <th scope='col' style='width: 10%;'>action</th>
                                            </tr>
                                        ";
                                if (mysqli_num_rows($res) < 1) {
                                    $output .= "<tr><td colspan='3' class='text-center '>No new Admin</td></tr>";
                                }
                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    
                                    $username = $row['username'];
                                
                                    $output .= "<tr>
                                    <td>$id</td>
                                    <td>$username</td>
                                    <td><a href='admin.php?id=$id' ><button id='$id' class='btn btn-danger' >Remove</button></a></td>
                                ";
                                }

                                $output .= "</tr>
                                </table>
                                ";
                                echo $output;
                                // $sql="SELECT*FROM admin";
                                // $r1=mysqli_query($conn,$r1);
                                // if(mysqli_num_rows($r1)>0){
                                //     $total=mysqli_num_rows($r1);
                                //     $limit=3;
                                //     $total_page=ceil($total/$limit);
                                // }
                                

                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $query="DELETE FROM admin WHERE id='$id'";
                                     mysqli_query($conn, $query);
                                }
                                // $sql="SELECT*FROM admin";
                                // $r1=mysqli_query($conn,$r1);
                                // if(mysqli_num_rows($r1)>0){
                                //     $total=mysqli_num_rows($r1);
                                //     $limit=3;
                                //     $total_page=ceil($total/$limit);
                                    
                                //     for($i=1;$i<=$total_page;$i++){
                                //         <ul class="pagination admin-pagination">
                                //     <li class="active"><a>1</a></li>
                                //     <li><a>2</a></li>
                                //     <li><a>3</a></li>
                                // </ul>
                                    
                                

                                ?>
                                
                                
                                <!-- <ul class='pagination admin-pagination'>
                                    <li class='active'><a>1</a></li>
                                    <li><a>2</a></li>
                                    <li><a>3</a></li>
                                </ul> -->
                                

                            </div>

                            <div class="col-md-6">
                                <?php
                                if (isset($_POST['add'])) {
                                    $uname = $_POST['uname'];
                                    // echo $uname;
                                    $pass = $_POST['pass'];
                                    // echo $pass;
                                    $img = $_FILES['image']['name'];
                                    // echo $img;
                                    $error = array();

                                    if (empty($uname)) {
                                        $error['admin'] = "Please Enter Username";
                                    } elseif (empty($pass)) {
                                        $error['admin'] = "Please Enter Password";
                                    } elseif (empty($img)) {
                                        $error['admin'] = "Please Add admin Picture";
                                    }

                                    if (count($error) == 0) {
                                        $query = "INSERT INTO admin (username,password,profile) VALUES ('$uname','$pass','$img')";
                                        
                                    
                                        $result = mysqli_query($conn, $query);

                                        if ($result) {
                                            move_uploaded_file($_FILES['image']['tmp_name'], "img".$img);
                                        } else {
                                            print_r($errors);
                                        }
                                    }
                                }
                                // $er=$error['u'];
                                if(isset($error['u'])){
                                    $er=$error['u'];
                                    $show="<h5 class='text-cente alert alert-danger'>$er</h5>";
                                }else{
                                    $show="";
                                }
                                ?>
                                <h5 class="text-center">Add Admin</h5>
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="mb-3 mt-3 form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="uname" id="" autocomplete="off" placeholder="Enter username">

                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass" id="" autocomplete="off" placeholder="Enter password">
                                    </div>

                                    <div class="mb-3 mt-3 form-group">
                                        <label>Add Admin Picture</label>
                                        <input type="file" class="form-control" name="image">
                                        <input type="submit" value="Add New Admin" name="add" class="btn btn-success my-2"> 
                                    
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
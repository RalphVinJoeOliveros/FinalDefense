<?php
session_start();
if(isset($_SESSION['lrn'])) {
    echo "<script>window.location='student-landing-page.php'; </script>";
    die();
  }elseif(isset($_SESSION['department'])) {
    echo "<script>window.location='department-studentslist.php'; </script>";
    die();
  } elseif(!isset($_SESSION['email'])) {
      echo "<script>window.location='index.php'; </script>";
      die();
  }
include "navigation_bar_coordinator.php";
include("capstone_database.php");
include "managedepartment_modal.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css"/>
    <title>Manage Industries</title>
    <style>
        .profile-container {
        display: flex;
        justify-content: center;
        margin-left: 50px;
        margin-right: -50px;
    
    }
    .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 0;
        overflow: hidden;
        position: relative;
        border: #889796 solid 1px;

    }

    .profile-pic img {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        font-size: 16px;
        line-height: 200px;
        text-align: center;
    }

    .profile-pic input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        right: 0;
        opacity: 0;
        cursor: pointer;
    }
    .highlight4{
        color: #25B8B4;
        font-weight: 500;
    }
    </style>
  </head>
  <body>
   <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List of Industries Registered</h5><br>
                    <table class="table table-striped table-bordered" id="blocks_table">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Industry Name</th>
                            <th>View</th>
                            <th>Password</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $sql = "SELECT * FROM departments";
                        $query = mysqli_query($mysqli, $sql);
                        while($result = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>";
                            echo $result['username'];
                            echo "</td>";
                            echo "<td>";
                            echo strtoupper($result['department']);
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='' class='view-btn' data-toggle='modal' data-target='#viewModal' data-id='" . $result['ID'] . "'>View</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='' class='pass-btn' data-toggle='modal' data-target='#passModal' data-id='" . $result['ID'] . "'>Change</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='' class='del-btn' data-toggle='modal' data-target='#delModal' data-id='" . $result['ID'] . "'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?></tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register New Industry</h5>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="register_name">Industry Logo</label>
                            <div class="profile-pic" align="center">
                                <img src="uploads/silhouette.png" alt="Upload Photo">
                                <input type="file" id="upload-pic" name="picture" accept="2x2/*" onchange="loadPreview(event)">
                            </div>
                            <label for="register_name">Industry Name</label>
                            <input type="text" class="form-control text-uppercase" placeholder="Please Type the department name" id="register_block" name="register_name" aria-describedby="register_block" required>
                            <label for="username">Username</label>
                            <input type="text" class="form-control" placeholder="Please Type Username" id="register_block" name="username" pattern="[a-z]+\d{0,2}\.[a-z]+\d{0,2}" aria-describedby="register_block" title="Please enter a valid username (e.g. john12.smith34, john.smith, john.smith12)" required>
                            <label for="password">Password</label>
                            <input type="text" class="form-control" placeholder="Password" id="register_block" name="password" aria-describedby="register_block" value="ici-iligan" required>
                            <label for="confirmpass">Confirm Password</label>
                            <input type="text" class="form-control" placeholder="Confirm Password" id="register_block" name="confirmpass" aria-describedby="register_block" value="ici-iligan" required>
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" placeholder="Please type Email Address" id="register_block" name="email" aria-describedby="register_block" >
                            <label for="address">Industry Address</label>
                            <input type="text" class="form-control" placeholder="Please Type Department's Address" id="register_block" name="address" aria-describedby="register_block" >
                            <label for="text">Phone Number/Telephone Number</label>
                            <input type="text" class="form-control" placeholder="Please Type Phone Number/Telephone Number" id="register_block" name="number" aria-describedby="register_block" >
                            <label for="text">Facebook Name/Facebook Page</label>
                            <input type="text" class="form-control" placeholder="Please Type Department's Facebook Name" id="register_block" name="fb" aria-describedby="register_block">
                        </div>
    <script>
        function loadPreview(event) {
            var output = document.querySelector('.profile-pic img');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
                        <?php
                            if(isset($_POST['submit'])) {
                                function id(){
                                    while(true){
                                        include('capstone_database.php');
                                        $id = rand(100000, 999999);
                                        $check_id = "SELECT * FROM coordinator WHERE ID = '$id'";
                                        $check_query = mysqli_query($mysqli, $check_id);
                                        if(mysqli_num_rows($check_query) == 0){
                                            return $id;
                                        }
                                    }
                                }
                            
                                $id = id();
                                $register_name =strtoupper(addslashes(trim($_POST['register_name'])));
                                $username = trim($_POST['username']);
                                $email = trim($_POST['email']);
                                $pass = trim($_POST['password']);
                                $confirmpass = trim($_POST['confirmpass']);
                                $address = addslashes(trim($_POST['address']));
                                $number = trim($_POST['number']);
                                $fb = addslashes(trim($_POST['fb']));
                                $picture = "silhouette.png";
                                
                                $targetDir = "uploads/";
                                if($_FILES["picture"]["name"] == ''){
                                    $fileName = "silhouette.png";
                                } else {
                                    $fileName = basename($_FILES["picture"]["name"]);
                                }
                                $fileExt = explode('.', $fileName);
                                $newFilename = uniqid('', true) . "-" . $fileName;
                                $tempFilename = $_FILES["picture"]["tmp_name"];
                                $targetFilePath = $targetDir . $newFilename;
                                $allowedTypes = array('jpg', 'png', 'jpeg');
                                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                                
                                $checkUser = "SELECT * FROM departments WHERE username = '$username'";
                                $checkUserResult = mysqli_query($mysqli, $checkUser);
                                $check_dep = "SELECT * FROM departments WHERE department = '$register_name'";
                                $check_result = mysqli_query($mysqli, $check_dep);

                                if(mysqli_num_rows($check_result) > 0){
                                    echo "<script>alert('Department already exists!')</script>";
                                    echo "<script>window.location='manage_departments.php'</script>";
                                } elseif (mysqli_num_rows($checkUserResult) > 0) {
                                    echo "<script>alert('Username already exists!')</script>";
                                    echo "<script>window.location='manage_departments.php'</script>"; 
                                } elseif ($pass != $confirmpass){
                                    echo "<script>alert('Password does not match!')</script>";
                                    echo "<script>window.location='manage_departments.php'</script>";
                                } else {
                                    $sql = "INSERT INTO departments (username, department, email, pass, `address`, `number`, fb, picture) VALUES ('$username', '$register_name', '$email', '$pass', '$address', '$number', '$fb', '$newFilename')";
                                    $result = mysqli_query($mysqli, $sql);

                                    if ($result) {
                                        if($fileName == "silhouette.png"){
                                            echo "<script>alert('Successfully Updated!')</script>";
                                            echo "<script>window.location='manage_departments.php'</script>";
                                        } else {
                                        if (move_uploaded_file($tempFilename, $targetFilePath)) {
                                            echo "<script>alert('Successfully Updated!')</script>";
                                            echo "<script>window.location='manage_departments.php'</script>";              
                                        }
                                    if (!in_array($fileType, $allowedTypes)) {
                                        echo "<script>alert('Only JPG, JPEG and PNG files are allowed.')</script>";
                                        echo "<script>window.location='manage_departments.php'</script>";
                                    }
                                    }
                                }   
                            }
                        }
                        ?>
                        <button type="submit" class="btn btn-success" name="submit">Register Department</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<br><br>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>   
        <script>
            $(document).ready(function() {
                $('#blocks_table').DataTable();
            } );
        </script>
    <?php
    function register_block($mysqli, $register_block) {
        $sql = "SELECT * FROM student_block WHERE student_block = '$register_block'";
        $count = mysqli_num_rows(mysqli_query($mysqli, $sql));

        if($count == 1) {
            echo "<script>alert('Grade Level and Block already exists in the system, please try again'); window.location='manage_blocks.php';</script>";
        } else {
            $sql = "INSERT INTO student_block (student_block) VALUES ('$register_block')";
            if(mysqli_query($mysqli, $sql)) {
                echo "<script>alert('Grade Level and Block successfully registered'); window.location='manage_blocks.php';</script>";
            } else {
                echo "<script>alert('Grade Level and Block registration failed'); window.location='manage_blocks.php';</script>";
            }
        }
    }
?>
</body>
</html>
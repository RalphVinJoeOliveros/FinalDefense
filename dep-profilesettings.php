<?php
    session_start();
    if(isset($_SESSION['lrn'])) {
        echo "<script>window.location='student-landing-page.php'; </script>";
        die();
        } elseif(isset($_SESSION['ID'])) {
            echo "<script>window.location='studentslist.php'; </script>";
            die();
        } elseif (!isset($_SESSION['department'])) {
        echo "<script>window.location='index.php'; </script>";
        die();
        }
    include('capstone_database.php');
    include('navigation_bar_department.php');
    $sequel = "SELECT * FROM departments WHERE `ID` = '".$_SESSION['department']."'";
    $result = mysqli_query($mysqli, $sequel);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
body {
        background: lightgray;
    }

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.profile-container {
        display: flex;
        justify-content: center;
        margin-left: 50px;
        margin-right: -50px;
    
}
    .profile-pic {
        width: 200px;
        height: 200px;
        border-radius: 0;
        overflow: hidden;
        position: relative;
        border: #889796 solid 1px;
        border-radius: 50%;
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
    </style>
</head>
<body>
<form action="dep-profilesettings.php" method="post" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <div class="profile-pic" align="center">
                    <img src="uploads/<?php echo $row['picture'] ?>" alt="Upload Photo">
                    <input type="file" id="upload-pic" name="picture" accept="2x2/*" onchange="loadPreview(event)">
                </div>
                <span class="font-weight-bold"><?php echo $row['department']; ?></span><span class="text-black-50"><?php echo "Username: " . $row['username'] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Department Name</label>
                        <input type="text" class="form-control" placeholder="Input Department Name" value="<?php echo $row['department'] ?>" name="dep-name">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <input type="email" class="form-control" value="<?php echo $row['email'] ?>"  placeholder="enter email address" name="email" required>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $row['number'] ?>" name="number">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Current Address</label>
                        <input type="text" class="form-control" placeholder="enter current address" value="<?php echo $row['address'] ?>" name="address">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Facebook Name/Messenger Name</label>
                        <input type="text" class="form-control" placeholder="Enter Facebook name/Messenger name" value="<?php echo $row['fb'] ?>" name="fb">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Change Password</span></div><br>
                <div class="col-md-12"><label class="labels">Current Password</label><input type="password" class="form-control" placeholder="Type current password" name="currentpass" value=""></div> <br>
                <div class="col-md-12"><label class="labels">New Password</label><input type="password" class="form-control" placeholder="Type new password" name="newpass" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" class="form-control" placeholder="Confirm new password" name="confirmpass" value=""></div> <br>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center"><input type="submit" class="btn btn-success" value="Save Changes" name="submit"></div>
<br>
</div>
</div>
</div>
</form>
<script>
            function loadPreview(event) {
                var output = document.querySelector('.profile-pic img');
                output.src = URL.createObjectURL(event.target.files[0]);
            }
</script>
<?php
    if(isset($_POST['submit'])){
        $department = $_SESSION['department'];

        $targetDir = "uploads/";
        $fileName = basename($_FILES["picture"]["name"]);
        $newFilename = uniqid('', true) . "-" . $fileName;
        $tempFilename = $_FILES["picture"]["tmp_name"];
        $targetFilePath = $targetDir . $newFilename;
        $allowedTypes = array('jpg', 'png', 'jpeg');
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $depname = ucwords(trim($_POST['dep-name']));
        $email = strtolower(trim($_POST['email']));
        $cpnum = $_POST['number'];
        $address = $_POST['address'];
        $fb = $_POST['fb'];
        $currentpass = $_POST['currentpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];

        $passsequel = "SELECT * FROM `departments` WHERE ID = '$department'";
        $result = mysqli_query($mysqli, $passsequel);
        $row = mysqli_fetch_array($result);

        if(empty($currentpass) AND empty($newpass) AND empty($confirmpass)){
            $sequel = "UPDATE `departments` SET `department`=?, `email`=?, `number`=?, `address`=?, `fb`=? WHERE ID=?";
            $stmt = $mysqli->prepare($sequel);
            $stmt->bind_param("sssssi", $depname, $email, $cpnum, $address, $fb, $department);
            $result = $stmt->execute();
            $stmt->close();
    
            if($result){             
                if(empty($fileName)){
                    $existing = "SELECT * FROM `departments` WHERE ID = '$department'";
                    $result = mysqli_query($mysqli, $existing);
                    $row = mysqli_fetch_array($result);
                    $existingPicture = $row['picture'];

                    $newsequel = "UPDATE `departments` SET `picture`='$existingPicture' WHERE ID = '$department'";
                    $result = mysqli_query($mysqli, $newsequel);

                    echo "<script>alert('Successfully Updated!')</script>";
                    echo "<script>window.location='dep-profilesettings.php'</script>";   
                }if(!in_array($fileType, $allowedTypes)) {
                    echo "<script>alert('Only JPG, JPEG and PNG files are allowed.')</script>";
                    die;
                }if(move_uploaded_file($tempFilename, $targetFilePath)){
                    $newsequel = "UPDATE `departments` SET `picture`='$newFilename' WHERE ID = '$department'";
                    $result = mysqli_query($mysqli, $newsequel);
                    echo "<script>alert('Successfully Updated!')</script>";
                    echo "<script>window.location='dep-profilesettings.php'</script>";              
                    }
                }
        }else{
            $query = "SELECT pass FROM departments WHERE ID = ?";
            $stmt = mysqli_prepare($mysqli, $query);
            mysqli_stmt_bind_param($stmt, 'i', $department);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['pass'];

            if(!password_verify($currentpass, $hashed_password)){
                echo "<script>alert('Current password is incorrect!')</script>";
                echo "<script>window.location='dep-profilesettings.php'</script>";
            }else{
                if(empty($newpass) AND empty($confirmpass)){
                    echo "<script>alert('Please fill up the new password and confirm password field!')</script>";
                    echo "<script>window.location='dep-profilesettings.php'</script>";
                    }else{
                        if($currentpass == $newpass){
                            echo "<script>alert('New password is the same as the current password!')</script>";
                            echo "<script>window.location='dep-profilesettings.php'</script>";
                        }else{
                            if($newpass !== $confirmpass){
                                echo "<script>alert('New password and confirm password does not match!')</script>";
                                echo "<script>window.location='dep-profilesettings.php'</script>";
                            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $newpass)) {
                                echo "<script>alert('Your password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.')</script>";
                                echo "<script>window.location='dep-profilesettings.php'</script>";
                            }  else {
                                $hash = password_hash($newpass, PASSWORD_DEFAULT);
                                $sequel = "UPDATE `departments` SET `department`=?, `email`=?, `number`=?, `address`=?, `fb`=?, pass=? WHERE ID=?";
                                $stmt = $mysqli->prepare($sequel);
                                $stmt->bind_param("ssssssi", $depname, $email, $cpnum, $address, $fb, $hash, $department);
                                $result = $stmt->execute();
                                $stmt->close();
                    
                                if($result){             
                                    if(empty($fileName)){
                                        $existing = "SELECT * FROM `departments` WHERE ID = '$department'";
                                        $result = mysqli_query($mysqli, $existing);
                                        $row = mysqli_fetch_array($result);
                                        $existingPicture = $row['picture'];
                
                                        $newsequel = "UPDATE `departments` SET `picture`='$existingPicture' WHERE ID = '$department'";
                                        $result = mysqli_query($mysqli, $newsequel);
                
                                        echo "<script>alert('Successfully Updated!')</script>";
                                        echo "<script>window.location='dep-profilesettings.php'</script>";   
                                    }if(!in_array($fileType, $allowedTypes)) {
                                        echo "<script>alert('Only JPG, JPEG and PNG files are allowed.')</script>";
                                        die;
                                    }if(move_uploaded_file($tempFilename, $targetFilePath)){
                                        $newsequel = "UPDATE `departments` SET `picture`='$newFilename' WHERE ID = '$department'";
                                        $result = mysqli_query($mysqli, $newsequel);
                                        echo "<script>alert('Successfully Updated!')</script>";
                                        echo "<script>window.location='dep-profilesettings.php'</script>";              
                                    }
                        }
                    }
                }
            }
        }
    }
}
?>
</body>
</html>
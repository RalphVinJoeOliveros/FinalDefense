<?php
    session_start();
    if(isset($_SESSION['ID'])) {
        echo "<script>window.location='studentslist.php'; </script>";
        die();
      }elseif(isset($_SESSION['department'])) {
        echo "<script>window.location='department-studentslist.php'; </script>";
        die();
      } elseif(!isset($_SESSION['lrn'])) {
          echo "<script>window.location='index.php'; </script>";
          die();
      }
    include "capstone_database.php";
    include "navigation_bar.php";

    $sequel = "SELECT * FROM students where lrn = '" . $_SESSION['lrn'] . "'";
    $query = mysqli_query($mysqli, $sequel);
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>  
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
    .highlight2, .highlight1, .highlight3, .highlight5{
      color: black;
      font-weight: 500;
    }
    </style>
</head>
<body>
<form action="settings.php" method="post" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div class="profile-pic" align="center">
                        <img src="uploads/<?php echo $row['picture'] ?>" alt="Upload Photo">
                        <input type="file" id="upload-pic" name="picture" accept="2x2/*" onchange="loadPreview(event)">
                    </div>
                    <span class="font-weight-bold"><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname']; ?></span><span class="text-black-50"><?php echo "LRN: " . $row['lrn'] ?></span><span></span></div>
                    <label class="labels">Objectives</label>
                    <textarea name="objective" id="" class="form-control" cols="30" rows="10" placeholder="Write your objectives here."><?php echo $row['objective']; ?></textarea><br>
                    <label class="labels">Skills</label>
                    <textarea name="skills" id="" class="form-control" cols="30" rows="5" placeholder="Write your Skills here."><?php echo $row['skills']; ?></textarea>
                    <small id="" class="form-text text-muted">(Please include a comma in your list of skills. Ex. Writing, Communication, Teamwork)</small><br>
                    <label class="labels">Qualifications</label>
                    <textarea name="qualifications" id="" class="form-control" cols="30" rows="5" placeholder="Write your qualifications here."><?php echo $row['skills']; ?></textarea>
                    <small id="" class="form-text text-muted">(Please include a comma in your list of Qualifications. Ex. Writing, Communication, Teamwork)</small>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">First Name</label>
                                <input type="text" class="form-control" placeholder="first name" value="<?php echo $row['fname'] ?>" name="fname" required>
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Middle Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['mname'] ?>" placeholder="(optional)" name="mname">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Surname</label>
                                <input type="text" class="form-control" value="<?php echo $row['lname'] ?>" placeholder="surname" name="lname" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Email Address</label>
                                <input type="email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="enter email address" name="email" required oninput="this.value = this.value.replace(/\s/g, '');" required>

                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="09XX-XXX-XXXX" value="<?php echo $row['cpnum'] ?>" name="cpnum" pattern="[0-9]*" oninput="javascript: if (this.value.length > 11) this.value = this.value.slice(0, 11);" required>
<script>
    // Prevent the letter "e" from being entered in the number input field
    const input = document.querySelector('input[name="cpnum"]');
    input.addEventListener('keydown', function(event) {
        if (event.key === 'e' || event.key === 'E') {
            event.preventDefault();
        }
    });

    // Update the input type to number and add the first "0" on page load
    window.addEventListener('DOMContentLoaded', function() {
        input.type = 'number';
        input.value = '0' + input.value;
    });
</script>


                            </div><br><br><br><br>
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <h4 class="text-right">Personal Information</h4>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="enter current address" value="<?php echo $row['bdate'] ?>" name="bdate" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Place of Birth</label>
                                <input type="text" class="form-control" placeholder="enter place of birth" value="<?php echo $row['placeofbirth'] ?>" name="pob" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Current Address</label>
                                <input type="text" class="form-control" placeholder="enter current address" value="<?php echo $row['homeaddress'] ?>" name="address" required>
                            </div>
                            <div class="col-md-12">
                            <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Nationality:</label><br>
                                <select name="nationality" id="" class="form-control" required>
                                <?php
                                    $nationality = "SELECT nationality FROM students where lrn = '" . $_SESSION['lrn'] . "'";
                                    $check = mysqli_query($mysqli, $nationality);
                                    $existingValue = mysqli_fetch_array($check)['nationality'];
                                ?>
                                    <option value="">-- select one --</option>
                                    <option value="Filipino" <?php if($existingValue == 'Filipino') echo 'selected'; ?>>Filipino</option>
                                    <option value="Others" <?php if($existingValue == 'Others') echo 'selected'; ?>>Others</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Religion</label>
                                <input type="text" class="form-control" placeholder="enter current address" value="<?php echo stripslashes($row['religion']) ?>" name="religion" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Height (cm)</label>
                                <input type="number" step="any" class="form-control" placeholder="enter current address" value="<?php echo $row['height'] ?>" name="height">
                            </div><br><br><br><br>
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <h4 class="text-right">Character References</h4>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Name:</label>
                                <input type="text" class="form-control" placeholder="enter name" value="<?php echo $row['cr1name'] ?>" name="cr1name" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Relation:</label>
                                <input type="text" class="form-control" placeholder="enter relation" value="<?php echo $row['cr1relation'] ?>" name="cr1relation" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Contact Information:</label>
                                <input type="text" class="form-control" placeholder="enter contact information" value="<?php echo $row['cr1info'] ?>" name="cr1info" required>
                            </div><br><br><br><br>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Name:</label>
                                <input type="text" class="form-control" placeholder="enter name" value="<?php echo $row['cr2name'] ?>" name="cr2name" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Relation:</label>
                                <input type="text" class="form-control" placeholder="enter relation" value="<?php echo $row['cr2relation'] ?>" name="cr2relation" required>
                            </div>
                            <div class="col-md-12">
                                <label style='margin-top: 10px; margin-bottom: 0px;' class="labels">Contact Information:</label>
                                <input type="text" class="form-control" placeholder="enter contact information" value="<?php echo $row['cr2info'] ?>" name="cr2info" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span><h4 class="text-right">Change Password</h4></span></div><br>
                        <div class="col-md-12"><label class="labels">Current Password</label><input type="password" class="form-control" placeholder="Type current password" name="currentpass" value=""></div> <br>
                        <div class="col-md-12"><label class="labels">New Password</label><input type="password" class="form-control" placeholder="Type new password" name="newpass" value=""></div> <br>
                        <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" class="form-control" placeholder="Confirm new password" name="confirmpass" value=""></div> <br>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center"><input class="btn-success" type="submit" value="Save Changes" name="submit"></div><br>
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
        $lrn = $_SESSION['lrn'];

        $targetDir = "uploads/";
        $fileName = basename($_FILES["picture"]["name"]);
        $newFilename = uniqid('', true) . "-" . $fileName;
        $tempFilename = $_FILES["picture"]["tmp_name"];
        $targetFilePath = $targetDir . $newFilename;
        $allowedTypes = array('jpg', 'png', 'jpeg');
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $fname = ucwords(trim($_POST['fname']));
        $lname = ucwords(trim($_POST['lname']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $address = addslashes(trim($_POST['address']));
        $cpnum = $_POST['cpnum'];
        $bdate = $_POST['bdate'];
        $pob = addslashes(trim($_POST['pob']));
        $address = addslashes(trim($_POST['address']));
        $nationality = $_POST['nationality'];
        $religion = addslashes(trim($_POST['religion']));
        $height = $_POST['height'];
        $cr1name = ucwords(trim($_POST['cr1name']));
        $cr1relation = addslashes(trim($_POST['cr1relation']));
        $cr1info = addslashes(trim($_POST['cr1info']));
        $cr2name = ucwords(trim($_POST['cr2name']));
        $cr2relation = addslashes(trim($_POST['cr2relation']));
        $cr2info = addslashes(trim($_POST['cr2info']));
        $objective = addslashes(trim($_POST['objective']));
        $skills = addslashes(trim($_POST['skills']));
        $qualifications = addslashes(trim($_POST['qualifications']));

        $currentpass = $_POST['currentpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];

        $passsequel = "SELECT * FROM `students` WHERE lrn = '$lrn'";
        $result = mysqli_query($mysqli, $passsequel);
        $row = mysqli_fetch_array($result);

        if(empty($currentpass) AND empty($newpass) AND empty($confirmpass)){
            if(!empty($cpnum) && strlen($cpnum) != 11){
                echo "<script>alert('Please input an 11 digit mobile number!')</script>";
                echo "<script>window.location='settings.php'</script>";
            }else{
            $stmt = $mysqli->prepare("UPDATE students SET `fname`=?, `lname`=?, `email`=?, `homeaddress`=?, `cpnum`=?, `bdate`=?, `placeofbirth`=?, `nationality`=?, `religion`=?, `height`=?, `cr1name`=?, `cr1relation`=?, `cr1info`=?, `cr2name`=?, `cr2relation`=?, `cr2info`=?,  `objective`=?, `skills`=?, `qualifications`=? WHERE lrn=?");
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssi", $fname, $lname, $email, $address, $cpnum, $bdate, $pob, $nationality, $religion, $height, $cr1name, $cr1relation, $cr1info, $cr2name, $cr2relation, $cr2info, $objective, $skills, $qualifications, $lrn);
            $result = mysqli_stmt_execute($stmt);
    
            if($result){             
                if(empty($fileName)){
                    $existing = "SELECT * FROM `students` WHERE lrn = '$lrn'";
                    $result = mysqli_query($mysqli, $existing);
                    $row = mysqli_fetch_array($result);
                    $existingPicture = $row['picture'];

                    $newsequel = "UPDATE `students` SET `picture`='$existingPicture' WHERE lrn = '$lrn'";
                    $result = mysqli_query($mysqli, $newsequel);

                    echo "<script>alert('Successfully Updated!')</script>";
                    echo "<script>window.location='settings.php'</script>";   
                }if(!in_array($fileType, $allowedTypes)) {
                    echo "<script>alert('Only JPG, JPEG and PNG files are allowed.')</script>";
                    die;
                }if(move_uploaded_file($tempFilename, $targetFilePath)){
                    $newsequel = "UPDATE `students` SET `picture`='$newFilename' WHERE lrn = '$lrn'";
                    $result = mysqli_query($mysqli, $newsequel);
                    echo "<script>alert('Successfully Updated!')</script>";
                    echo "<script>window.location='settings.php'</script>";              
                    }
                }
            }
        }else{
            $query = "SELECT pass FROM students WHERE lrn = ?";
            $stmt = mysqli_prepare($mysqli, $query);
            mysqli_stmt_bind_param($stmt, 'i', $lrn);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['pass'];
            
            if(!password_verify($currentpass, $hashed_password)){
                echo "<script>alert('Current password is incorrect!')</script>";
                echo "<script>window.location='settings.php'</script>";
            }else{
                if(empty($newpass) AND empty($confirmpass)){
                    echo "<script>alert('Please fill up the new password and confirm password field!')</script>";
                    echo "<script>window.location='settings.php'</script>";
                    }else{
                        if($currentpass == $newpass){
                            echo "<script>alert('New password is the same as the current password!')</script>";
                            echo "<script>window.location='settings.php'</script>";
                        }else{
                            if($newpass !== $confirmpass){
                                echo "<script>alert('New password and confirm password does not match!')</script>";
                                echo "<script>window.location='settings.php'</script>";
                            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $newpass)) {
                                echo "<script>alert('Your password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.')</script>";
                                echo "<script>window.location='settings.php'</script>";
                            } else {
                                if(!empty($cpnum) && strlen($cpnum) != 11){
                                    echo "<script>alert('Please input an 11 digit mobile number!')</script>";
                                    echo "<script>window.location='settings.php'</script>";
                                }else{
                                $hash = password_hash($newpass, PASSWORD_DEFAULT);

                                $stmt = $mysqli->prepare("UPDATE students SET fname=?, lname=?, email=?, homeaddress=?, cpnum=?, bdate=?, placeofbirth=?, nationality=?, religion=?, height=?, cr1name=?, cr1relation=?, cr1info=?, cr2name=?, cr2relation=?, cr2info=?, pass=?, objective=?, skills=?, qualifications=? WHERE lrn=?");
                                $stmt->bind_param("ssssssssssssssssssssi", $fname, $lname, $email, $address, $cpnum, $bdate, $pob, $nationality, $religion, $height, $cr1name, $cr1relation, $cr1info, $cr2name, $cr2relation, $cr2info, $hash, $objective, $skills, $qualifications, $lrn);
                                $result = $stmt->execute();
                    
                                if($result){             
                                    if(empty($fileName)){
                                        $existing = "SELECT * FROM `students` WHERE lrn = '$lrn'";
                                        $result = mysqli_query($mysqli, $existing);
                                        $row = mysqli_fetch_array($result);
                                        $existingPicture = $row['picture'];
                    
                                        $newsequel = "UPDATE `students` SET `picture`='$existingPicture' WHERE lrn = '$lrn'";
                                        $result = mysqli_query($mysqli, $newsequel);
                    
                                        echo "<script>alert('Successfully Updated!')</script>";
                                        echo "<script>window.location='settings.php'</script>";   
                                    }if(!in_array($fileType, $allowedTypes)) {
                                        echo "<script>alert('Only JPG, JPEG and PNG files are allowed.')</script>";
                                        die;
                                    }if(move_uploaded_file($tempFilename, $targetFilePath)){
                                        $newsequel = "UPDATE `students` SET `picture`='$newFilename' WHERE lrn = '$lrn'";
                                        $result = mysqli_query($mysqli, $newsequel);
                                        echo "<script>alert('Successfully Updated!')</script>";
                                        echo "<script>window.location='settings.php'</script>";              
                                        }
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
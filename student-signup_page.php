<?php
session_start();
if(isset($_SESSION['lrn'])){
    header('location: student-landing-page.php');
}elseif(isset($_SESSION['email'])){
    header('location: studentslist.php');
}elseif(isset($_SESSION['department'])){
    header('location: department-studentslist.php');
}
    include('capstone_database.php');
    $fname = "";
    $mname = "";
    $lname = "";
    $lrn = "";
    $cpnum = "";
    $email = "";
    $block = "";
    $schoolyear = "";
    $bdate = "";
    $placeofbirth = "";
    $homeaddress = "";
    $gender = "";
    $nationality = "";
    $marital_status = "";
    $religion = "";
    $height = "";


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fname = trim(ucfirst(strtolower($_POST['fname'])));
        $mname = trim(ucfirst(strtolower($_POST['mname'])));
        $lname = trim(ucfirst(strtolower($_POST['lname'])));
        $lrn = trim($_POST['lrn']);
        $cpnum = trim($_POST['cpnum']);
        $email = trim(strtolower($_POST['email']));
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $nschool = "Iligan Computer Institute, Inc.";
        $block = $_POST['block'];
        $schoolyear = $_POST['schoolyear'];
        $bdate = $_POST['bdate'];
        $placeofbirth = trim($_POST['placeofbirth']);
        $homeaddress = trim($_POST['homeaddress']);
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $marital_status = $_POST['marital_status'];
        $religion = trim(addslashes(ucfirst(strtolower(($_POST['religion'])))));
        $height = $_POST['height'];
        $coordinator = 2345678;
        $dateRegistered = date("Y-m-d");
        $status = "Pending";
        $remarks = "Not Yet Started";

        $check_lrn = "SELECT * FROM students WHERE lrn = '$lrn';";
        $result = mysqli_query($mysqli, $check_lrn);
        
        if(strlen($lrn) != 12){
            echo "<script>alert('LRN must be 12 digits!')</script>";
            $_SESSION['fname'] = $fname;
            $_SESSION['mname'] = $mname;
            $_SESSION['lname'] = $lname;
            $_SESSION['lrn'] = $lrn;
            $_SESSION['cpnum'] = $cpnum;
            $_SESSION['email'] = $email;
            $_SESSION['block'] = $block;
            $_SESSION['sy'] = $schoolyear;
            $_SESSION['bdate'] = $bdate;
            $_SESSION['placeofbirth'] = $placeofbirth;
            $_SESSION['homeaddress'] = $homeaddress;
            $_SESSION['gender'] = $gender;
            $_SESSION['nationality'] = $nationality;
            $_SESSION['marital_status'] = $marital_status;
            $_SESSION['religion'] = $religion;
            $_SESSION['height'] = $height;
        } elseif(mysqli_num_rows($result) > 0) {
            echo "<script>alert('LRN " . htmlspecialchars($lrn) . " already exists!');</script>";
            $_SESSION['fname'] = $fname;
            $_SESSION['mname'] = $mname;
            $_SESSION['lname'] = $lname;
            $_SESSION['lrn'] = $lrn;
            $_SESSION['cpnum'] = $cpnum;
            $_SESSION['email'] = $email;
            $_SESSION['block'] = $block;
            $_SESSION['sy'] = $schoolyear;
            $_SESSION['bdate'] = $bdate;
            $_SESSION['placeofbirth'] = $placeofbirth;
            $_SESSION['gender'] = $gender;
            $_SESSION['nationality'] = $nationality;
            $_SESSION['marital_status'] = $marital_status;
            $_SESSION['religion'] = $religion;
            $_SESSION['height'] = $height;
        } elseif ($pass != $cpass){
            echo "<script>alert('Password does not match!')</script>";
            $_SESSION['fname'] = $fname;
            $_SESSION['mname'] = $mname;
            $_SESSION['lname'] = $lname;
            $_SESSION['lrn'] = $lrn;
            $_SESSION['cpnum'] = $cpnum;
            $_SESSION['email'] = $email;
            $_SESSION['block'] = $block;
            $_SESSION['sy'] = $schoolyear;
            $_SESSION['bdate'] = $bdate;
            $_SESSION['placeofbirth'] = $placeofbirth;
            $_SESSION['homeaddress'] = $homeaddress;
            $_SESSION['gender'] = $gender;
            $_SESSION['nationality'] = $nationality;
            $_SESSION['marital_status'] = $marital_status;
            $_SESSION['religion'] = $religion;
            $_SESSION['height'] = $height;
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $pass)) {
            // Password is weak, display an error message to the user
            echo "<script>alert('Your password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.')</script>";
            $_SESSION['fname'] = $fname;
            $_SESSION['mname'] = $mname;
            $_SESSION['lname'] = $lname;
            $_SESSION['lrn'] = $lrn;
            $_SESSION['cpnum'] = $cpnum;
            $_SESSION['email'] = $email;
            $_SESSION['block'] = $block;
            $_SESSION['sy'] = $schoolyear;
            $_SESSION['bdate'] = $bdate;
            $_SESSION['placeofbirth'] = $placeofbirth;
            $_SESSION['homeaddress'] = $homeaddress;
            $_SESSION['gender'] = $gender;
            $_SESSION['nationality'] = $nationality;
            $_SESSION['marital_status'] = $marital_status;
            $_SESSION['religion'] = $religion;
            $_SESSION['height'] = $height;
        }else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $query = "INSERT INTO students (fname, mname, lname, lrn, email, cpnum, pass, nschool, `block`, `schoolyear`, bdate, placeofbirth, homeaddress, gender, nationality, marital_status, religion, height, coordinator, dateRegistered, `status`, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $registerResult = $stmt->execute([$fname, $mname, $lname, $lrn, $email, $cpnum, $hashed_password, $nschool, $block, $schoolyear, $bdate, $placeofbirth, $homeaddress, $gender, $nationality, $marital_status, $religion, $height, $coordinator, $dateRegistered, $status, $remarks]);

            $evaluation_query = "INSERT INTO evaluation (lrn) VALUES (?)";
            $evaluation_stmt = $mysqli->prepare($evaluation_query);
            $evaluationResult = $evaluation_stmt->execute([$lrn]);

            if($registerResult && $evaluationResult){
            echo "<script>alert('Your account has been registered! Please wait for 1-3 business days for approval.')</script>";
            echo "<script>window.location.href='index.php'</script>";
            unset($_SESSION['fname']);
            unset($_SESSION['mname']);
            unset($_SESSION['lname']);
            unset($_SESSION['lrn']);
            unset($_SESSION['cpnum']);
            unset($_SESSION['email']);
            unset($_SESSION['block']);
            unset($_SESSION['sy']);
            unset($_SESSION['bdate']);
            unset($_SESSION['placeofbirth']);
            unset($_SESSION['homeaddress']);
            unset($_SESSION['gender']);
            unset($_SESSION['nationality']);
            unset($_SESSION['marital_status']);
            unset($_SESSION['religion']);
            unset($_SESSION['height']);
            }
        }
    }
    if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $previousPage = $_SERVER['HTTP_REFERER'];
        $currentPage = $_SERVER['PHP_SELF'];
    
        if($previousPage != $currentPage) {
            unset($_SESSION['fname']);
            unset($_SESSION['mname']);
            unset($_SESSION['lname']);
            unset($_SESSION['lrn']);
            unset($_SESSION['cpnum']);
            unset($_SESSION['email']);
            unset($_SESSION['bdate']);
            unset($_SESSION['placeofbirth']);
            unset($_SESSION['homeaddress']);
            unset($_SESSION['gender']);
            unset($_SESSION['nationality']);
            unset($_SESSION['marital_status']);
            unset($_SESSION['religion']);
            unset($_SESSION['height']);
            unset($_SESSION['block']);
            unset($_SESSION['sy']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
*{
    font-family: sans-serif;
    margin: 0;
    padding: 0;
  }
.banner{
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 75%, rgba(0, 0, 0, 0.8) 100%), url(uploads/bg.jpg);

}
.navbar{
    width: 85%;
    margin: auto;
    padding: 35px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo{
    width: 290px;
}
.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;
}
.navbar ul li a{
    text-decoration: none;
    color: #fff;

}
.navbar ul li::after{
    content: '';
    height: 3px;
    width: 0;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -8px;
    transition:0.5s;
}
.navbar ul li:hover::after{
    width: 100%;
}
    .contact-form{
    max-width: 600px;
    margin: auto;
    border-radius: 3px;
    background: #FFF;
    padding: 20px;
    border: 2px solid #ccc;
  position: relative;
  top: 0;
  left: 0;
  opacity: 0.8;
    
    }
    input[type=text],input[type=number],input[type=password],input[type=date], input[type=email], select, textarea{
    width: 580px;
    padding: 15px 20px;
    margin: 10px 0;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 30px;
    border: 1px solid #ccc;
}
textarea{
    height: 130px;
}  
label{
    margin-bottom: 3px;
    color: #321F1F;
    font-size: 15px; 
    margin-left: 19px;
}
input[type='submit']{ 
    font-size: 20px;
}
input[type='submit']{ 
    font-size: 27px;
}
input[type=submit]{
    border: 0;
    color: #fff;
    padding: 7px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    font-size: 20px;
    width: 100px;
    height: 45px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    background: #2FB231;
    border-radius: 5px;
}
h3{
    margin-bottom: 3px;
    color: #889796; 
    font-weight: bold;
}
.highlight1, .highlight2, .highlight3, .highlight5{
      color: black;
      font-weight: 500;
    }
    p{
    color: darkgray;

}
body {
  background-color: rgba(0, 0, 0, 0.5);
}
h1{
    font-size: 2em;
    color: #321F1F;
    text-align: center;
}
.haveacc{
    margin: -15px 0 15px;
    font-size: .9em;
    display: flex;
    justify-content: center;
}
.haveacc label input{
    margin-right: 3px;
}
.haveacc label a{
    color: white;
    text-decoration: none;
}
.haveacc label a:hover{
    text-decoration: underline;
}
p{
    color: gray;
}
hr{
    color: darkgray;
}
    </style>
</head>
<body>
<div class="banner">
    <div class="navbar">
        <img src="uploads/logo1.png" alt="ICI logo"class="logo">
    </div>

    <form action="student-signup_page.php" method="post" id="myForm">
<div class="contact-form">
<br><h1>Student Registration Form</h1><br><br><br>
                <label for="">First Name:</label> 
                <center><td><input type="text" name="fname" value="<?php echo htmlspecialchars(isset($_SESSION['fname']) ? $_SESSION['fname'] : $fname); ?>" required></center>

                <label for="">Middle Name:</label> 
                <center><input type="text" name="mname" value="<?php echo htmlspecialchars(isset($_SESSION['mname']) ? $_SESSION['mname'] : $mname); ?>" required><br></center>
         
                <label for="">Last Name:</label> 
                <center><input type="text" name="lname" value="<?php echo htmlspecialchars(isset($_SESSION['lname']) ? $_SESSION['lname'] : $lname); ?>" required></center>

                <label for="">Email:</label> 
                <center><input type="email" name="email" value="<?php echo htmlspecialchars(isset($_SESSION['email']) ? $_SESSION['email'] : $email); ?>" required></center>

                <label for="">Contact Number:</label>
                <center><input type="number" name="cpnum" value="<?php echo htmlspecialchars(isset($_SESSION['cpnum']) ? $_SESSION['cpnum'] : $cpnum); ?>" pattern="((^(\+)(\d){12}$)|(^\d{11}$))" required></center>

                <label for="">Password:</label> 
                <center><input type="password" name="pass" required></center>

                <label for="">Confirm Password:</label> 
                <center><input type="password" name="cpass" required></center>
<br><br><hr> <br><br>               
                <label for="">Date of Birth:</label> 
                <center><input type="date" name="bdate" value="<?php echo htmlspecialchars(isset($_SESSION['bdate']) ? $_SESSION['bdate'] : $bdate); ?>" required></center>
  
                <label for="">Place of Birth:</label> 
                <center><input type="text" name="placeofbirth" value="<?php echo htmlspecialchars(isset($_SESSION['placeofbirth']) ? $_SESSION['placeofbirth'] : $placeofbirth); ?>" required></center>
                
                <label for="">Current Address:</label> 
                <center><input type="text" name="homeaddress" value="<?php echo htmlspecialchars(isset($_SESSION['homeaddress']) ? $_SESSION['homeaddress'] : $homeaddress); ?>" required></center> 

                <label for="">Sex</label>
                <center><select name="gender" id="gender" required>
                        <option value="">-Select Sex-</option>
                        <option value="Male" <?php if(htmlspecialchars(isset($_SESSION['gender']) ? $_SESSION['gender'] : $gender)){echo "selected";} ?>>Male</option>
                        <option value="Female" <?php if(htmlspecialchars(isset($_SESSION['gender']) ? $_SESSION['gender'] : $gender)){echo "selected";} ?>>Female</option>
                    </select></center>
                <label for="">Nationality:</label> 
                <center> <select name="nationality">
                    <option value="">-- select one --</option>
                    <option value="Filipino" <?php if(htmlspecialchars(isset($_SESSION['nationality']) ? $_SESSION['nationality'] : $nationality)){echo "selected";} ?>>Filipino</option>
                    <option value="Others" <?php if(htmlspecialchars(isset($_SESSION['nationality']) ? $_SESSION['nationality'] : $nationality)){echo "selected";} ?>>Others</option>
                    </select></center>

                <label for="">Marital Status:</label> 
                <center><select name="marital_status" id="marital_status" required>
                    <option value="">-Select Marital Status-</option>
                    <option value="Single" <?php if(htmlspecialchars(isset($_SESSION['marital_status']) ? $_SESSION['marital_status'] : $marital_status)){echo "selected";} ?>>Single</option>
                    <option value="marital_status" <?php if(htmlspecialchars(isset($_SESSION['marital_status']) ? $_SESSION['marital_status'] : $marital_status)){echo "selected";} ?>>Married</option>
                    <option value="Widowed" <?php if(htmlspecialchars(isset($_SESSION['marital_status']) ? $_SESSION['marital_status'] : $marital_status)){echo "selected";} ?>>Widowed</option>
                    <option value="Separated" <?php if(htmlspecialchars(isset($_SESSION['marital_status']) ? $_SESSION['marital_status'] : $marital_status)){echo "selected";} ?>>Separated</option>
                    <option value="Divorced" <?php if(htmlspecialchars(isset($_SESSION['marital_status']) ? $_SESSION['marital_status'] : $marital_status)){echo "selected";} ?>>Divorced</option>
                    </select></center>
                    
                <label for="" >Religion:</label> 
                <center><input type="text" name="religion" id="religion" value="<?php echo htmlspecialchars(isset($_SESSION['religion']) ? $_SESSION['religion'] : $religion); ?>" required></center>
      
                <label for="">Height:</label> 
                <center><input type="number" name="height" id="height" step='any' value="<?php echo htmlspecialchars(isset($_SESSION['height']) ? $_SESSION['height'] : $height); ?>" required></center>

<br><br><hr> <br><br>

                <label for="">LRN:</label> <br>
                <center><input type="number" name="lrn" value="<?php echo htmlspecialchars(isset($_SESSION['lrn']) ? $_SESSION['lrn'] : $lrn); ?>" required></center>

                <label for="block">Block:</label>
                <center><select id="block" name="block" required>
                    <option value="">-Select Block-</option>
                    <?php
                        $sql = "SELECT * FROM student_block ORDER BY student_block ASC";
                        $result = mysqli_query($mysqli, $sql);
                        while($row = mysqli_fetch_array($result)){
                    
                            $selected = '';
                            $student_block = $row["student_block"];
                            if(htmlspecialchars(isset($_SESSION['block']) ? $_SESSION['block'] : $block) == $student_block){
                                $selected = 'selected';
                            } 
                            echo "<option value='$student_block' $selected>$student_block</option>";
                        }
                    ?>
                    </select></center>

                    <label for="">School Year:</label>
                    <center><select id="schoolyear" name="schoolyear" required>
                        <option value="">-Select School Year-</option>
                        <?php
                            $start_year = 2019;
                            $current_year = date('Y');
                            $current_month = date('n'); // n returns the month without leading zeros

                            if ($current_month >= 8 && $current_month <= 12) {
                                // School year starts in August and ends in June of the following year
                                $end_year = $current_year + 1;
                            } else if ($current_month >= 1 && $current_month <= 6) {
                                // School year starts in August of the previous year and ends in June of the current year
                                $end_year = $current_year;
                            }

                            while ($start_year < $end_year) {
                                $next_year = $start_year + 1;

                                // School year starts in August and ends in June of the following year
                                $school_year = $start_year . '-' . $next_year;

                                $selected = '';
                                if(htmlspecialchars(isset($_SESSION['sy']) ? $_SESSION['sy'] : $schoolyear) == $school_year){
                                    $selected = 'selected';
                                }
                                echo "<option value='$school_year' $selected>$school_year</option>";

                                $start_year++;
                            }
                        ?>
                    </select></center>

 
                <center><input type="submit" value="Submit" name="Submit"></center>

</div>             
      
        <br><br>
        <div class="haveacc">
        <label style='color: #ccc;' for="">Already have an account? <a onclick="window.location.href='index.php'"><strong> Login here.</strong></a></label>
        </div>
<br><br>
</form>
</div>
</body>
</html>

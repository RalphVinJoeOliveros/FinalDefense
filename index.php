<?php
session_start();
if(isset($_SESSION['lrn'])){
    header('location: student-landing-page.php');
}elseif(isset($_SESSION['email'])){
    header('location: studentslist.php');
}elseif(isset($_SESSION['department'])){
    header('location: department-studentslist.php');
}
include 'capstone_database.php';
if(isset($_POST['Submit'])){
    $user = trim($_POST['user']);
    $pass = $_POST['pass'];

    if(preg_match('/^\d{12}$/', $user)) {
        $check_query = "SELECT * FROM students WHERE lrn = ?";
        $stmt = mysqli_prepare($mysqli, $check_query);
        mysqli_stmt_bind_param($stmt, 's', $user);
        mysqli_stmt_execute($stmt);
        $check_result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($check_result) == 1){
            $check_row = mysqli_fetch_assoc($check_result);
            if (password_verify($pass, $check_row['pass'])) {
                if ($check_row['status'] == 'Approved') {
                    $_SESSION['lrn'] = $user;
                    echo "<script>alert('Logged In Successfully!')</script>";
                    echo "<script>window.location.href='student-landing-page.php'</script>";
                } else {
                    echo "<script>alert('Please wait, your account is being processed!')</script>";
                }
            } else {
                echo "<script>alert('Incorrect Password!')</script>";
            }
        } else {
            echo "<script>alert('Invalid LRN/Username or Password!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }   
        } else {
            $check_query = "SELECT * FROM coordinator WHERE `username` = ?;";
            $stmt = mysqli_prepare($mysqli, $check_query);
            mysqli_stmt_bind_param($stmt, 's', $user);
            mysqli_stmt_execute($stmt);
            $check_coor = mysqli_stmt_get_result($stmt);

            $check_query = "SELECT * FROM departments WHERE username = ?;";
            $stmt = mysqli_prepare($mysqli, $check_query);
            mysqli_stmt_bind_param($stmt, 's', $user);
            mysqli_stmt_execute($stmt);
            $check_dep = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($check_coor) == 1){
                $check_rowcoor = mysqli_fetch_assoc($check_coor);
                if(password_verify($pass, $check_rowcoor['pass'])){
                    $email = $check_rowcoor['email'];
                    $_SESSION['email'] = $email;
                    echo "<script>alert('Logged In Successfully!')</script>";
                    echo "<script>window.location.href='studentslist.php'</script>";
                } else{
                    echo "<script>alert('Invalid LRN/Username or Password!');</script>";
                }
            } elseif(mysqli_num_rows($check_dep) == 1){
                $check_rowdep = mysqli_fetch_assoc($check_dep);
                if(password_verify($pass, $check_rowdep['pass'])){
                    $id = $check_rowdep['ID'];
                    $_SESSION['department'] = $id;
                    echo "<script>alert('Logged In Successfully!')</script>";
                    echo "<script>window.location.href='department-studentslist.php'</script>";
                }else{
                    echo "<script>alert('Invalid LRN/Username or Password!');</script>";
                }
        } else {
            echo "<script>alert('Invalid LRN/Username or Password!');</script>";
            echo "<script>window.location.href='index.php'</script>";
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
    <title>Login</title>
    <style>
*{
    font-family: sans-serif;
    margin: 0;
    padding: 0;
  }
section{
    display: flex;
    justify-content: center;
    align-items: center;
}
.form-box{
    position: relative;
    width: 390px;
    height: 400px;
    background: #009688;
    border-radius: 5px;
    backdrop-filter: blue(15px);
    display: flex;
    justify-content: center;
    align-items: center;
}
p{
    font-size: 2em;
    color: #fff;
    text-align: center;
    line-height: 1.6;
    font-weight: bold;
}
.inputbox{
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;
}
.inputbox label{
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}
input:focus ~ label,
input:valid ~ label{
    top: 1px;
}
.inputbox input{
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #fff;
}
.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    top: 20px;
}
.forget{
    margin: -15px 0 15px;
    font-size: .9em;
    color: #fff;
    display: flex;
    justify-content: center;
}
.forget label input{
    margin-right: 3px;
}
.forget label a{
    color: #fff;
    text-decoration: none;
}
.forget label a:hover{
    text-decoration: underline;
}
input[type=submit]{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
}
.register{
    font-size: 9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}
.register  a{
    text-decoration: none;
    color: #fff;
    font-weight: 600;
}
.register p a:hover{
    text-decoration: underline;
}
.banner{
    width: 100%;
    height: 100vh;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 85%, rgba(0, 0, 0, 0.8) 100%), url(uploads/bg.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
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
    </style>
</head>
<body>
<div class="banner">
    <div class="navbar">
    <a href="index.php"><img src="uploads/logo1.png" alt="ICI logo"class="logo"></a>
    </div>
    <section>
        <div class="form-box">
            <div>
                <form action="index.php" method="post" autocomplete="off"> <br>
                    <p>User Login</p> 
                    <div class="inputbox">
                        <ion-icon name="recording-outline"></ion-icon>
                        <input autocomplete="off" type="text" name="user" required>
                        <label for="">LRN/Username:</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input autocomplete="off" type="password" name="pass"  required>
                        <label for="">Password:</label>
                    </div>

                    <input type="submit" value="LOG IN" name="Submit"> <br><br><br>

                      <div class="forget">
                        <label for="">Don't have an account? <a onclick="window.location.href='student-signup_page.php'"> Sign up here.</a></label>
                    </div>
                </form>
            </div>
        </div>
    </section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </div>


</body>
</html>
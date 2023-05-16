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
    include('capstone_database.php');

    $sequel = "SELECT * FROM students WHERE lrn = '" . $_POST['userid'] . "'";
    $query = mysqli_query($mysqli, $sequel);
    $students = mysqli_fetch_array($query);
?>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <small class="text-muted">Full Name</small>
        </div>
        <div class="col">
            <h7><?php echo ucfirst(strtolower($students['fname'])) . " " . ucfirst(strtolower($students['mname'])) . " " . ucfirst(strtolower($students['lname'])); ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Learner's Reference Number</small>
        </div>
        <div class="col">
            <h7><?php echo $students['lrn']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Block</small>
        </div><br>
        <div class="col">
            <h7><?php echo $students['block']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">School Year</small>
        </div>
        <div class="col">
            <h7><?php echo $students['schoolyear']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Date Registered</small>
        </div>
        <div class="col">
            <h7><?php echo nl2br(date_format(date_create($students['dateRegistered']), 'F d, Y' . " " . 'l')); ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Email</small>
        </div>
        <div class="col">
            <h7><?php echo $students['email']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Mobile Number</small>
        </div>
        <div class="col">
            <h7><?php echo $students['cpnum']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Address</small>
        </div>
        <div class="col">
            <h7><?php echo $students['homeaddress']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Civil Status</small>
        </div>
        <div class="col">
            <h7><?php echo $students['marital_status']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Religion</small>
        </div>
        <div class="col">
            <h7><?php echo $students['religion']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Nationality</small>
        </div>
        <div class="col">
            <h7><?php echo $students['nationality']; ?></h7>
        </div>
    </div>
</div>
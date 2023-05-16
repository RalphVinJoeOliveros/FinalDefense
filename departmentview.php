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
include "capstone_database.php";
$id = $_POST['userid'];
$query = "SELECT * FROM departments WHERE id = '$id'";
$result = mysqli_query($mysqli, $query);
$department = mysqli_fetch_array($result);
?>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <img src="uploads/<?php if($department['picture'] == ""){echo "silhouette.png";} else {echo $department['picture'];} ?>" width="150px" alt="" srcset="">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Industry Name</small>
        </div>
        <div class="col">
            <h7><?php echo strtoupper($department['department']); ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Email</small>
        </div>
        <div class="col">
            <h7><?php echo $department['email']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Address</small>
        </div><br>
        <div class="col">
            <h7><?php echo $department['address']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Telephone/Mobile Number</small>
        </div>
        <div class="col">
            <h7><?php echo $department['number']; ?></h7>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small class="text-muted">Facebook Name</small>
        </div>
        <div class="col">
            <h7><?php echo $department['fb']; ?></h7>
        </div>
    </div>
</div>

<?php 
session_start();
if(isset($_SESSION['email'])) {
  echo "<script>window.location='studentslist.php'; </script>";
  die();
}elseif(isset($_SESSION['department'])) {
  echo "<script>window.location='department-studentslist.php'; </script>";
  die();
} elseif(!isset($_SESSION['lrn'])) {
    echo "<script>window.location='index.php'; </script>";
    die();
}
include 'capstone_database.php';
include "navigation_bar.php";

$sql = "SELECT * FROM students WHERE lrn = '" . $_SESSION['lrn'] . "'";
$query = mysqli_query($mysqli, $sql);
$students = mysqli_fetch_array($query);

$sql1 = "SELECT * FROM departments WHERE ID = '" . $students['department'] . "'";
$check = mysqli_query($mysqli, $sql1);
$department = mysqli_fetch_array($check);

$sql2 = "SELECT * FROM coordinator WHERE `ID` = '" . $students['coordinator'] . "'";
$check1 = mysqli_query($mysqli, $sql2);
$coordinator = mysqli_fetch_array($check1);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Home</title>
    <style>
      
    .card{
    border: 0;
    }
    .picture{
      border-radius: 50%;
      border: 1px solid gray;
      position: relative;
      transform: translateX(-40%);
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    .box{
      width: 1000%;
      max-width: 600px;
      height: 130px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      display: flex;
      align-items: center;
      position: relative;
      top: 20px;
      background-color: #FFF;
    }
    .mname{
      transform: translateX(-10%);
    }
    .mlrn{
      transform: translateX(-10%);
    }
    .firsttable{
      border-collapse: collapse;
      position: relative;
      margin-left: 80px;
      margin-bottom: 30px;
    }
    .dep {
      transform: translateX(-8%);
    }
    .coor {
      transform: translateX(-10%);
    }
    .sched{
      position: relative;
      transform: translateX(4%);
      top: 15px;
    }
    .highlight1{
        color: #25B8B4;
        font-weight: 500;
    }
   .highlight2, .highlight3, .highlight5{
      color: black;
      font-weight: 500;
    }
    .circular-progress{
        position: relative;
        height: 200px;
        width: 200px;
        border-radius: 50%;
        background: conic-gradient(#1CC65F 3.6deg, #ededed 0deg);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .circular-progress::before{
        content: "";
        position: absolute;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        background-color:  #FFF;
    }
    .progress-value{
        position: relative;
        font-size: 25px;
        font-weight: 600;
        color: #498A63;
    }
    .text{
        font-size: 18px;
        font-weight: 500;
        color: #606060;
    }
    .container1{
        float: right;
        display: flex;
        width: 1000%;
        height: 295px;
        max-width: 600px;
        padding: 9px;
        border-radius: 8px;
        flex-direction: column;
        align-items: center;
        background-color: #FFF;
        position: relative;
        transform: translateY(-147%);
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        
    }
    .containerright{
      position: relative;
      transform: translateX(80%);
    }
    .containerleft{
      position: relative;
      transform: translateX(-40%);
      bottom: 140px;
    }
    .secondbox{
      width: 1000%;
      max-width: 600px;
      height: 130px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      display: block;
      align-items: center;
      position: relative;
      bottom: 430px;
      margin-left: 550px;
      background-color: #FFF;
    }

    form{
      height: 500px;
      width: 500px;
      border: 1px solid #ccc;
    }

  </style>
</head>
<body>
  <br><br>
  <div class="container">
  <div class="card">
  <div class="firsttable" style='margin-left: -40px;'> 
    <div class="box">
      <div>
        <img src="uploads/<?php echo $students['picture']; ?>" width="110" height="110" class="picture">
      </div>
      <div>
        <h4 class="mname" style='margin-top: 10px;'><?php echo $students['fname'] . "<br>" . $students['mname'] . " " . $students['lname']; ?></h4>
        <p class="mlrn">LRN: <?php echo $students['lrn']; ?></p>
      </div>
    </div>
  </div>
  <div class="firsttable" style='margin-left: -40px;'>
    <div class="box">
      <div>
        <img src="uploads/<?php if($students['department'] == ""){ echo "silhouette.png";} else { echo $department['picture']; }?>" width="110" height="110" class="picture">
      </div>
      <div>
        <p class="dep">Assigned Industry:</p>
        <h4 class="dep">
          <?php 
            if($students['department'] == ""){
              echo "N/A";
              } else {
                  echo strtoupper($department['department']);
              }
        ?>
        </h4>
      </div>
    </div>
  </div>
  <div class="firsttable" style='margin-left: -40px;'>
    <div class="box">
      <div>
        <img src="uploads/<?php echo $coordinator['picture']; ?>" width="110" height="110" class="picture">
      </div>
      <div>
        <p class="coor">OJT Coordinator:</p>
        <h4 class="coor"><?php echo $coordinator['first_name'] . " " . $coordinator['last_name']; ?></h4>
      </div>
    </div>
<div class="firsttable">
    <div class="secondbox">
        <p class="sched">Schedule of OJT: <b><?php if($students['startdate'] == "0000-00-00"){ null;} else {echo date_format(date_create($students['startdate']),  'F d, Y' . "\n" . 'l');} ?></b></p>
        <h3 class="sched"><?php echo $students['schedule']; ?></h3>
    </div>
</div>
  </div>
  <div class="container1" style='margin-left: 595px; margin-top: -30px;'>
  <span><h2>Progress</h2></span><br>
  <div class="containerright">
    <div class="circular-progress">
      <span class="progress-value">0</span>    
  </div>
</div>
  <div class="containerleft">
  <?php
    $lrn = $_SESSION['lrn'];
      $newsql = "SELECT * FROM students WHERE lrn = '$lrn'";
      $newresult = mysqli_query($mysqli, $newsql);
      $row = mysqli_fetch_array($newresult);
      $req = $row['hrs'];

      $sqlcomp = "SELECT SUM(numofhrs) AS total FROM dtr WHERE lrn = '$lrn' AND (remarks = 'Approved' or remarks = '')";
      $resultcomp = mysqli_query($mysqli, $sqlcomp);
      $rowcomp = mysqli_fetch_array($resultcomp);
      $comp = $rowcomp['total'];
    ?>
      <span class="text">Number of Hours Required: <?php echo $req ?> Hours</span><br>
      <span class="text">Number of Hours Remaining: <?php echo max($req - $comp, 0) ?> Hours</span>
  </div>
</div>  
<script>
  let circularProgress = document.querySelector(".circular-progress"),
    progressValue = document.querySelector(".progress-value");

  let progressStartValue = 0,
      totalProgress = <?php echo $req; ?>,
      progressEndValue =<?php echo $comp * (100 / $req); ?>,    
      speed = 10;
      
  let progress = setInterval(() => {
      progressStartValue++;
      const hours = Math.floor(progressStartValue * <?php echo $req / 100; ?>);
      progressValue.textContent = `${hours} Hour/s`;
      
      circularProgress.style.background = `conic-gradient(#1CC65F ${progressStartValue * 3.6}deg, #ededed 0deg)`;

      if(progressStartValue >= progressEndValue) {
          clearInterval(progress);
      }    
}, speed);
</script>
</div>
</div></body>
</html>
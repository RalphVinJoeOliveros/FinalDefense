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
    include('capstone_database.php');
    include('navigation_bar.php');

    $sequel = "SELECT * FROM students where lrn = '" . $_SESSION['lrn'] . "'";
    $check = mysqli_query($mysqli, $sequel);
    $department = mysqli_fetch_array($check)['department'];
    if($department == ""){ 
        null;
    } else {
    $sql = "SELECT * FROM departments WHERE id = '$department'";
    $query = mysqli_query($mysqli, $sql);
    $dep = mysqli_fetch_array($query);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Contacts</title>
    <style>
        .highlight5{
        color: #25B8B4;
        font-weight: 500;
    }
   .highlight2, .highlight1, .highlight3{
      color: black;
      font-weight: 500;
    }
    </style>
</head>
<body>
    <br><br>
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OJT Industry Contact Information</h5>
                    <div class="text-center">
                        <img src="uploads/<?php if($dep['picture'] == ""){ echo "silhouette.png";} else { echo $dep['picture']; } ?>" alt="teacher" width="100px" height="100px" class="rounded">
                    </div>
                        <small class="text-muted">Industry Name</small>
                            <h6><?php echo $dep['department'] ?></h6>
                        <small class="text-muted p-t-30 db">Industry Address</small>
                            <h6><?php if($dep['address'] == ""){ echo "N/A";} else {echo $dep['address'];} ?></h6>
                        <small class="text-muted p-t-30 db">Facbook Name/Facebook Page</small>
                            <h6><?php if($dep['fb'] == ""){ echo "N/A";} else {echo $dep['fb'];} ?></h6>
                        <small class="text-muted p-t-30 db">Email Address</small>
                            <h6><?php if($dep['email'] == ""){ echo "N/A";} else {echo $dep['email'];} ?></h6>
                        <small class="text-muted p-t-30 db">Phone Number/Telephone Number</small>
                            <h6><?php if($dep['number'] == ""){ echo "N/A";} else {echo "+63 " . $dep['number'];} ?></h6>
                </div>
            </div>
        </div>
        <?php
        }
        
        $sequel = "SELECT * FROM students where lrn = '" . $_SESSION['lrn'] . "'";
        $check = mysqli_query($mysqli, $sequel);
        $coordinator = mysqli_fetch_array($check)['coordinator'];
        if($coordinator == ""){ 
            null;
        } else {
        $sql = "SELECT * FROM coordinator WHERE id = '$coordinator'";
        $query = mysqli_query($mysqli, $sql);
        $coor = mysqli_fetch_array($query);
        ?>
        <br><br>
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OJT Coordinator Contact Information</h5>
                    <div class="text-center">
                        <img src="uploads/<?php if($coor['picture'] == ""){ echo "silhouette.png";} else { echo $coor['picture']; } ?>" alt="teacher" width="100px" height="100px" class="rounded">
                    </div>
                        <small class="text-muted">Coordinator's Name</small>
                            <h6><?php echo $coor['first_name'] . " " . $coor['last_name'] ?></h6>
                        <small class="text-muted p-t-30 db">Current Address</small>
                            <h6><?php if($coor['address'] == ""){ echo "N/A";} else {echo $coor['address'];} ?></h6>
                        <small class="text-muted p-t-30 db">Facbook Name/Facebook Page</small>
                            <h6><?php if($coor['fb_name'] == ""){ echo "N/A";} else {echo $coor['fb_name'];} ?></h6>
                        <small class="text-muted p-t-30 db">Email Address</small>
                            <h6><?php if($coor['email'] == ""){ echo "N/A";} else {echo $coor['email'];} ?></h6>
                        <small class="text-muted p-t-30 db">Phone Number/Telephone Number</small>
                            <h6><?php if($coor['cpnum'] == ""){ echo "N/A";} else {echo "+63 " . $coor['cpnum'];} ?></h6>
                </div>
                <?php
        }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
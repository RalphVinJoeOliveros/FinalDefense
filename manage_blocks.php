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
include "blocks_modal.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css"/>
    <title>Manage Blocks</title>
    <style>
                .highlight3{
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
                    <h5 class="card-title">List of Blocks Registered</h5>
                    <table class="table table-striped table-bordered" id="blocks_table">
                        <thead>
                        <tr>
                            <th>Grade Level and Block</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $sql = "SELECT * FROM student_block";
                        $query = mysqli_query($mysqli, $sql);
                        while($result = mysqli_fetch_array($query)) {
                            $sequel = "SELECT * FROM students WHERE `block` = '" . $result['student_block'] . "'";
                            $query2 = mysqli_query($mysqli, $sequel);
                            $count = mysqli_num_rows($query2);
                            echo "<tr>";
                            echo "<td>";
                            echo strtoupper($result['student_block']);
                            echo "</td>";
                            echo "<td>";
                            if($count == 0) {
                                echo "<a href='' class='del-btn' data-toggle='modal' data-target='#delModal' data-id='" . $result['student_block'] . "'>Delete</a>";
                            } else {
                                echo "<a href='' onclick=\"alert('You are not eligible to delete this block because there are currently $count student(s) associated with it.')\">Delete</a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                    </table>
                </div>  
            </div>
        </div>
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register new Blocks</h5>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control text-uppercase" placeholder="Please type the block" id="register_block" name="register_block" aria-describedby="register_block" required>
                            <small id="register_blockHelp" class="form-text text-muted">Example: G11.IT1</small>
                        </div>
                        <?php
                            if(isset($_POST['register_block_btn'])) {
                                $register_block = trim(strtoupper($_POST['register_block']));
                                register_block($mysqli, $register_block);
                            }
                        ?>
                        <button type="submit" class="btn btn-success" name="register_block_btn">Register Block</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<br><br>

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
            echo "<script>alert('Grade Level and Block already exists in the system, please try another one.'); window.location='manage_blocks.php';</script>";
        } else {
            $sql = "INSERT INTO student_block (student_block) VALUES ('$register_block')";
            if(mysqli_query($mysqli, $sql)) {
                echo "<script>alert('Grade Level and Block successfully registered.'); window.location='manage_blocks.php';</script>";
            } else {
                echo "<script>alert('Grade Level and Block registration failed.'); window.location='manage_blocks.php';</script>";
            }
        }
    }
?>
  </body>
</html>
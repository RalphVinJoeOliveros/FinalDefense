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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>View</title>
<style>
 
h1{
    font-size: 2.5em;
    color: #000;
}
header{
    position: sticky;
    top: 0;
    height:70px;
    width: 100%;
    background: #205E61;
}
.credits{
    color: black;
}
.highlight1{
        color: #25B8B4;
        font-weight: 500;
    }
    .clearfix{
	clear: both;
}
.main{
	height: auto;
	width: 800px;
	margin: 20px auto;

}

.top-section{
	background-color:#151b29;
	text-align: center;
	padding: 20px;
}
.profile{
	width: 150px;
	border-radius: 50%;
}
.p1{
	color: white;
	font-size: 40px;
	font-weight: bold;
	margin: 0px;
	margin-top: 10px;
}
.p1 span{
	font-weight: 100;
	color: #c7c7c7;
}
.p2{
	font-size: 30px;
	color: #c7c7c7;
	margin: 0px;
	margin-top: 10px;
}
.col-div-4{
	width: 35%;
	float: left;

}
.col-div-8{
	width: 62%;
	float: left;
}
.line{
	border-left: 1px solid #c7c7c7;
  height: 900px;
  width: 2%;
  margin-top: 30px;
  float:left;
}
.content-box{
	padding: 20px;
}
.head{
	font-size: 18px;
	text-transform: uppercase;
	font-weight: 600;
}
.p3{
	color: #7b7b7b;
	margin-bottom: 5px;
	font-size: 15px;
}
.fa{
	color: #151b29;
	font-size: 20px;
}
.skills{
	margin-left: -20px;
	    margin-bottom: 0px;
}
.skills li{
	padding: 5px;
}
.skills li span{
	color: #7b7b7b;
}
h6{
	margin-bottom: -10px;
}

h1{
    font-size: 2.5em;
    color: #000;
}
.highlight1{
        color: #25B8B4;
        font-weight: 500;
    }
    h5{
        font-size: 17px;
        margin-bottom: 0;
    }

    p{
    margin-left: 20px;
 }
 a:hover{
    text-decoration: none;
 }
 .credits {
    color: gray;
 }
.box{
    height: 250px;
    width: 255px;
    border: 1px solid #ccc;
    margin: 3px;
}

.inf{
    width: 800px;
}
.card{
    margin: 3px;
    height: 200px;
    width: 250px;
}
    .nav-link:hover {
        color: blue;
    }
</style>
</head>
<body>
<div class="top-section">
    <?php
        $id = $_GET['lrn'];
        $sequel = "SELECT * FROM students WHERE lrn = '$id'";
        $result = mysqli_query($mysqli, $sequel);
        $row = mysqli_fetch_assoc($result);
    ?>
    <img src="uploads/<?php if($row['picture'] == null){ echo "silhouette.png"; } else {echo $row['picture'];} ?>" class="profile" />
    <p class="p1"><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname']; ?></span></p>
    <p class="p2">Intern Student</p>
</div>
<br>
<div>
<div>
<div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a style='font-size: 18px;' class="nav-link active" id="home-tab" data-toggle="tab"  data-bs-target="#home" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile Info</a>
        </li>
        <li class="nav-item" role="presentation">
            <a style='font-size: 18px;' class="nav-link" id="dtr-tab" data-toggle="tab"  data-bs-target="#dtr" href="#dtr" role="tab" aria-controls="dtr" aria-selected="true">DTR Report</a>
        </li>
        <li class="nav-item" role="presentation">
            <a style='font-size: 18px;' class="nav-link" id="week-tab" data-toggle="tab"  data-bs-target="#week" href="#week" role="tab" aria-controls="week" aria-selected="true">Weekly Report</a>
        </li>
        <li class="nav-item" role="presentation">
            <a style='font-size: 18px;' class="nav-link" id="evaluation-tab" data-toggle="tab"  data-bs-target="#evaluation" href="#evaluation" role="tab" aria-controls="evaluation" aria-selected="false">Evaluation</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="main">
                        <?php
                        	$id = $_GET['lrn'];
                            $sequel = "SELECT * FROM students WHERE lrn = '$id'";
                            $result = mysqli_query($mysqli, $sequel);
                            $row = mysqli_fetch_assoc($result);
                        ?>
					<div class="row">
					<div class="col">
						<div class="content-box" style="padding-left: 40px;">	
						<p class="head">Contact:</p><hr>
						<p class="p3"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $row['cpnum'] ?></p>
						<p class="p3"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $row['email'] ?></p>
						<p class="p3"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $row['homeaddress'] ?></p>
						<br/>
						<p class="head">MY SKILLS:</p>
						<ul class="skills">
							<?php echo "• " . str_replace(',', '<br>•', $row['skills'])  ?>
						</ul>
						<br>
						<br>
						<br>
						<p class="head" style="margin-top: -20px;">QUALIFICATIONS:</p>
						<ul class="skills">
							<?php echo "• " . str_replace(',', '<br>•', $row['qualifications'])  ?>	
						</ul>
						<br>
						<br>
						<br>
						<p class="head" style="margin-top: -20px;">CHARACTER REFERENCE:</p>
						<ul class="skills">
							<?php 
								echo "<b>" . $row['cr1name'] . "</b><br><hr>";
								echo $row['cr1relation'] . "<br>";
								echo $row['cr1info'] . "<br>";
							?>
						</ul>
						<br><br>
						<ul class="skills">
							<?php 
								echo "<b>" . $row['cr2name'] . "</b><br><hr>";
								echo $row['cr2relation'] . "<br>";
								echo $row['cr2info'] . "<br>";
							?>
						</ul>
						</div>
					</div>
					<div class="line"></div>
					<div class="col">
						<div class="content-box">

						<p class="head">Personal Information:</p><hr>

						<h6>DATE OF BIRTH:</h6>
						<p class="p-4"><?php echo date_format(date_create($row['bdate']), "F d, Y") ?></p>

						<h6>PLACE OF BIRTH:</h6>
						<p class="p-4"><?php echo $row['placeofbirth'] ?></p>

						<h6>NATIONALITY:</h6>
						<p class="p-4"><?php echo $row['nationality'] ?></p>

						<h6>GENDER:</h6>
						<p class="p-4"><?php echo $row['Gender'] ?></p>

						<h6>CIVIL STATUS:</h6>
						<p class="p-4"><?php echo $row['marital_status'] ?></p>

						<h6>RELIGION:</h6>
						<p class="p-4"><?php echo $row['religion'] ?></p>

						<h6>HEIGHT:</h6>
						<p class="p-4"><?php echo $row['height'] . " cm" ?></p>
						</div>
					</div>
					</div>
				</div>
				</div>
            <div class="tab-pane fade" id="dtr" role="tabpanel" aria-labelledby="dtr-tab">
                <br><h1 align = "center">OJT DAILY TIME RECORD</h1><br>
                <table align = "center" style='border-collapse: collapse; width: 1300px;'> 
                    <?php
                    function dtr(){
                        function hrsRemaining() {
                            global $mysqli;
                            
                            function formatTime($hours, $minutes) {
                                $formatted_hours = sprintf('%02d Hr(s)', $hours);
                                $formatted_minutes = sprintf('%02d Min(s)', $minutes);
                                return $formatted_hours . ' ' . $formatted_minutes;
                            }
                        
                            $lrn = $_GET['lrn'];
                            $mysequel = "SELECT * FROM students WHERE lrn = '$lrn'";
                            $query = mysqli_query($mysqli, $mysequel);
                            $students = mysqli_fetch_array($query);
                            $required_hours = $students['hrs'];
                        
                            $mysequel = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIME(numofhrs)))) AS total_time FROM dtr WHERE lrn = '$lrn' AND (remarks = 'Approved' OR remarks = '')";
                            $query = mysqli_query($mysqli, $mysequel);
                            $dtr = mysqli_fetch_array($query);
                            $total_time = $dtr['total_time'];
                        
                            // Extract total hours and minutes from the total time
                            $time_parts = explode(':', $total_time);
                
                            if (count($time_parts) >= 2) {
                                $total_hours = (int) $time_parts[0];
                                $total_minutes = (int) $time_parts[1];
                            } else {
                                // Handle the case when $time_parts doesn't have enough elements
                                // You can assign default values or display an error message
                                $total_hours = 0;
                                $total_minutes = 0;
                            }
                            
                        
                            // Calculate remaining hours and minutes
                            $remaining_hours = $required_hours - $total_hours - 1;
                            $remaining_minutes = 60 - $total_minutes;
                        
                            // Adjust remaining hours and minutes if necessary
                            if ($remaining_minutes >= 60) {
                                $remaining_hours++;
                                $remaining_minutes -= 60;
                            }
                        
                            // Format the remaining hours and minutes
                            $formatted_remaining_time = formatTime($remaining_hours, $remaining_minutes);
                        
                            return "<p>" . $formatted_remaining_time . "</p>";
                        }
                    
                        $lrn = $_GET['lrn'];
                        if(isset($lrn)){         
                            global $mysqli;
                            $mysequel = "SELECT * FROM students where lrn = '" . $lrn . "'";
                            $query = mysqli_query($mysqli, $mysequel);

                            while($students = mysqli_fetch_array($query)){
                                echo "<tr>"; 
                                echo "<td style=' width: 400px; text-align: center; font-size: 18px; background-color: #f2f2f2; border: 1px solid #ddd; height: 90px; line-height: 2; text-align: center;'><strong>Block:</strong><br>" . $students['block'] . " </td>";
                                echo "<td style=' width: 400px; text-align: center; font-size: 18px; background-color: #f2f2f2; border: 1px solid #ddd; height: 90px; line-height: 2; text-align: center;'><strong>Start Date:</strong><br>" . date_format(date_create($students['startdate']), "F d, Y") . " </td>";                          
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td style=' width: 400px; text-align: center; font-size: 18px; background-color: #f2f2f2; border: 1px solid #ddd; height: 90px; line-height: 2; text-align: center;'><strong>No. of Hours Required:</strong><br>" . $students['hrs'] . " </td>";
                                echo "<td style=' width: 400px; text-align: center; font-size: 18px; background-color: #f2f2f2; border: 1px solid #ddd; height: 90px; line-height: 2; text-align: center;'><strong>No. of Hours Remaining:</strong><br>" . hrsRemaining($lrn) . " </td>";
                                echo "</tr>";

                            }
                        }   
                    }
                dtr();
                ?>
                </table>
                <br><br>
                <table align=center class="table table-striped" id="dtrprint" style="width: 1300px;">
                <thead>
                    <tr style='background-color: lightgray;'>
                        <th>DATE</th>
                        <th>TIME IN</th>
                        <th>TIME OUT</th>
                        <th>TOTAL HOURS</th>
                        <th>REMARKS</th>
                        <th>OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        function records(){   
                            function lrn(){
                                global $mysqli;
                                $lrn = $_GET['lrn'];
                                if(isset($lrn)){         
                                    $mysequel = "SELECT * FROM students where lrn = '" . $lrn . "'";
                                    $query = mysqli_query($mysqli, $mysequel);
                        
                                    $students = mysqli_fetch_array($query);
                                    $lrn = $students['lrn'];
                                        return $lrn;
                                }
                            }
                        
                            $lrn = lrn();
                        
                            GLOBAL $mysqli;
                            $mysequel = "SELECT * FROM dtr WHERE lrn = $lrn ORDER BY date_ ASC";
                            $query = mysqli_query($mysqli, $mysequel);
                                while($dtr = mysqli_fetch_array($query)){
                                    echo "<tr>";
                                    echo "<td>" . nl2br(date_format(date_create($dtr['date_']), 'F d, Y' . " " . 'l')) . "</td>";
                                    echo "<td>" . date_format(date_create($dtr['time_in']), 'h:i A') . "</td>";
                                    echo "<td>" . date_format(date_create($dtr['time_out']), 'h:i A') . "</td>";
                                    echo "<td>" . $dtr['numofhrs'] . " hrs" . "</td>";
                                    echo "<td>" . $dtr['remarks'] . "</td>";
                                    echo "<td align='center'>";
                                    echo "<button type='button' class='btn btn-sm btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $dtr['id'] . "'>Edit</button</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            records();
                    ?>
                </tbody>
                </table>
                <br><br>
            </div>
        <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="week-tab">
            <br><h1 align=center>On-the-Job Trainee Weekly Report Form</h1>
            <div class="table3">
            <table align=center style="width: 1300px;" class="table table-striped" id="weekly"><br>
                <thead>
                <tr align="left" style='background-color: lightgray;'>
                    <th style='width: 100px;'>
                    <h5>Week #:</h5>    
                    </th>
                    <th>
                    <h5>Date:</h5>    
                    </th>
                    <th>
                    <h5>Hours:</h5>    
                    </th>
                    <th style='width: 250px;'>
                    <h5>Description of Tasks:</h5>    
                    </th>
                    <th>
                    <center><h5>Progress:</h5> </center>   
                    </th>
                    <th>
                    <center><h5>Remarks:</h5> </center>    
                    </th>
                    <th>
                    <center><h5>Operation:</h5>  </center>  
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                    function weeklyreportdata(){ 
                        $lrn = lrn();

                        GLOBAL $mysqli;
                        $mysequel = "SELECT * FROM weeklyreport WHERE lrn = $lrn ORDER BY date_ ASC";
                        $query = mysqli_query($mysqli, $mysequel);

                        while($weeklyreport = mysqli_fetch_array($query)){
                            echo "<tr>";
                            echo "<td>&nbsp;" . $weeklyreport['weeknum'] . "</td>";
                            echo "<td>" . date_format(date_create($weeklyreport['date_']), 'F d, Y'. " " . 'l') . "</td>";
                            echo "<td>" . $weeklyreport['hrs'] . " hrs</td>";  
                            echo "<td>" . $weeklyreport['descript_of_task'] . "</td>";
                            echo "<td><center>" . $weeklyreport['Progress'] . "</center></td>";
                            echo "<td><center>" . $weeklyreport['remarks'] . "</center></td>";
                            echo "<td>";
                            echo "<center><button type='button' class='btn btn-sm btn-primary weekly-btn' data-toggle='modal' data-target='#weeklyModal' data-id='" . $weeklyreport['id'] . "'>Edit</button</a>";
                            echo "<center></td>";
                            echo "</tr>";
                        }
                    }
                    weeklyreportdata();
                ?>
                </tbody>
            </table>
            <br><br>
        </div>
    </div>
        <div class="tab-pane fade" id="evaluation" role="tabpanel" aria-labelledby="evaluation-tab">
            <?php
                $sequel = "SELECT * FROM evaluation WHERE lrn = '" . $_GET['lrn'] . "'";
                $result = mysqli_query($mysqli, $sequel);
                $row = mysqli_fetch_array($result);
            ?>
            <br><h1 align=center>TRAINEE'S PERFORMANCE EVALUATION</h1><br>
        <div class="container" >
           <div class="container-fixed" style='margin-left: -120px;'>
         
            <div class="text-left p-3">
                <h4 style='margin-left: 50px;'>Total Percentage: <?php echo $row['total'] . "%"; ?></h4>
            </div>
   <div style='display: flex;'>
            <form action="" method="POST">
                <div style='display: flex;'>
                    <div class="card mb-3" style="margin-left: 40px;">
                        <div class="card-body" style='height: 160px;'>
                            <h5 style='font-size: 14px;' class="card-title">Job Knowledge <i>(15%)</i></h5>
                            <p style='font-size: 12px; margin-top: -4px;' class="card-text">(skill level, knowledge & understanding of all phases of the job)</p>
                        </div>
                    <div class="card-header"><center><b><input class="form-control" style='width: 150px;' type="number" name="jobKnowledge" min='0' max='15' value="<?php echo $row['jobKnowledge'];?>" required></b></center></div>
                </div>
                <div class="card mb-3">
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Quality of Work <i>(15%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(accuracy, completeness & follow through of work)</p>
                    </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="qualityOfWork" min='0' max='15' value="<?php echo $row['qualityOfWork'];?>" required></b></center>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Quantity of Work <i>(15%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(volume of work accomplished, able to complete work on time)</p>
                    </div>
                    <div class="card-header"><center><b><input class="form-control" style='width: 150px;' type="number" name="quantityOfWork" min='0' max='15' value="<?php echo $row['quantityOfWork'];?>" required></b></center>
                    </div>
                </div>
                <div class="card mb-3"  >
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Dependability <i>(10%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(complete required task with minimum supervision)</p>
                    </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="dependability" min='0' max='10' value="<?php echo $row['dependability'];?>" required></b></center>
                    </div>
                </div>
                <div class="card mb-3"  >
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Initiative <i>(10%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(resourcefulness, creativity to formulate & propose innovative solutions)</p>
                    </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="initiative" min='0' max='10' value="<?php echo $row['initiative'];?>" required></b></center>
                    </div>
                </div>
            </div>
            <div style='display: flex;'>
                <div class="card mb-3" style="  margin-left: 40px;">
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Conduct <i>(10%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(observes courtesy, politeness)</p>
                    </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="conduct" min='0' max='10' value="<?php echo $row['conduct'];?>" required></b></center></div>
                    </div>
                    <div class="card mb-3"  >
                        <div class="card-body" style='height: 160px;'>
                            <h5 style='font-size: 14px;' class="card-title">Decision-Making <i>(10%)</i></h5>
                            <p style='font-size: 12px; margin-top: -4px;' class="card-text">(Sound decision, ability to identify and evaluate pertinent factors)</p>
                        </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="decisionMaking" min='0' max='10' value="<?php echo $row['decisionMaking'];?>" required></b></center>
                    </div>
                </div>
                <div class="card mb-3"  >
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Interpersonal Skills <i>(5%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(Working relationship with other employees and other trainees)</p>
                    </div>
                <div class="card-header">
                    <center><b><input class="form-control" style='width: 150px;' type="number" name="interpersonalSkills" min='0' max='5' value="<?php echo $row['interpersonalSkills'];?>" required></b></center></div>
                </div>
                <div class="card mb-3"  >
                    <div class="card-body" style='height: 160px;'>
                        <h5 style='font-size: 14px;' class="card-title">Attendance <i>(5%)</i></h5>
                        <p style='font-size: 12px; margin-top: -4px;' class="card-text">(Regular and punctuality in office attendance & proper observation of breaktime period)</p>
                    </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="attendance" min='0' max='5' value="<?php echo $row['attendance'];?>" required></b></center></div>
                    </div>
                    <div class="card mb-3"  >
                        <div class="card-body" style='height: 160px;'>
                            <h5 style='font-size: 13px;' class="card-title">Personal Appearance <i>(5%)</i></h5>
                            <p style='font-size: 12px; margin-top: -4px;' class="card-text">(adheres to company dress code; has a personal bearing)</p>
                    </div>
                    <div class="card-header">
                        <center><b><input class="form-control" style='width: 150px;' type="number" name="personalAppearance" min='0' max='5' value="<?php echo $row['personalAppearance'];?>" required></b></center>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="display: flex; padding: 10px;">
                <div class="card border mb-3" style="width: 400px; height: 250px; margin-left: 915px; margin-top: -40px;">
                    <div class="card-header"><h5> Evaluated by:</h5></div>
                        <div class="card-body text-secondary">
                            <h5 style='margin-top: -10px;' class="card-title">Name: </h5><p style='font-size: 20px; color: black;' class="card-text"><input class="form-control" type="text" name="supervisor" value="<?php echo $row['supervisor']; ?>"></p>
                            <h5 class="card-title">Designation: </h5><p style='font-size: 20px; color: black;' class="card-text"><input class="form-control" type="text" name="designation" value="<?php echo $row['designation']; ?>"></p>
                        </div>
                    </div>
                    <div class="card border mb-3" style="width: 420px; height: 250px; margin-left: 40px; margin-top: -265px;">
                        <div class="card-header">Feedbacks for the trainee:</div>
                            <div class="card-body text-secondary">
                                 <p style='font-size: 18px; color: black;' class="card-text"><textarea class="form-control" style='margin-left: -36px; height: 180px; width: 410px; margin-top: -10px;' name="feedback" id=""><?php echo $row['feedback']; ?></textarea></p>
                            </div>
                        </div>
                        <div class="card border mb-3" style="width: 420px; height: 250px; margin-left:  478px; margin-top: -265px;">
                            <div class="card-header">Recommendation for the trainee's growth:</div>
                                <div class="card-body text-secondary">
                                    <p style='font-size: 18px; color: black;' class="card-text"><textarea class="form-control" style='margin-left: -36px; height: 180px; width: 410px; margin-top: -10px;' name="recommend" id=""><?php echo $row['recommend']; ?></textarea></p>
                                </div>
                            </div>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $row['lrn']; ?>">
                            <br><center><input type="submit" value="Update" name="updateeval" class="btn btn-primary"></center><br>
                    <br></form>
                </div>
                </div>
                    </div>
                </div>
            </div>
</body>
</html>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 650px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="edit-body"> 

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="weeklyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 650px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="weekly-body"> 

        </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
        $(document).ready(function(){
            $('.edit-btn').click(function() {
                var userid = $(this).data('id');
                $.ajax({
                url: 'edit.php',
                type: 'post',
                data: {userid: userid},
                success: function(response) {
                    $('.edit-body').html(response);
                    $('#editModal').modal('show');
                }  
                });
            });
            $('.weekly-btn').click(function() {
            var userid = $(this).data('id');
            $.ajax({
              url: 'weeklyinfo_edit.php',
              type: 'post',
              data: {userid: userid},
              success: function(response) {
                $('.weekly-body').html(response);
                $('#weeklyModal').modal('show');
              }  
            });
          });
        });

$('.nav-tabs a').on('click', function(e) {
  var tabId = $(this).attr('href');
  sessionStorage.setItem('activeTab', tabId);
  var activeTabId = sessionStorage.getItem('activeTab');
});

var activeTabId = sessionStorage.getItem('activeTab');
var lrn = sessionStorage.getItem('lrn');
if (activeTabId) {
  $('.nav-tabs a[href="' + activeTabId + '"]').tab('show');
}
    </script>
    <?php
    if(isset($_POST['update'])){
        $remarks = $_POST['remarks'];
        $lrn = $_POST['lrn'];
        $id = $_POST['id'];

        $sequel = "UPDATE dtr SET `remarks` = '$remarks' WHERE `id` = '$id'";
        $query = mysqli_query($mysqli, $sequel);
        if($query){
            echo "<script>alert('Remarks Updated!');</script>";
            echo "<script>window.location.href='dep-view.php?lrn=$lrn';</script>";
    } else {
        echo "<script>alert('Remarks Not Updated!');</script>";
        echo "<script>window.location.href='dep-view.php?lrn=$lrn';</script>";
    }
}
if(isset($_POST['updateweekly'])){
    $remarks = $_POST['remarks'];
    $lrn = $_POST['lrn'];
    $id = $_POST['id'];

    $sequel = "UPDATE weeklyreport SET remarks = '$remarks' WHERE lrn = '$lrn' AND id = '$id'";
    $query = mysqli_query($mysqli, $sequel);
    if($query){
        echo "<script>alert('Remarks Updated!');</script>";
        echo "<script>window.location.href='dep-view.php?lrn=$lrn';</script>";
}
}
if(isset($_POST['updateeval'])){
  $id = $_POST['id'];
  $jobKnowledge = $_POST['jobKnowledge'];
  $qualityOfWork = $_POST['qualityOfWork'];
  $quantityOfWork = $_POST['quantityOfWork'];
  $dependability = $_POST['dependability'];
  $initiative = $_POST['initiative'];
  $conduct = $_POST['conduct'];
  $decisionMaking = $_POST['decisionMaking'];
  $interpersonalSkills = $_POST['interpersonalSkills'];
  $attendance = $_POST['attendance'];
  $personalAppearance = $_POST['personalAppearance'];
  $feedback = $_POST['feedback'];
  $recommend = $_POST['recommend'];
  $supervisor = $_POST['supervisor'];
  $designation = $_POST['designation'];
  
  function total($jobKnowledge, $qualityOfWork, $quantityOfWork, $dependability, $initiative, $conduct, $decisionMaking, $interpersonalSkills, $attendance, $personalAppearance){
    $total = $jobKnowledge + $qualityOfWork + $quantityOfWork + $dependability + $initiative + $conduct + $decisionMaking + $interpersonalSkills + $attendance + $personalAppearance;
    return $total;
  }

  $total = total($jobKnowledge, $qualityOfWork, $quantityOfWork, $dependability, $initiative, $conduct, $decisionMaking, $interpersonalSkills, $attendance, $personalAppearance);

  $sequel = "UPDATE evaluation SET jobKnowledge = '$jobKnowledge', qualityOfWork = '$qualityOfWork', quantityOfWork = '$quantityOfWork', dependability = '$dependability', initiative = '$initiative', conduct = '$conduct', decisionMaking = '$decisionMaking', interpersonalSkills = '$interpersonalSkills', attendance = '$attendance', personalAppearance = '$personalAppearance', total = '$total', feedback = '$feedback', recommend = '$recommend', supervisor = '$supervisor', designation = '$designation' WHERE lrn = '$id'";
  $result = mysqli_query($mysqli, $sequel);

    if($result){
        echo "<script>alert('Successfully Evaluated!');</script>";
        echo "<script>window.location.href='dep-view.php?lrn=$id';</script>";
    } else {
        echo "<script>alert('Evaluation Not Updated!');</script>";
        echo "<script>window.location.href='dep-view.php?lrn=$id';</script>";
    }
}
    ?>



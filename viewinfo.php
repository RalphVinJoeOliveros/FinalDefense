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
    include 'capstone_database.php';
	$id = $_POST['userid'];
    $sequel = "SELECT * FROM students WHERE lrn = '$id'";
    $result = mysqli_query($mysqli, $sequel);
    $row = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<style>
.clearfix{
	clear: both;
}
.main{
	height: auto;
	width: 100%;
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
	margin-left: -15px;
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
header{
    position: sticky;
    top: 0;
    height:70px;
    width: 100%;
    background: #205E61;
}
.dtrtable table{
    border-collapse: collapse;
    width: 1100px;
}
.dtrtable table td{

    line-height: 2;
    text-align: center;  
    font-size: 18px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
}
.table2 tr:nth-child(even){
        background-color: #f2f2f2;
}
.table2 table{
    height: 30px;
    border-collapse: collapse;
}
.table2 table th{
    padding: 10px;
    height: 20px;
    color: black;
    background: lightgray;
}
.table2 table td{
    height: 90px;
    padding: 10px;
    width: 0;
}
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
.weeklyreport table{
    border-collapse: collapse;
}
.weeklyreport table td{
    width: 400px;
    padding: 20px;
    line-height: 1;
    text-align: center;  
    font-size: 18px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
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
.inf td{
 border: 1px solid #ccc;
font-size: 18px;
padding: 18px;
}
.inf{
    width: 800px;
}
.card1{
    margin: 3px;
    height: 200px;
    width: 250px;
}
.dataTables_wrapper .dt-buttons {
            text-align: center !important;
            margin-bottom: 5px;
}
</style>
	<div class="main">
		<div class="top-section">
			<img src="uploads/<?php if($row['picture'] == null){ echo "silhouette.png"; } else {echo $row['picture'];} ?>" class="profile" />
			<p class="p1"><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname']; ?></span></p>
			<p class="p2">Intern Student</p>
		</div>
<br>
				<div class="row">
			<div class="col">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<a style='font-size: 18px;' class="nav-link active" id="Resume-tab" data-toggle="tab" href="#Resume" role="tab" aria-controls="Resume" aria-selected="true">Profile</a>
				</li>
				<li class="nav-item" role="presentation">
					<a style='font-size: 18px;' class="nav-link" id="DTR-tab" data-toggle="tab" href="#DTR" role="tab" aria-controls="DTR" aria-selected="false">DTR Report</a>
				</li>
				<li class="nav-item" role="presentation">
					<a style='font-size: 18px;' class="nav-link" id="Weekly-tab" data-toggle="tab" href="#Weekly" role="tab" aria-controls="Weekly" aria-selected="false">Weekly Report</a>
				</li>
				<li class="nav-item" role="presentation">
					<a style='font-size: 18px;' class="nav-link" id="Evaluation-tab" data-toggle="tab" href="#Evaluation" role="tab" aria-controls="Evaluation" aria-selected="false">Evaluation</a>
				</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="Resume" role="tabpanel" aria-labelledby="Resume-tab">
					<div class="clearfix"></div>
					<div class="col-div-4">
						<div class="content-box" style="padding-left: 40px;">
							
						<p class="head">Contact:</p>
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
					<div class="col-div-8">
						<div class="content-box">
						<p class="head">Objective:</p><hr>
						<p class="p3" style="font-size: 14px;"><?php echo $row['objective'] ?><br>
						<br><br>

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
				<div class="tab-pane fade" id="DTR" role="tabpanel" aria-labelledby="DTR-tab">
					<br><h1 align = "center">OJT DAILY TIME RECORD</h1><br>
						<div class="dtrtable" align=center>
							<table > 
								<?php
									function dtr(){
									if(isset($_POST['userid'])){         
											global $mysqli;
											$mysequel = "SELECT * FROM students where lrn = '" . $_POST['userid'] . "'";
											$query = mysqli_query($mysqli, $mysequel);

											function hrsRemaining(){
												global $mysqli;

												function ensure_positive($num) {
													return max($num, 0);
													}
												$lrn = $_POST['userid'];
												$mysequel = "SELECT * FROM students where lrn = '$lrn'";
												$query = mysqli_query($mysqli, $mysequel);
												$students = mysqli_fetch_array($query);
												$hrs = $students['hrs'];
												$mysequel = "SELECT SUM(numofhrs) AS total FROM dtr WHERE lrn = '$lrn' AND (remarks = 'Approved' or remarks = '')";
												$query = mysqli_query($mysqli, $mysequel);
												$dtr = mysqli_fetch_array($query);
												$total = $dtr['total'];
												$remaining = ensure_positive($hrs - $total);

													if($remaining <= 0){
														return "<p style='color: green;'>Completed</p>";
													}else{
														return "<p>" . $remaining . " Hours</p>";
													}
											}
												while($students = mysqli_fetch_array($query)){
													echo "<tr>"; 
													echo "<td><strong>BLOCK:</strong><br><p>" . $students['block'] . "</p></td>";       
													echo "<td> <strong>INDUSTRY:</strong><br><p>";
														if($students['department'] == ""){
														echo "N/A";
														} else {
														$newsql = "SELECT * FROM departments WHERE ID = '" . $students['department'] . "'";
														$newcheck = mysqli_query($mysqli, $newsql);
														$newdepartment = mysqli_fetch_array($newcheck);
															echo $newdepartment['department'];
														}
													echo "</p></td>";            
													echo "</tr>";
													echo "<tr>";
													echo "<td><strong># of Hours Required:</strong><br><p>" . $students['hrs'] . "</p></td>";
													echo "<td><strong>NO. OF HOURS REMAINING:</strong>" . hrsRemaining() . " </td>";
													echo "</tr>";
											}
									}   
									}
									dtr();
								?>
							</table>
						</div>
						<br><br>
						<div class="table2" align=center>
							<table id="dtrprint" style='width: 1100px;'>
								<thead>
								<tr>
									<th>DATE</th>
									<th>TIME IN</th>
									<th>TIME OUT</th>
									<th>TOTAL HOURS</th>
									<th>REMARKS</th>
								</tr>
								</thead>
								<tbody>
										<?php
											function records(){   

												function lrn(){
													global $mysqli;
													$lrn = $_POST['userid'];
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
																echo "<td>&nbsp;&nbsp;" . date_format(date_create($dtr['date_']), 'F d, Y l') . "</td>";
																echo "<td>&nbsp;&nbsp;" . date_format(date_create($dtr['time_in']), 'h:i A') . "</td>";
																echo "<td>&nbsp;&nbsp;" . date_format(date_create($dtr['time_out']), 'h:i A') . "</td>";
																echo "<td>&nbsp;&nbsp;" . $dtr['numofhrs'] . " hrs" . "</td>";
																echo "<td>&nbsp;&nbsp;" . $dtr['remarks'] . "</td>";
																echo "</tr>";
															}
														}
														records();
										?>
							</tbody>
							</table>
						</div>
				</div>
				<div class="tab-pane fade" id="Weekly" role="tabpanel" aria-labelledby="Weekly-tab">
					<br><h1 align=center>On-the-Job Trainee Weekly Report Form</h1>
					<div class="table2">
						<table align = "center" id="weeklyprint" style='width: 1100px;'><br><br>
						<thead>
							<tr>
								<th>
								<h6 align=center>Week #:</h6>    
								</th>
								<th>
								<h6 align=center>Date:</h6>    
								</th>
								<th>
								<h6 align=center>Hours:</h6>    
								</th>
								<th>
								<h6>&nbsp;&nbsp;Description of Tasks:</h6>    
								</th>
								<th>
								<h6>&nbsp;&nbsp;Progress:</h6>    
								</th>
								<th>
								<h6>&nbsp;&nbsp;Remarks:</h6>    
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
											echo "<td>&nbsp;&nbsp;" . $weeklyreport['weeknum'] . "</td>";
											echo "<td>" . date_format(date_create($weeklyreport['date_']), 'F d, Y l') . "</td>";
											echo "<td>&nbsp;&nbsp;" . $weeklyreport['hrs'] . " hrs</td>";  
											echo "<td>&nbsp;&nbsp;" . $weeklyreport['descript_of_task'] . "</td>";
											echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;" . $weeklyreport['Progress'] . "</td>";
											echo "<td>&nbsp;&nbsp;" . $weeklyreport['remarks'] . "</td>";
											echo "</tr>";
										}
								}
								weeklyreportdata();
							?>
						</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="Evaluation" role="tabpanel" aria-labelledby="Evaluation-tab">
				<br><h1 align=center>TRAINEE'S PERFORMANCE EVALUATION</h1><br>
				<center><table style='border: solid #ccc 1px; height: ' class="inf">
									<?php
					include('capstone_database.php');;
					function age(){
						global $mysqli;
						$lrn = $_POST['userid'];
						if(isset($lrn)){
							$mysequel = "SELECT * FROM students where lrn = '" . $lrn . "'";
							$query = mysqli_query($mysqli, $mysequel);
							if($students = mysqli_fetch_array($query)){

							$birthdate = $students['bdate'];
							list($birth_year, $birth_month, $birth_day) = explode('-', $birthdate);

							$current_year = date('Y');
							$current_month = date('m');
							$current_day = date('d');

							$age = $current_year - $birth_year;
							if($current_month < $birth_month){
								$age--;
								if($current_day < $birth_day){
									$age--;
								}
							}
						}
						return $age;
						}
					}

						function info(){
						global $mysqli;
							$lrn = $_POST['userid'];
							if(isset($lrn)){
								$mysequel = "SELECT * FROM students where lrn = '" . $lrn . "'";
								$query = mysqli_query($mysqli, $mysequel);

								while($students = mysqli_fetch_array($query)){
									echo "<tr>";
									echo "<td> <strong>Name: </strong>";
									echo $students['fname'] . " " . $students["mname"] . " " . $students['lname'] . "</td>";
									echo "<td><strong>Age: </strong>";
									echo age() . " </td>";
									echo "<td><strong>Sex: </strong>";
									echo $students['Gender'] . " </td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td><strong>Block: </strong>";
									echo $students['block'] . " </td>";
									echo "<td colspan='2'><strong>No. of Training Hours Required: </strong>";
									echo $students['hrs'] . " </td>";
									echo "</tr>";
								}
							}
						}
						$sequel = "SELECT * FROM evaluation WHERE lrn = '" . $_POST['userid'] . "'";
						$result = mysqli_query($mysqli, $sequel);
						$row = mysqli_fetch_array($result);

						info();
					?>
				</table></center>
				<br><br>

			<div style='display: flex; padding: 10px;'>

			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Job Knowledge <i>(15%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(skill level, knowledge & understanding of all phases of the job)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['jobKnowledge'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Quality of Work <i>(15%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(accuracy, completeness & follow through of work)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['qualityOfWork'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Quantity of Work <i>(15%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(volume of work accomplished, able to complete work on time)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['quantityOfWork'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Dependability <i>(10%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(complete required task with minimum supervision)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['dependability'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Initiative <i>(10%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(resourcefulness, creativity to formulate & propose innovative solutions)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['initiative'] ?>%</b></center></div>
			</div>

			</div>
			<div style='display: flex; padding: 10px;'>

			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Conduct <i>(10%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(observes courtesy, politeness)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['conduct'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Decision-Making <i>(10%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(Sound decision, ability to identify and evaluate pertinent factors)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['decisionMaking'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Interpersonal Skills <i>(5%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(Working relationship with other employees and other trainees)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['interpersonalSkills'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 16px;' class="card-title">Attendance <i>(5%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(Regular and punctuality in office attendance & proper observation of breaktime period)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['attendance'] ?>%</b></center></div>
			</div>
			<div class="card card1 mb-3" style="max-width: 18rem;">
			<div class="card-body" style='height: 160px;'>
				<h5 style='font-size: 15px;' class="card-title">Personal Appearance <i>(5%)</i></h5>
				<p style='font-size: 13px;' class="card-text">(adheres to company dress code; has a personal bearing)</p>
			</div>
			<div class="card-header"><center><b><?php echo $row['personalAppearance'] ?>%</b></center></div>
			</div>

			</div>

			<br><br>
			<div class="display: flex; padding: 10px;">
			<div class="card card1 border mb-3" style="width: 340px; height: 250px; margin-left: 785px; margin-top: -40px;">
			<div class="card-header"><h5> Evaluated by:</h5></div>
			<div class="card-body text-secondary">
				<h5 style='margin-top: -10px;' class="card-title">Supervisor: </h5><p style='font-size: 20px; color: black;' class="card-text"><?php echo $row['supervisor'] ?></p>
				<h5 class="card-title">Designation: </h5><p style='font-size: 20px; color: black;' class="card-text"><?php echo $row['designation'] ?></p>
			</div>
			</div>

			<div class="card card1 border mb-3" style="width: 370px; height: 250px; margin-left:  10px; margin-top: -265px;">
			<div class="card-header">Feedbacks for the trainee:</div>
			<div class="card-body text-secondary">

				<p style='font-size: 18px; color: black;' class="card-text"><?php echo $row['feedback'] ?></p>
			</div>
			
			</div>
			<div class="card card1 border mb-3" style="width: 370px; height: 250px; margin-left:  395px; margin-top: -265px;">
			<div class="card-header">Recommendation for the trainee's growth:</div>
			<div class="card-body text-secondary">

				<p style='font-size: 18px; color: black;' class="card-text"><?php echo $row['recommend'] ?></p>
			</div>
			
			</div>
			</div>
				</div>
			</div>
			<br>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
        $('#dtrprint').DataTable({
            dom: 'B',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columnDefs: [
                {
                    targets: '_all',
                    orderable: false
                }
            ],
            order: [[0, 'asc']]
        });
		$('#weekly').DataTable({
			dom: 'B',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
				columnDefs: [
				{
					targets: '_all',
					orderable: false
				}
			],
			order: [[0, 'asc']]
		});
    });
	</script>
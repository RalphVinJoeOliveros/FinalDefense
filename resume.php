<?php
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
    include 'capstone_database.php';
    $sequel = "SELECT * FROM students WHERE lrn = '".$_SESSION['lrn']."'";
    $result = mysqli_query($mysqli, $sequel);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>MY RESUME</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body{
	margin: 0px;
	padding: 0px;
	background-image: radial-gradient(#c7c7c7 25%, #c7c7c7 74%);
	height: 100vh;
	font-family: system-ui;

}
.clearfix{
	clear: both;
}
.main{
	height: auto;
	width: 800px;
	background-color: white;
	box-shadow: 5px 7px 15px 5px #b9b6b6;
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
	margin-left: -15px;
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
</style>
</head>

<body>
<div class="container main">
		<div class="top-section">
			<img src="uploads/<?php echo $row['picture'] ?>" class="profile" />
			<p class="p1"><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname']; ?></span></p>
			<p class="p2">Intern Student</p>
		</div>
<div class="row">
<div class="clearfix"></div>
		<div class="col">
				<br>
				<h4>Objective:</h4>
				<p class="p3" style="font-size: 14px;"><?php echo $row['objective'] ?><br>
			<br>
		</div>
</div>
<div class="row">
		<div class="col">
				<p class="head">Contact:</p><hr>
				<p class="p3"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $row['cpnum'] ?></p>
				<p class="p3"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $row['email'] ?></p>
				<p class="p3"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $row['homeaddress'] ?></p>
				<br/>
				<p class="head">MY SKILLS:</p>
					<ul class="skills">
						<?php echo "• " . str_replace(',', '<br>•', $row['skills'])  ?>
					</ul>
				<br><br><br>
				<p class="head" style="margin-top: -20px;">QUALIFICATIONS:</p>
				<ul class="skills">
					<?php echo "• " . str_replace(',', '<br>•', $row['qualifications'])  ?>	
				</ul>
				<br><br><br>
		</div>
			<div class="line"></div>
		<div class="col">
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
		<p class="head" align="center">CHARACTER REFERENCES:</p><hr><br>
		<div class="row">
			<div class="col">
				<ul class="skills">
					<?php 
						echo "<b>" . $row['cr1name'] . "</b><br><hr>";
						echo $row['cr1relation'] . "<br>";
						echo $row['cr1info'] . "<br>";
					?>
				</ul>
			</div>
			<div class="col">
				<ul class="skills">
					<?php 
						echo "<b>" . $row['cr2name'] . "</b><br><hr>";
						echo $row['cr2relation'] . "<br>";
						echo $row['cr2info'] . "<br>";
					?>
				</ul>
			</div>
		</div>
		<br><br><br>
</div>

</div>
<br>
</body>
</html>
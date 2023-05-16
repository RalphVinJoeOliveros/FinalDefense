<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	background: #FFF;
	height: auto;
}
.form-inline {
	display: inline-block;
}
.navbar-header.col {
	padding: 0 !important;
}
.navbar {		
	background: #000;
	padding-left: 16px;
	padding-right: 16px;
	border-bottom: 2px solid #d6d6d6;
	box-shadow: 0 0 4px rgba(0,0,0,.1);
	z-index: 100;
}
.nav-link img {
	border-radius: 50%;
	width: 36px;
	height: 36px;
	margin: -8px 0;
	float: left;
	margin-right: 10px;
}
.navbar .navbar-brand {
	color: black;
	padding-left: 0;
	padding-right: 50px;
	font-family: 'Merienda One', sans-serif;
}
.navbar .navbar-brand i {
        font-size: 20px;
        margin-right: 5px;
}
.navbar .dropdown-menu a {
	color: black;
	padding: 5px 20px;
	line-height: normal;
}
.navbar .dropdown-menu a:hover, .navbar .dropdown-menu a:active {
	color: #333;
}	
.navbar .dropdown-item .material-icons {
	font-size: 21px;
	line-height: 16px;
	vertical-align: middle;
	margin-top: -2px;
}	
.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
	background: transparent !important;
}
@media (min-width: 1200px){
	.form-inline .input-group {
		width: 300px;
		margin-left: 30px;
	}
}
@media (max-width: 1199px){
	.form-inline {
		display: block;
		margin-bottom: 10px;
	}
	.input-group {
		width: 100%;
	}
}
.logo{
    width: 190px;
    top: 12px;
    list-style: none;
}
.navbar-nav a{
	margin-top: 5px;
}
.navbar-nav a:hover{
	text-decoration: none;
}
.highlight1, .highlight2, .highlight3 , .highlight4, .highlight5{
	color: #000;
	font-weight: 500;
}
</style>
</head> 
<body>
<nav class="navbar navbar-expand-xl navbar-light" style="position: sticky; top: 0; background-color: #FFF; height: 60px;">
	<a href="#" class="navbar-brand"><img src="uploads/logo.png" alt="ICI logo"class="logo">
 </a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav">
			<a class="highlight1" href="studentslist.php" class="nav-item nav-link" style= "margin-left: 20px; margin-right: 20px;">List of Students</a> &nbsp;&nbsp;&nbsp;
			<a class="highlight2" href="approve-student.php" class="nav-item nav-link" style= "margin-left: 20px; margin-right: 20px;">Approve Student</a> &nbsp;&nbsp;&nbsp;
			<a class="highlight3" href="manage_blocks.php" class="nav-item nav-link" style= "margin-left: 20px; margin-right: 20px;">List of Blocks</a> &nbsp;&nbsp;&nbsp;
			<a class="highlight4" href="manage_departments.php" class="nav-item nav-link" style= "margin-left: 20px; margin-right: 20px;">List of Industries</a> &nbsp;&nbsp;&nbsp;
		</div>

		<div class="navbar-nav ml-auto">
			<div class="nav-item dropdown">
				<?php
					include "capstone_database.php";
						$sequel = "SELECT * FROM coordinator WHERE `email` = '".$_SESSION['email']."'";
						$result = mysqli_query($mysqli, $sequel);
						$row = mysqli_fetch_assoc($result);

				?>
				<a style="color: black;" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="uploads/<?php echo $row['picture']; ?>" class="avatar" alt="Avatar"><?php echo $row['first_name'] . " " . $row['last_name']; ?></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a href="coor-settings.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile Settings</a></a>
					<div class="dropdown-divider"></div>
					<a href="coordinator-logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>
</body>
</html>
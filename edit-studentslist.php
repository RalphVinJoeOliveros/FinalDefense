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
$lrn = $_POST['userid'];
$sql = "SELECT * FROM students WHERE lrn = '$lrn'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$schedule = explode(', ', $row['schedule']);
?>
<br>
<style>  
input[type=date]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 620px;
    height: 35px;
}
input[type=number]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 620px;
    height: 35px;
}
select{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    margin-bottom: 20px;
}
.label1{
    margin-bottom: 0;
    font-size: 17px;  
    margin-left: 26px;
}
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-4 p-3">
                <img src="uploads/<?php if($row['picture'] == ""){ echo "silhouette.png";} else{ echo $row['picture'];} ?>" class="img-circle" width="130">
                </div>
                <div class="col-7 p-3" style='margin-top: -10px;'>
                    <h5 class="card-title m-t-10"><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'];?></h5>
                    <small class="form-text text-muted">Learner's Reference Number</small>
                        <h7 class="card-subtitle"><?php echo $row['lrn'] ?></h7>
                    <div class="row">
                        <div class="col-5">
                            <small class="form-text text-muted">Block</small>
                                <h7 class="card-subtitle"><?php echo $row['block'] ?></h7>
                            <small class="form-text text-muted">School Year</small>
                                <h7 class="card-subtitle"><?php echo $row['schoolyear'] ?></h7>                                
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<form action="" method="post" id="edit">
    <div class="form-group"><br>
        <label class="label1" for="Department">Industry:</label><br>
            <center><select  name="Department" id="" class="form-control" required style='width: 620px;'>
                <option value="">Select Industry</option>
                    <?php
                        $sequel = "SELECT * FROM departments ORDER BY department ASC";
                        $result = mysqli_query($mysqli, $sequel);
                            while($department = mysqli_fetch_array($result)){
                                $selected = "";
                                $newsql = "SELECT department FROM students WHERE lrn = '$lrn'";
                                $existing_department_value = mysqli_fetch_array(mysqli_query($mysqli, $newsql))['department'];
                                   if ($department['ID'] == $existing_department_value) {
                                        $selected = "selected";
                                    }
                                     echo "<option value='" . $department['ID'] . "' " . $selected . ">" . strtoupper($department['department']) . "</option>";
                            }
                    ?>
            </select></center><br>
            <?php
                $mysql = "SELECT * FROM students WHERE lrn = '$lrn'";
                $result = mysqli_query($mysqli, $mysql);
                $row = mysqli_fetch_array($result);
            ?>
            <label class="label1"  for="startdate">Start Date:</label>
                <center><input style='margin-top: -2px;' type="date" name="startdate" id="startdate" value="<?php echo $row['startdate']; ?>" class="form-control" required></center><br>
                                    
            <label class="label1" for="Schedule[]">Schedule:</label><br>
                <div class="px-4 " style='margin-left: 40px;'>
                    <input type="checkbox" name="Schedule[]" value="Mon" <?php if(in_array("Mon", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Monday<br>
                    <input type="checkbox" name="Schedule[]" value="Tue" <?php if(in_array("Tue", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Tuesday<br>
                    <input type="checkbox" name="Schedule[]" value="Wed" <?php if(in_array("Wed", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Wednesday<br>
                    <input type="checkbox" name="Schedule[]" value="Thu" <?php if(in_array("Thu", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Thursday<br>
                    <input type="checkbox" name="Schedule[]" value="Fri" <?php if(in_array("Fri", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Friday<br>
                    <input type="checkbox" name="Schedule[]" value="Sat" <?php if(in_array("Sat", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Saturday<br>
                    <input type="checkbox" name="Schedule[]" value="Sun" <?php if(in_array("Sun", $schedule)) echo "checked"; ?>>&nbsp;&nbsp;Sunday<br>
                </div><br>

            <label class="label1" for="">Number of Hours Required:</label>
                <center><input style='margin-top: -1px;' type="number" class="form-control" name="hrs" id="" value="<?php echo $row['hrs']; ?>" min="80"></center><br>
            <input type="hidden" name="lrn" value="<?php echo $_POST['userid']; ?>">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
            </div>
        </div>
    </div>
</div>

</form>
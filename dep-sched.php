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
include 'capstone_database.php';
 $lrn = $_POST['userid'];
 
 $sequel = "SELECT * FROM students WHERE `lrn` = '$lrn'";
    $students = mysqli_fetch_array(mysqli_query($mysqli, $sequel)); 
?>
<div class="container text-center">
        <div class="row">
            <div class="col">
                <h6 class="text-muted">Full Name</h6>
            </div>
            <div class="col">
                <p><?php echo $students['fname'] . " " . $students['mname'] . " " . $students['lname']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">LRN</h6>
            </div>
            <div class="col">
                <p><?php echo $students['lrn']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">Block</h6>
            </div>
            <div class="col">
                <p><?php echo $students['block']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">School Year</h6>
            </div>
            <div class="col">
                <p><?php echo $students['schoolyear']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">Start Date</h6>
            </div>
            <div class="col">
            <p><?php if($students['startdate'] == "0000-00-00"){ echo "Not Yet Assign";} else {echo date('F d, Y' . " " . 'l', strtotime($students['startdate']));} ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">Schedule of OJT</h6>
            </div>
            <div class="col">
            <p><?php if($students['schedule'] == ""){ echo "Not Yet Assign";} else {echo $students['schedule'];} ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">Hours Required</h6>
            </div>
            <div class="col">
                <p><?php if($students['hrs'] == "0"){ echo "Not Yet Assign";} else {echo $students['hrs'] . " Hours";} ?><p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">Hours Rendered</h6>
            </div>
            <div class="col">
                <?php
                    $hrs = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(numofhrs))) AS total_time FROM dtr WHERE lrn = '" . $students['lrn'] . "' AND (remarks = 'Approved' OR remarks = '')";
                    $query = mysqli_query($mysqli, $hrs);
                    $result = mysqli_fetch_array($query);
                    
                    $total_time = $result['total_time'];
                    
                    if ($total_time === null) {
                        echo "0 Hour/s";
                    } else {
                        $time_parts = explode(':', $total_time);
                        $total_hours = (int) $time_parts[0];
                        
                        echo $total_hours . " Hour/s ";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
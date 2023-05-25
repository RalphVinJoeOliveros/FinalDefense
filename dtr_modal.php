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
  date_default_timezone_set('Asia/Manila');
?>
<style>  
input[type=date]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 450px;
    height: 35px;
}
input[type=time]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 450px;
    height: 35px;
}
label{
    margin-bottom: 0;
    font-size: 17px;  
    margin-left: 26px;
}
</style>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="add-body">
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="edit-body"> 

        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="delete-body"> 

        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="selectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="select-body"> 
            <p class="p-3">Do you want to manually <b>Input</b> your time or do you want to <b>Punch In</b> directly?</p>
        </div>
        <div class = "modal-footer">
            <button type="button" class="btn btn-secondary add-btn">Input</button>
            <form action="" method="post">
                <input type="hidden" name="lrn" value="<?php echo $_SESSION['lrn']; ?>">
                <input type="hidden" name="current_date" value="<?php echo date("Y-m-d", time()); ?>">
                <input type="hidden" name="current_time" value="<?php echo date("H:i:s", time()); ?>">
                <button type="submit" class="btn btn-success" name="punchIn">Punch In</button>
            </form>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="outModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="out-body"> 
            <p class="p-3">Do you want to manually <b>Input</b> your time or do you want to <b>Punch Out</b> directly?</p>
        </div>
        <div class = "modal-footer">
            <button type="button" class="btn btn-secondary edit-btn">Input</button>
            <form action="" method="post">
                <input type="hidden" name="lrn" value="<?php echo $_SESSION['lrn']; ?>">
                <input type="hidden" name="dtrid" value="">
                <input type="hidden" name="current_date" value="<?php echo date("Y-m-d", time()); ?>">
                <input type="hidden" name="current_time" value="<?php echo date("H:i:s", time()); ?>">
                <button type="submit" class="btn btn-danger" name="punchOut">Punch Out</button>
            </form>
      </div>
    </form>
    </div>
  </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.add-btn').click(function(){
            var userid = $(this).data('id');
            $.ajax({
                url: 'add.php',
                type: 'post',
                data: {userid: userid},
                success: function(response){ 
                    $('.add-body').html(response); 
                    $('#add').modal('show'); 
                }
            });
        });
          $('.edit-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'update.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.edit-body').html(response); 
                      $('#empModal').modal('show'); 
                  }
              });
          });
            $('.dlte-btn').click(function(){
            var userid = $(this).data('id');
            $.ajax({
                url: 'delete.php',
                type: 'post',
                data: {userid: userid},
                success: function(response){ 
                    $('.delete-body').html(response); 
                    $('#delModal').modal('show'); 
                }
            });
        });
        $(".add-btn").click(function() {
        $("#selectModal").modal("hide");      
        $("#add").modal("show");
      });
      $(".edit-btn").click(function() {
        $("#outModal").modal("hide");      
        $("#editModal").modal("show");
      });
      $('.out-btn').click(function() {
      var id = $(this).data('id');
      console.log('Clicked out-btn with id=' + id);
      $('.edit-btn').data('id', id);
      $('input[name="dtrid"]').val(id);
    });
    });
</script>
<?php
  if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM dtr WHERE id = '$id'";
    $check = mysqli_query($mysqli, $sql);
  }
  if(isset($_POST['punchIn'])) {
    $lrn = $_POST['lrn'];
    $date = $_POST['current_date'];
    $time_in = date('H:i', strtotime($_POST['current_time']));
    function id(){
        while(true){
            include('capstone_database.php');
            $id = rand(100000, 999999);
            $check_id = "SELECT * FROM dtr WHERE id = '$id'";
            $check_query = mysqli_query($mysqli, $check_id);
            if(mysqli_num_rows($check_query) == 0){
                return $id;
            }
        }
    }
    $id = id();
    $sqlreference = "SELECT * FROM students WHERE lrn = '$lrn'";
    $queryreference = mysqli_query($mysqli, $sqlreference);
    $rowreference = mysqli_fetch_array($queryreference);
    $referenceDate = nl2br(date_format(date_create($rowreference['startdate']), 'F d, Y' . " " . 'l'));
  
    if ($date <  $rowreference['startdate']) {
      echo "<script>alert('Error: Date cannot be before $referenceDate'); window.location='dtr.php'</script>";
    }else {
      $sql = "INSERT INTO dtr (lrn, id, date_, time_in) VALUES ('$lrn', '$id', '$date', '$time_in')";
      $check = mysqli_query($mysqli, $sql);
      
      if($check) {
          echo "<script>alert('Successfully added!')</script>";
          echo "<script>window.location='dtr.php'</script>";
      }
  }
}
  if(isset($_POST['updatedtr'])){
      $id = $_POST['id'];
      $time_in = date('H:i', strtotime($_POST['time_in']));
      $time_out = $_POST['time_out'];
      $date = $_POST['date_'];

      $sequel = "SELECT * FROM dtr WHERE id = '$id'";
      $query = mysqli_query($mysqli, $sequel);
      $row = mysqli_fetch_array($query);
      $time_in = date('H:i', strtotime($row['time_in']));
      $current_date = $row['date_'];

      function calculate_work_hours($date_started, $time_started, $date_ended, $time_ended) {
        // Convert start and end datetime values to Unix timestamps
        $start_timestamp = strtotime("$date_started $time_started");
        $end_timestamp = strtotime("$date_ended $time_ended");
    
        // Calculate time difference in seconds
        $time_diff = $end_timestamp - $start_timestamp;
    
        // Calculate hours and minutes
        $hours = floor($time_diff / 3600);
        $minutes = floor(($time_diff % 3600) / 60);
    
        // Subtract 1 hour if hours is greater than or equal to 7
        if ($hours >= 7) {
            $hours -= 1;
        }
    
        return array('hours' => $hours, 'minutes' => $minutes);
    }
    
    
    
    $numofhrs = calculate_work_hours($date, $time_in, $current_date, $time_out);
    
    $hours = $numofhrs['hours'];
    $minutes = $numofhrs['minutes'];
    
    // Check if working hours are within the specified range
    if ($hours < 1 || ($hours == 1 && $minutes <= 0)) {
        echo "<script>alert('Your working hours must exceed one hour and be below 15 hours.')</script>";
    } elseif ($hours >= 15) {
        echo "<script>alert('Your working hours must exceed one hour and be below 15 hours.')</script>";
    } else {
        // Perform the update if the validation checks pass
        $formatted_hours = sprintf("%02d", $hours);
        $formatted_minutes = sprintf("%02d", $minutes);
        $numofhrs = $formatted_hours . ":" . $formatted_minutes . ":00";
        $sql = "UPDATE dtr SET time_out = '$time_out', numofhrs = '$numofhrs' WHERE id = '$id'";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            echo "<script>alert('Successfully Updated!')</script>";
            echo "<script>window.location='dtr.php'</script>";
        }
    }
  }
if(isset($_POST['add'])){
  $date_ = $_POST['date_'];
  $time_in = date('H:i', strtotime($_POST['time_in']));

  function id(){
      while(true){
          include('capstone_database.php');
          $id = rand(100000, 999999);
          $check_id = "SELECT * FROM dtr WHERE id = '$id'";
          $check_query = mysqli_query($mysqli, $check_id);
          if(mysqli_num_rows($check_query) == 0){
              return $id;
          }
      }
  }
  $id = id();
  $lrn = $_SESSION['lrn'];


  $sqlreference = "SELECT * FROM students WHERE lrn = '$lrn'";
  $queryreference = mysqli_query($mysqli, $sqlreference);
  $rowreference = mysqli_fetch_array($queryreference);
  $referenceDate = nl2br(date_format(date_create($rowreference['startdate']), 'F d, Y' . " " . 'l'));

  if ($date_ < $rowreference['startdate']) {
    echo "<script>alert('Error: Date cannot be before $referenceDate'); window.location='dtr.php'</script>";
  }else {
    $sql = "INSERT INTO dtr (lrn, id, date_, time_in) VALUES ('$lrn', '$id', '$date_', '$time_in')";
    $check = mysqli_query($mysqli, $sql);
    if ($check) {
      echo "<script>alert('Successfully added!')</script>";
      echo "<script>window.location='dtr.php'</script>";
    }
  }
}

if(isset($_POST['punchOut'])){
  $sqlPO = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM dtr WHERE id = '{$_POST['dtrid']}'"));
  $id = $sqlPO['id'];
  $time_in = date('H:i', strtotime($sqlPO['time_in']));
  // $time_out = $_POST['time_out'];
  $time_out = date("H:i", time());
  $date = $sqlPO['date_'];

  $sequel = "SELECT * FROM dtr WHERE id = '$id'";
  $query = mysqli_query($mysqli, $sequel);
  $row = mysqli_fetch_array($query);
  $time_in = date('H:i', strtotime($row['time_in']));
  $current_date = $row['date_'];

  function calculate_work_hours($date_started, $time_started, $date_ended, $time_ended) {
    // Convert start and end datetime values to Unix timestamps
    $start_timestamp = strtotime("$date_started $time_started");
    $end_timestamp = strtotime("$date_ended $time_ended");

    // Calculate time difference in seconds
    $time_diff = $end_timestamp - $start_timestamp;

    // Calculate hours and minutes
    $hours = floor($time_diff / 3600);
    $minutes = floor(($time_diff % 3600) / 60);

    // Subtract 1 hour if hours is greater than or equal to 7
    if ($hours >= 7) {
        $hours -= 1;
    }

    return array('hours' => $hours, 'minutes' => $minutes);
}



$numofhrs = calculate_work_hours($date, $time_in, $current_date, $time_out);

$hours = $numofhrs['hours'];
$minutes = $numofhrs['minutes'];

// Check if working hours are within the specified range
if ($hours < 1 || ($hours == 1 && $minutes <= 0)) {
    echo "<script>alert('Your working hours must exceed one hour and be below 15 hours.')</script>";
} elseif ($hours >= 15) {
    echo "<script>alert('Your working hours must exceed one hour and be below 15 hours.')</script>";
} else {
    // Perform the update if the validation checks pass
    $formatted_hours = sprintf("%02d", $hours);
    $formatted_minutes = sprintf("%02d", $minutes);
    $numofhrs = $formatted_hours . ":" . $formatted_minutes . ":00";
    $sql = "UPDATE dtr SET time_out = '$time_out', numofhrs = '$numofhrs' WHERE id = '$id'";
    $query = mysqli_query($mysqli, $sql);
    if ($query) {
        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>window.location='dtr.php'</script>";
    }
}
}
?>


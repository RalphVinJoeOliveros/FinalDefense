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
?>
<style>
    textarea{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
}   
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
input[type=number]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 450px;
    height: 35px;
}
select{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    height: 40px;
    margin-bottom: 20px;
}
label{
    margin-bottom: 0;
    font-size: 17px;  
    margin-left: 26px;
}
</style>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="add-body">
        <?php
        if(isset($_POST['submit'])){
          date_default_timezone_set('Asia/Manila');

          $weeksequel = "SELECT MIN(date_) AS firstweek FROM weeklyreport WHERE lrn = '" . $_SESSION['lrn'] . "'";
          $result = $mysqli->query($weeksequel);
          $row = $result->fetch_assoc();

          if($row['firstweek'] == ""){
              $start_date = $_POST['date_'];
          } else {
              $start_date = $row['firstweek'];
          }

          $current_week_number = 1;
          $current_date = strtotime($start_date);

          while ($current_date <= strtotime($_POST['date_'])) {
              $current_day_of_week = date('w', $current_date);

              // Check if the current day falls within the next week
              if ($current_day_of_week == 0 || ($current_day_of_week > 0 && $current_day_of_week < 6 && date('w', strtotime('+1 day', $current_date)) == 0)) {
                  $current_week_number++;
              }

              // Move to the next day
              $current_date = strtotime('+1 day', $current_date);
          }

            function id(){
                while(true){
                    include('capstone_database.php');
                    $id = rand(100000, 999999);
                    $check_id = "SELECT * FROM weeklyreport WHERE id = '$id'";
                    $check_query = mysqli_query($mysqli, $check_id);
                    if(mysqli_num_rows($check_query) == 0){
                        return $id;
                    }
                }
            }
            $weeknum = 'Week ' . $current_week_number;
            $date_ = $_POST['date_'];
            $hrs = $_POST['hrs'];
            $descript_of_task = $_POST['descript_of_task'];
            $Progress = $_POST['Progress'];
            $id = id();
            $lrn = $_SESSION['lrn'];

            $sqlreference = "SELECT * FROM students WHERE lrn = '$lrn'";
            $queryreference = mysqli_query($mysqli, $sqlreference);
            $rowreference = mysqli_fetch_array($queryreference);
            $referenceDate = nl2br(date_format(date_create($rowreference['startdate']), 'F d, Y' . " " . 'l'));
                
            if ($date_ < $referenceDate) {
              echo "<script>alert('Error: Date cannot be before $referenceDate'); window.location='weeklyreportform.php'</script>";
            } else {
              $sql = "INSERT INTO weeklyreport (lrn, id, weeknum, date_, hrs, descript_of_task, Progress) VALUES ('$lrn', '$id', '$weeknum', '$date_', '$hrs', '$descript_of_task', '$Progress')";
              $query = mysqli_query($mysqli, $sql);
              if($query){
                echo "<script>alert('Added Successfully!'); window.location='weeklyreport.php'</script>";
              } else {
                echo "<script>alert('Failed!'); window.location='weeklyreportform.php'</script>";
              }
        }
      }
    ?>
    <form action="" method="POST"><br>
        <label for="date_">Date:</label>
        <center><input type="date" name="date_" class="form-control" required></center><br>
        <label for="hrs">Hours:</label><br>
        <center><input type="number" name="hrs" class="form-control"></center><br>
        <label for="descript_of_task" >Description of Task:</label>
        <center><textarea style='width: 450px;' type="text" name="descript_of_task" rows="4" cols="35" class="form-control" required></textarea></center><br>
        <label for="Progress">Progress:</label>   
          <div>
          <center><select style='width: 450px;' name="Progress" id="Progress" class="form-control" required>
                        <option value=" "></option>
                        <option value="DONE">DONE</option>
                        <option value="NOT DONE">NOT DONE</option>
                        <option value="IN PROGRESS">IN PROGRESS</option>
            </select></center><br>
          </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
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
<script type='text/javascript'>
    $(document).ready(function(){
          $('.edit-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'update-weeklyreport.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.edit-body').html(response); 
                      $('#updateModal').modal('show'); 
                  }
              });
          });
            $('.dlte-btn').click(function(){
            var userid = $(this).data('id');
            $.ajax({
                url: 'delete-weeklyreport.php',
                type: 'post',
                data: {userid: userid},
                success: function(response){ 
                    $('.delete-body').html(response); 
                    $('#delModal').modal('show'); 
                }
            });
        });
    });
</script>
<?php
    if(isset($_POST['update'])){
      $id = $_POST[ 'id'];
      $date_ = $_POST['date_'];
      $hrs = $_POST['hrs'];
      $descript_of_task = addslashes($_POST['descript_of_task']);
      $Progress = $_POST['Progress'];
      $dateofcom = $_POST['dateofcom'];


      $sql = "UPDATE weeklyreport SET date_ = '$date_', hrs = '$hrs', descript_of_task = '$descript_of_task', Progress = '$Progress', dateofcom = '$dateofcom' WHERE id = '$id'";
      $check = mysqli_query($mysqli, $sql);
  }
?>
<?php
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

        $query = "DELETE FROM weeklyreport WHERE id = '$id'";
        $check_query = mysqli_query($mysqli, $query);
}
?>
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
<div class="modal fade bd-example-modal-lg" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="profile-body"> 

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 650px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="edit-body"> 

        </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){

          $('.prof-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'viewinfo.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.profile-body').html(response); 
                      $('#profileModal').modal('show'); 
                  }
              });
          });
          
          $('.edit-btn').click(function() {
            var userid = $(this).data('id');
            $.ajax({
              url: 'edit-studentslist.php',
              type: 'post',
              data: {userid: userid},
              success: function(response) {
                $('.edit-body').html(response);
                $('#editModal').modal('show');
              }  
            });
          });
        });


</script>
<?php
  if(isset($_POST['submit'])){
    $startDate = $_POST['startdate'];
    $department = $_POST['Department'];
    if(isset($_POST['Schedule']) == null){
      $schedule = null;
    }else{
      $schedule = implode(', ', $_POST['Schedule']);
    }
    $lrn = $_POST['lrn'];                                  
    
    $sql = "UPDATE students SET startdate = '$startDate', department = '$department', schedule = '$schedule' WHERE lrn = '$lrn'";

    if(mysqli_query($mysqli, $sql)){
      echo "<script>alert('Successfully Updated!')</script>";
      echo "<script>window.location='studentslist.php'</script>";
    }else{
        echo "<script>alert('Failed to Update!')</script>";
        echo "<script>window.location='studentslist.php'</script>";
    }
  }                                    
?>
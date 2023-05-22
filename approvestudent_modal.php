<?php
  if(isset($_SESSION['lrn'])) {
    echo "<script>window.location='student-landing-page.php'; </script>";
    die();
    }elseif(isset($_SESSION['department'])) {
    echo "<script>window.location='department-studentslist.php'; </script>";
    die();
    } elseif(!isset($_SESSION['ID'])) {
      echo "<script>window.location='index.php'; </script>";
      die();
    }
?>
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="approve-body"> 
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width:600px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="view-body"> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="del-body"> 
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password for this Student?</h5>
      </div>
        <div class="pass-body"> 
        </div>
        </div>
      </div>
    </div>
  </div>
<script type='text/javascript'>
    $(document).ready(function(){
          $('.approve-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'coor-studentapprove.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.approve-body').html(response); 
                      $('#approveModal').modal('show'); 
                  }
              });
          });
          $('.view-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'studentview.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.view-body').html(response); 
                      $('#viewModal').modal('show'); 
                  }
              });
          });
          $('.del-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'studentdelete.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.del-body').html(response); 
                      $('#delModal').modal('show'); 
                  }
              });
          });
          $('.pass-btn').click(function() {
            var userid = $(this).data('id');
            $.ajax({
              url: 'pass-studentslist.php',
              type: 'post',
              data: {userid: userid},
              success: function(response) {
                $('.pass-body').html(response);
                $('#passModal').modal('show');
              }  
            });
          });
    });
</script>
<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $sequel = "UPDATE students SET `status` = 'Approved' WHERE lrn = '$id'";
        $query = mysqli_query($mysqli, $sequel);
        if($query){
            echo "<script>alert('Successfully Approved!')</script>";
        }else{
            echo "Failed";
        }
    }
?>
<?php
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $students = "DELETE FROM students WHERE lrn = '$id'";
        $dtr = "DELETE FROM dtr WHERE lrn = '$id'";
        $evaluation = "DELETE FROM evaluation WHERE lrn = '$id'";
        $weeklyreport = "DELETE FROM weeklyreport WHERE lrn = '$id'";

        $studentsquery = mysqli_query($mysqli, $students);
        $dtrquery = mysqli_query($mysqli, $dtr);
        $evaluationquery = mysqli_query($mysqli, $evaluation);
        $weeklyreportquery = mysqli_query($mysqli, $weeklyreport);

        if($studentsquery && $dtrquery && $evaluationquery && $weeklyreportquery){
            echo "<script>alert('Successfully Deleted!')</script>";
            echo "<script>window.location='approve-student.php'</script>";
        }else{
            echo "<script>alert('Failed to Delete!')</script>";
            echo "<script>window.location='approve-student.php'</script>";
        }
    }
    if(isset($_POST['Change'])){
      $id = $_POST['id'];
      $password = "ici-iligan";
      $hash = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "UPDATE students SET pass = ? WHERE lrn = ?";
      $stmt = mysqli_prepare($mysqli, $sql);
      mysqli_stmt_bind_param($stmt, 'ss', $hash, $id);
      $query = mysqli_stmt_execute($stmt);

      if ($query) {
        echo "<script>alert('Password Successfully Changed!')</script>";
        echo "<script>window.location='approve-student.php'</script>";
      }else{
        echo "<script>alert('Password Successfully Changed!')</script>";
        echo "<script>window.location='approve-student.php'</script>";
      }
  
    } 
?>
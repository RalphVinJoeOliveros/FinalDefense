<?php
  	    if(isset($_SESSION['lrn'])) {
          echo "<script>window.location='student-landing-page.php'; </script>";
          die();
          } elseif(isset($_SESSION['email'])) {
            echo "<script>window.location='studentslist.php'; </script>";
            die();
          } elseif (!isset($_SESSION['department'])) {
          echo "<script>window.location='index.php'; </script>";
          die();
          }
?>
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student's Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="name-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="edit-body">
        ...
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){

          $('.name-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'dep-sched.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.name-body').html(response); 
                      $('#nameModal').modal('show'); 
                  }
              });
          });
          $('.edit-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'dep-edit.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.edit-body').html(response); 
                      $('#editModal').modal('show'); 
                  }
              });
          });
    });
</script>
<?php
  if(isset($_POST['update'])){
    $lrn = $_POST['lrn'];
    $remarks = $_POST['remarks'];

    $update = "UPDATE students SET remarks = '$remarks' WHERE lrn = '$lrn'";
    $updateQuery = mysqli_query($mysqli, $update);
  }
?>
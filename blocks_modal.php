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
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Information</h5>
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
<script type='text/javascript'>
    $(document).ready(function(){
        $('.del-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'blockdelete.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.del-body').html(response); 
                      $('#delModal').modal('show'); 
                  }
              });
          });
    });
</script>
<?php
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sequel = "DELETE FROM student_block WHERE student_block = '$id'";
        $query = mysqli_query($mysqli, $sequel);
    }
?>
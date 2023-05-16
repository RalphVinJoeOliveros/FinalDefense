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
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Industry Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="view-body">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="pass-body">

        </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
          $('.view-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'departmentview.php',
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
                  url: 'delete-department.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.del-body').html(response); 
                      $('#delModal').modal('show'); 
                  }
              });
          });
        $('.pass-btn').click(function(){
              var userid = $(this).data('id');
              $.ajax({
                  url: 'changepass-department.php',
                  type: 'post',
                  data: {userid: userid},
                  success: function(response){ 
                      $('.pass-body').html(response); 
                      $('#passModal').modal('show'); 
                  }
              });
          });
        });
</script>
<?php
    if(isset($_POST['Delete'])){
        $id = $_POST['id'];
        $sequel = "DELETE FROM departments WHERE id = '$id'";
        $query = mysqli_query($mysqli, $sequel);

    }
    if(isset($_POST['Change'])){
      $id = $_POST['id'];
      $password = "ici-iligan";
      $hash = password_hash($password, PASSWORD_DEFAULT);
      
      $sequel = "UPDATE departments SET pass = ? WHERE id = ?";
      $stmt = $mysqli->prepare($sequel);
      $stmt->bind_param("si", $hash, $id);
      $result = $stmt->execute();
      if($result){
        echo "<script>alert('Password Changed!')</script>";
        echo "<script>window.location.href='manage_departments.php'</script>";
        $stmt->close();
      }
      
    }
?>
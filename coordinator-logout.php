<?php
    session_start();

    unset($_SESSION['email']);
    unset($_SESSION['pass']);

    session_destroy();
    
    echo "<script>alert('Logout completed'); window.location='index.php'; </script>";
?>
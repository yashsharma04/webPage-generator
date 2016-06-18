<?php
  session_start();
  $_SESSION['logged_in'] = 1 ;
  header("Location:admin.php");
?>

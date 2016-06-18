<!--
<div class='main1'>
<table class="responsive-table">
 <thead>
   <tr>
      <th data-field="S_No">S_No</th>
       <th data-field="Title">Title</th>
       <th data-field="Details">Details</th>
       <th data-field="Edit"></th>
       <th data-field="Delete"></th>
   </tr>
 </thead>
 <tbody> -->

<?php
session_start();
if(!isset($_SESSION['logged_in']))
  header('Location:index.html');
      // $title = $_POST['tt'];
      // $details = $_POST['dd'];
      $id = $_POST['id'];
      $s=1 ;
      $servername = "localhost";
      $username = "root";
      $password = "";
      $conn = new mysqli($servername, $username, $password,'admin');


      if ($conn->connect_error)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql1 = "delete from pages where id='".$id."'";
      $result = mysqli_query($conn,$sql1);
      ?>
<!--
    </tbody>
    </table>
    </div> -->

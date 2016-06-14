<?php
    session_start();
    if(!isset($_SESSION['logged_in']))
      header('Location:index.html');


     $title = $_POST['title'];
     $details = $_POST['details'];
    //  $date= $_POST['date'];
      $date = date("Y/m/d");

    // Storing source path of the file in a variable
      $targetPath = "upload/".$_FILES['imgupload']['name'];
      move_uploaded_file($_FILES['imgupload']['tmp_name'], $targetPath);
      $servername = "localhost";
      $username = "root";
      $password = "";
      print_r($targetPath);
      $conn = new mysqli($servername, $username, $password,'admin');

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "insert into pages  (title,details,images,date) values ('".$title."','".$details."','".$targetPath."','".$date."');";

      $result = mysqli_query($conn,$sql);
      header ("Location:admin.php");
      // $num=mysqli_num_rows($result);
?>

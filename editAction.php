<?php
session_start();
    if(!isset($_SESSION['logged_in']))
      header('Location:index.html');

      $title = $_POST['title'];
      $details = $_POST['details'];
      $id = $_POST['id'];
      $date = date("Y/m/d");
      // $image = $_POST['image'];
      $image = $_POST['image'];
      $targetPath = "upload/".$_FILES['imgupload']['name'];
      move_uploaded_file($_FILES['imgupload']['tmp_name'], $targetPath);

      $check = substr($targetPath, strrpos($targetPath,'/') + 1);
      if ($check=='')
        $targetPath='upload/'.$image;
      echo $targetPath;

      $servername = "localhost";
      $username = "root";
      $password = "";
      $conn = new mysqli($servername, $username, $password,'admin');

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // $sql = "select * from pages where images ='".$targetPath."' where id ='".$id."'";
      // $result = mysqli_query($conn,$sql);


      $sql = "update pages set title='".$title."' ,images='".$targetPath."' , details='".$details."' , date='".$date."' where id='".$id."' ;";
      //  $sql = "insert into pages  (title,details) values ('.$title.','.$details.') where id='".$id."' ;";

      $result = mysqli_query($conn,$sql);
      // $num=mysqli_num_rows($result);
      header("Location:admin.php");
?>

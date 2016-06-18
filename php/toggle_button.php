<?php
session_start();
if(!isset($_SESSION['logged_in']))
  header('Location:index.html');

      // $title = $_POST['tt'];
      // $details = $_POST['dd'];
      $id = $_POST['id'];

      $servername = "localhost";
      $username = "root";
      $password = "";


      $conn = new mysqli($servername, $username, $password,'admin');


      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql1 = "select toggle from pages where id='".$id."' ;";
      $result = mysqli_query($conn,$sql1);

      $row = $result->fetch_assoc();
      $toggle = $row['toggle'] ;

      // echo $toggle;
      if ($toggle ==0 )
        $toggle=1 ;
      else
        $toggle=0 ;


      $sql = "update pages set toggle='".$toggle."' where id='".$id."' ;";
      //  $sql = "insert into pages  (title,details) values ('.$title.','.$details.') where id='".$id."' ;";
      echo "<a  id='".$id."' class='toggle waves-effect waves-light btn' onclick='toggle(".$id.")'>";

      if($toggle==1)
        echo "Active</a>";
      else
        echo "inActive</a>";

      $result = mysqli_query($conn,$sql);
      // $num=mysqli_num_rows($result);

?>

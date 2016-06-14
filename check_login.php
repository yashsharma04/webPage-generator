<?php

  $username = $_POST['username_f'];
  $pwd = $_POST['pwd_f'];


  $servername = "localhost";
  $username_db = "root";
  $password_db = "";

  // Create connection
  $conn = new mysqli($servername, $username_db, $password_db,'admin');

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //  echo "Connected successfully <br>";
  // $after_md = md5($pwd);
  $sql = "select * from Authentication where password ='".$pwd."' and username ='".$username."' ;";
  $result = mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if ($num > 0)
  {
    echo "OK";
  }
  else
   echo " Fail";

?>

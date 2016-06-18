<?php

session_start();
if(!isset($_SESSION['logged_in']))
  header('Location:index.html');
  $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Fixed Top Navbar Example for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand cc" href="#">BlueCube</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav cc">

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = new mysqli($servername, $username, $password,'admin');
            if ($conn->connect_error)
            {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql = "select * from pages ;";
            $result = mysqli_query($conn,$sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                if ($row['toggle']==1)
                {
                  if ($row['id']==$id)
                    echo "<li class='active cc'><a href='?id=".$row['id']."'>".$row['title']."</a></li>";
                  else
                    echo "<li ><a href='?id=".$row['id']."'>".$row['title']."</a></li>";
                }

              }
            }
            else
            {
              // echo "0 results";
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="topsection">
					<!-- <h1>Hello</h1> -->
          <?php
            $sql = "select * from pages where  id='".$id."';";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                echo "<p>".$row['details']."</p>";
              }
            }
            else
            {
            }
          ?>
				</div>
			</div>
		</div>
    <?php
      $sql = "select images from pages where  id='".$id."';";
      $result = mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      // echo "hello";
      // echo ;
      // echo "hello";
      echo "<img src='".$row['images']."'/>";
    ?>
     </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

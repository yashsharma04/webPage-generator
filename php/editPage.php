<?php
      session_start();
      if(!isset($_SESSION['logged_in']))
        header('Location:index.html');

      $id = $_POST['id'];
      $s = 1 ;
      $servername = "localhost";
      $username = "root";
      $password = "";

      $conn = new mysqli($servername, $username, $password,'admin');

      if ($conn->connect_error)
      {
        die("Connection failed: " . $conn->connect_error);
      }
      // $sql1 = "delete from pages where id='".$id."'";
      // $result = mysqli_query($conn,$sql1);
      $sql = "select * from pages where id='".$id."'";
      $result = mysqli_query($conn,$sql);
      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          $title = $row['title'];
          $details = $row['details'];
          $date = $row['date'] ;
          $image = $row['images'];
          $imgnew = substr($image, strrpos($image, '/') + 1);
        }
      }
      else
      {
        echo "0 results";
      }
?>

<form action="editAction.php" method="POST" enctype="multipart/form-data">

<div class='main'>
    <div class='container'>

            <div class='row'>
              <div class='input-field col s12'>
                <?php
                  echo "<input type='hidden' name='id' value='".$id."'/>";
                  echo "<textarea id='title' class='materialize-textarea textarea_modify1'  name='title' class='validate' >".$title."</textarea>";
                ?>
                <!-- <label for='title'>Title</label> -->
              </div>
            </div>

    </div>
  </div>
  <div class='main'>
      <div class='container'>

              <div class='row'>
                <div class='input-field col s12'>
                  <?php
                    echo "<textarea id='Details' class='materialize-textarea textarea_modify1'  name='details' aria-required='true'>".$details."</textarea>";
                  ?>
                  <!-- <label for='Details'>Details</label> -->
                </div>
              </div>

      </div>
    </div>

    <div class='main'>
      <div class='container'>
       <div class="file-field input-field">
         <div class="btn">
           <span>File</span>
           <?php
              echo "<input id ='file' type='file' name='imgupload' value ='".$imgnew."'>";
            ?>

         </div>
         <div class="file-path-wrapper">
           <?php
              echo "<input class='file-path validate' name='image' type='text' value='".$imgnew."'></input>";
            ?>
         </div></br>
       </div>


       <?php
       echo "<img src='upload/".$imgnew."'/>";
       ?>
       <input type="submit" name="name" value="Submit" />
   </div>

  </div>
  </form>

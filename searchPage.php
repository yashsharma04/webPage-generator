
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
 <tbody>

<?php
session_start();
if(!isset($_SESSION['logged_in']))
  header('Location:index.html');
      // $title = $_POST['tt'];
      // $details = $_POST['dd'];


      $servername = "localhost";
      $username = "root";
      $password = "";
      $title = $_POST['title'];
      $date = $_POST['date'];


      $conn = new mysqli($servername, $username, $password,'admin');
      if ($conn->connect_error)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      if (!($title=='' and  $date==''))
      {
        if ($date=='')
          $sql = "select * from pages where title ='".$title."';";
        else if ($title=='')
          $sql = "select * from pages where date ='".$date."';";
        else
          $sql = "select * from pages where date ='".$date."' and title ='".$title."';";
      }

      else
        $sql = "select * from pages ;";

      $result = mysqli_query($conn,$sql);
      $s=1 ;
      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          $toggle = $row['toggle'];
          echo "<tr>";
          echo "<td>";
          echo "".$s;
          $s = $s + 1 ;
          echo "</td>";
          echo "<td>";
          echo $row['title'];
          echo "</td>";
          echo "<td>";
          echo $row['date'];
          echo "</td>";
          echo "<td>";
          echo "<a id='".$row['id']."' class='edit waves-effect waves-light btn' onclick='edit(".$row['id'].")'>Edit</a>";
          echo "</td>";
          echo "<td>";
          echo "<a id='".$row['id']."' class='delete waves-effect waves-light btn' onclick='del(".$row['id'].")'>Delete</a>";
          echo "</td>";
          echo "<td>";
          echo "<a id='".$row['id']."' class='view waves-effect waves-light btn' onclick='view(".$row['id'].")'>View</a>";
          echo "</td>";
          echo "<td>";
          echo "<div class='tog_cont".$row['id']."'>";
          echo "<a  id='".$row['id']."' class='toggle waves-effect waves-light btn' onclick='toggle(".$row['id'].")' >";
          if($toggle==1)
            echo "Active</a>";
          else
            echo "inActive</a>";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
        }
      }
      else
      {
        // echo "0 results";
      }
?>
</tbody>
</table>
</div>

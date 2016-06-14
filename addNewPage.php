<?php
   session_start();
  if(!isset($_SESSION['logged_in']))
    header('Location:index.html');
     ?>
     <form action="action.php"method="post" enctype="multipart/form-data">

      <div class='main'>
          <div class='container'>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <textarea id='title' name ='title' class='materialize-textarea textarea_modify1' class="validate" required></textarea>
                      <label for='title'>Title</label>
                    </div>
                  </div>
          </div>
        </div>
        <div class='main'>
            <div class='container'>
              <!-- <div class='row'>
                  <form class='col s12'> -->
                    <div class='row'>
                      <div class='input-field col s12'>
                        <textarea id='details' name='details' class='materialize-textarea  textarea_modify1' required="" aria-required="true"></textarea>
                        <label for='Details'>Details</label>
                      </div>
                    </div>
            </div>
          </div>
    <div class='main'>
      <div class='container'>
       <div class="file-field input-field">
         <div class="btn">
           <span>File</span>
           <input id ='file' type="file" name="imgupload">
         </div>
         <div class="file-path-wrapper">
           <input class="file-path validate" type="text">
         </div></br>
       </div>

       <!-- <input class='date1' id ='date' name='date' type= 'text' placeholder='dd/mm/yy'/> -->
       <input type="submit" name="name" value="Submit" />
   </div>

 </div>
</form>

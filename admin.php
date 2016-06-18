<!-- COPYRIGHT @ YASH_SHARMA -->
<!-- SEARCH BAR (Using title and date ) -> DONE
     IMAGE -> DONE
     DUPLICATE FORMS
     FILE STRUCTURE
     SESSION_LOGOUT -> DONE
     TOGGLE BUTTON  -> DONE
     DELETE CONFIRM -> DONE
     USERS -> NOT REQUIRED
     Button Load Ajax  -> DONE
     IMAGE IN EDIT -> DONE
-->
<?php
  session_start();
  if(!isset($_SESSION['logged_in']))
    header('Location:index.html');
 ?>
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css" />
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title>
          admin
        </title >
      <script>
      function toggle (id)
      {
        var idd = id ;
        // event.preventDefault();
        $.ajax({
             type:'POST',
             url: 'toggle_button.php',
             data : {id:idd},
             success: function(response) {

              jQuery(".tog_cont"+id).html(response);

             }
         });
      }
      function del(id)
      {
        var txt;
        var r = confirm("Are You Sure ?");
        if (r != true) {
        }
        else {
          var idd = id ;
          // event.preventDefault();
          $.ajax({
               type:'POST',
               url: 'deletePage.php',
               data : {id:idd},
               success: function(response) {

                jQuery("#main_parent").html(response);
                $("#allPages").trigger("click");

               }
           });
        }
      }
      function edit(id)
      {
        $.ajax({
             type:'POST',
             url: 'editPage.php',
             data : {'id':id},
             success: function(response) {
              jQuery("#main_parent").html(response);

             }
         });

      }
      function view(id)
      {
        var idd= id;
        var v= "viewPage.php?id="+idd;
        window.open(v);

      }
      jQuery(document).ready(function() {
        jQuery("#addNew").click(function (event) {

          event.preventDefault();
          $.ajax({
               type:'POST',
               url: 'addNewPage.php',
               success: function(response) {
                 jQuery("#main_parent").html(response);
               }
           });
        });
        jQuery("#allPages").click(function (event) {

          event.preventDefault();
          $.ajax({
               type:'POST',
               url: 'showAllPages.php',

               success: function(response) {
                jQuery("#main_parent").html(response);

                jQuery('.search').change(function(){
                  var title  = document.getElementById('search_title').value;
                  var date = document.getElementById('search_date').value;
                  Materialize.toast(title, 4000) ;
                  Materialize.toast(date, 4000) ;

                  $.ajax ({
                    type :'POST',
                    url :'searchPage.php',
                    data:{ 'title' : title , 'date':date },
                    success:function(response)
                    {
                      jQuery("#result").html(response);
                    }
                  });
                });
                // jQuery(".toggle").click(function (event) {
                //
                //   var idd = $(this).attr('id');
                //   event.preventDefault();
                //   $.ajax({
                //        type:'POST',
                //        url: 'toggle_button.php',
                //        data : {id:idd},
                //        success: function(response) {
                //
                //         jQuery(".tog_cont").html(response);
                //         // $(".tog_cont").trigger("click");
                //        }
                //    });
                // });
               }
           });
        });
      });

      </script>

    </head>
    <body>
      <!-- Navbar goes here -->
      <nav class="top-nav nav_color">
        <a href='logout.php' >LOGOUT </a>
      </nav>

      <div class="container">
        <a class="button-collapse top-nav full hide-on-large-only" data-activates="nav-mobile" href="#">
          <i class="material-icons">menu</i>
        </a>
     </div>


      <!-- Page Layout here -->
      <div class="row">
        <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
          <!-- Grey navigation panel
                This content will be:
            3-columns-wide on large screens,
            4-columns-wide on medium screens,
            12-columns-wide on small screens  -->

            <div class='container'>
              <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0);" >
                    <li class="logo">
                    <li class="search">
                    <li class="bold">
                      <a class="waves-effect waves-teal nav_color" href="">My Site</a>
                    </li>

                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">
                        <li class="bold">
                          <a class="collapsible-header waves-effect waves-teal">Stats</a>
                        </li>
                        <li class="bold">
                          <a class="collapsible-header waves-effect waves-teal">Pages</a>
                            <div class="collapsible-body" style="display: none;">
                                <ul>
                                  <li>
                                    <a id ='addNew' href="">Add New</a>
                                  </li>
                                  <li>
                                    <a id='allPages' href="">All Pages</a>
                                  </li>
                                    <a style='display:none' type='hidden' id='edit_edit' href=""></a>

                                </ul>
                            </div>
                        </li>
                      </ul>
                    </li>
              </ul>
            </div>
        </div>

          <div class="col s12 m8 l9 "> <!-- Note that "m8 l9" was added -->
             <!-- Teal page content -->
             <div id="main_parent">

             </div>

          </div>
        </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>

<?php
//including the database configs once
   include_once '/php/database.php';
   
?>    

<!DOCTYPE html>
<html>
   <head>
      <!-- Our custom JS; Must have this for our timer-->
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
      <!-- Bootstrap, jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
         crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
         crossorigin="anonymous"></script>
      <!-- Our custom stylesheet-->
      <link rel="stylesheet" type="text/css" href="stylesheet.css" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
         crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>

         var results_html = ``;
         function processItem(ID){
             var name=document.getElementById(`item_name_${ID}`).value;
             var tag=document.getElementById(`tag_${ID}`).value;
             var time=$(`#to_do_${ID}_tag_${ID} span`).html();

             results_html = `${results_html}</br>
                           To Do Name: ${name}</br>
                           Tag: ${tag}</br>
                           Time Taken: ${time} seconds
                           </br></br>`;

             $.ajax({
               type:'post',
               url:'ToDoItem.php',
               data:'name='+name+'tag='+tag+'time='+time,
               success: function(){
                  $('#results_container').html(results_html);
                  $(`#to_do_${ID}`).remove();
                  x--;
               }
             });
             return false;
         }
         
      </script>
   </head>
   <body>
      <div class="topnav">
         <a class="active" href="#todo"><i class="fa fa-sticky-note-o"></i> To Do </a>
         <!-- <a href="tracker.html" target="_self"><i class="fa fa-bar-chart"></i> Tracker </a> -->
         <div class="topnav-right"><a href="#profile"><i class="fa fa-fw fa-user"></i> Profile </a></div>
      </div>
      <div class="wrapper">
         <div class="main_body_div">
            <h1> To Do Items </h1>
            <p> Enter your to-do's here, along with the tag or category. You may time how long these tasks take you.</p>
            <fieldset>           
               <div id="to_do_container">
                  <?php include 'ToDoItem.php';?>
                  <div class="to_do" id="to_do_0">
                     <form action="ToDoItem.php" method='POST'>

                        <a href="#" id="remove">x</a>
                        To Do Item: <input type="text" id="item_name_0" name="todo_item_name">
                        Tag: <input type="text" id="tag_0" name="tag_0">
                        <div id="to_do_0_tag_0" class="basic stopwatch"></div>
                        <input type="submit" id="0" class="submit" name="to_do_item" onclick="processItem(this.id);">
                        <!-- <input type="submit" id="0" class="submit" name="to_do_item"> -->
                     </form>
                  </div>

                  
                     
                  
               </div>
            </fieldset>
            <div id="add_button">
               <a href="#" id="add">Add More</a>
            </div>
         </div>
         <div class="tracker_body">
            <h1>Tracking Results</h1>
            <p>Track your progress for your to-do items here!</p>
            <div id="results_container">
            </div>
         </div>
      </div>
   </body>
</html>
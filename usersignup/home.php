<?php
 
  session_start();
 
  
?>
<html>
   <head>
    <title> Home Page</title>
 
  <link rel = "stylesheet" type = "text/css" href = "style.css">
        <link rel = "stylesheet" type = "text/css"
        href ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" > 

   </head>
   <body>

   <div class ="container">
    <a class="float-right"  href ="logout.php"> LOGOUT </a>
   <h1> Welcome <?php echo  $_SESSION['username']; ?> </h1>

   <div class = "col-md-6 bus-right">
   <form action = "busschedule.php" method = "post">
   <button type = "submit" class ="btn btn-primary"> Bus Schedule  </button>
   </div>




</div>
   </body>
</html>
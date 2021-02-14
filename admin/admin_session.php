<?php
   session_start();
?>
<html">
   <head>
      <title>Admin <?php echo $_SESSION['login_user'] ?> </title>
      <link href="admin.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   
   <body>
      <section class="forms-section">
         <div class="top-border">
            <div class="emblem">
               <img src="Logos/emblem.png">
            </div>
            <label class="section-title">Welcome Admin <?php echo $_SESSION['login_user'] ?> </label> 
            <a href="../login.php">
               <div class="exit">
                  <img src="Logos/exit1.png">
               </div>
            </a>
         </div>
         <form class="modes">
            <div class="icons">
               <a href="modes/basic_info.php">
                  <i class="fa fa-bold"></i>
               </a>
            </div>
            <div class="icons">
               <a href="modes/response_time.php">
                  <i class="fa fa-clock-o"></i>
               </a>
            </div>
            <div class="icons">
               <a href="modes/headers.php">
                  <i class="fa fa-header"></i>
               </a>
            </div>
            <div class="icons">
               <a href="modes/net_map.php">
                  <i class="fa fa-map"></i>
               </a>
            </div>
         </form>
      </section>
   </body>
</html>
<?php
   
?>
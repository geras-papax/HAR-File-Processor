<?php
   session_start();
?>
<html">
   <head>
      <title>Admin <?php echo $_SESSION['login_user'] ?> </title>
      <link href="basic_info.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
   <script src="basic_info.js"></script> 
   <body  onload="loadStats()">
      <section class="forms-section">
         <div class="top-border">
            <div class="emblem">
               <a href="../admin_session.php">
                  <img src="../Logos/emblem.png">
               </a>
            </div>
            <label class="section-title">Welcome Admin <?php echo $_SESSION['login_user'] ?> </label> 
            <a href="../../login.php">
               <div class="exit">
                  <img src="../Logos/exit1.png">
               </div>
            </a>
         </div>
         <div class="stats">
            <div class="icons">
               <div id="num_content"></div>
            </div>
            <div class="icons">
               <div id="num_users"></div>
            </div>
            <div class="icons">
               <div id="num_status"></div>
            </div>
         </div>
         <div class="icons">
            <div id="num_domains"></div>
         </div>
         <div class="statsv2">
            <div class="icons">
               <div id="avg_content"></div>
            </div>
            <div class="icons">
               <div id="num_suppliers"></div>
            </div>
         </div>
      </section>
   </body>
</html>
<?php

?>
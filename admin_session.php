<?php
   session_start();
?>
<html">
   <head>
      <title>Admin<?php echo $_SESSION['login_user'] ?> </title>
      <link href="welcome.css" rel="stylesheet" type="text/css" />
   </head>
   
   <body>
      <section class="forms-section">
        <h1 class="section-title">Welcome Admin <?php echo $_SESSION['login_user'] ?> </h1> 
        <a href="login.php">
            <div class="cv-link">
               <img src="Logos/exit1.png">
            </div>
         </a>
      </section>
   </body>
   
</html>
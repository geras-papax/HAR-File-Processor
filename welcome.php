<?php
   session_start();
?>
<html">
   <head>
      <title>Welcome <?php echo $_SESSION['login_user'] ?> </title>
      <link href="login.css" rel="stylesheet" type="text/css" />
   </head>
   
   <body>
      <h1>Welcome <?php echo $_SESSION['login_user'] ?> </h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>






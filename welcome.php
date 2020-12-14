<?php
   session_start();
?>
<html">
   <head>
      <title>Welcome <?php echo $_SESSION['login_user'] ?> </title>
      <link href="welcome.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   
   <body>
      <section class="forms-section">
      <div class="top-border">
        <label class="section-title">Welcome <?php echo $_SESSION['login_user'] ?> </label> 
        <a href="login.php">
            <div class="cv-link">
               <img src="Logos/exit1.png">
            </div>
         </a>
      </div>
         <form class="upload-file" method="POST" enctype="multipart/form-data">
            <div class="wrapper">
               <div class="file-upload">
                  <input type="file" name="file" id="file" />
                  <i class="fa fa-cloud-upload"></i>
               </div>
               <input type="button" value="Upload" id="btn_uploadfile"
               onclick="uploadFile();">
            </div>
         </form>
      </section>
   </body>
   <script src="welcome.js"></script>
</html>


<?php
   session_start();
?>
<html">
   <head>
      <title>Welcome <?php echo $_SESSION['login_user'] ?> </title>
      <link href="welcome.css" rel="stylesheet" type="text/css" />
   </head>
   
   <body>
      <section class="forms-section">
        <h1 class="section-title">Welcome <?php echo $_SESSION['login_user'] ?> </h1> 
        <a href="login.php">
            <div class="cv-link">
               <img src="Logos/exit1.png">
            </div>
         </a>
         <div class="upload-file">
            Select file to upload:
            <input type="file" name="file" id="file">
            <input type="button" value="Upload" id="btn_uploadfile"
               onclick="uploadFile();">
         </div>
      </section>
   </body>
   <script src="welcome.js"></script>
</html>






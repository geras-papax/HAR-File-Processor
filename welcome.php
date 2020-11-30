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
         <form action="" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
         </form>
      </section>
   </body>
   
</html>
<?php
$target_dir = "HarFiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$jsonFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {

 // Check if file already exists
 if (file_exists($target_file)) {
   echo "Sorry, file already exists.";
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 /*if($jsonFileType != "har") {
   echo "Sorry, only HAR files are allowed.";
   $uploadOk = 0;
 }*/
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
 }
}
?>





<?php
   session_start();
?>
<html">
   <head>
      <title>Welcome <?php echo $_SESSION['login_user'] ?> </title>
      <link href="welcome.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""></script>
      <script
      src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"> </script>
      <script
      src="leaflet-heatmap.js"> </script>
   </head>
   
   <body>
      <section class="forms-section">
         <div class="top-border">
            <div class="emblem">
               <img src="Logos/emblem.png">
            </div>
            <label class="section-title">Welcome <?php echo $_SESSION['login_user'] ?> </label> 
            <a href="../login.php">
               <div class="exit">
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
         <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
               <label>Filtered File is Ready</label>
               <div class="modal-btns">
                  <input type="button" value="Send to Base" id="server" onclick="uptoBase();">
                  <input type="button" value="Download" id="download" onclick="download();">
               </div>
            </div>
         </div>
         <div class="info">
            <div class="profile">
               <label class="section-title">Profile Settings </label>
               <form class="form form-signup" method="POST" action="welcome.php">
                  <div class="input-block">
                  <label for="signup-username">New Username</label>
                  <input name= "signup-username" id="signup-username" type="text" required>
                  </div>
                  <div class="input-block">
                  <label for="signup-password">New Password</label>
                  <!-- for checking the password requirments minlen=8, at least 1 number(\d), 1 symbol(\W), 1 uppercase letter([A-Z])--> 
                  <input name= "signup-password" id="signup-password" type="password" minlength=8 maxlength=20 pattern="(?=.*\d)(?=.)(?=.*\W)(?=.*[A-Z]).*"
                  title = 'Length: 8 - 20 & 1 uppercase letter & 1 number & 1 symbol.'
                  required>
                  </div>
                  <div class="input-block">
                  <label for="signup-password-confirm">Confirm New Password</label>
                  <input id="signup-password-confirm" type="password" required>
                  </div>
                  <button id="sign-up-btn" type="submit" class="btn-signup">Continue</button>
               </form>
            </div>
            <div class="map">
               <div class= "mapid" id="mapid"></div>
            </div>
            <div class="stats">
               <div id="stats_field"></div>
               <div class="stats-icon">
                  <i class="fa fa-bar-chart" aria-hidden="true" onclick="showStats();"></i>
               </div>
            </div>
         </div>
      </section>
   </body>
   <script src="welcome.js"></script>
   <script src="jquery-3.5.1.js"></script>

</html>
<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'pao134ever');
   define('DB_DATABASE', 'har-processor');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // change profile username and password
      if(isset($_POST['signup-username']) && isset($_POST['signup-password'])){
        $password = mysqli_real_escape_string($db,$_POST['signup-password']);
        $username = mysqli_real_escape_string($db,$_POST['signup-username']);
        $email = $_SESSION['login_email'];
      }

      //email existence check
      $sql_new = "UPDATE users 
      SET username = '$username', passwrd = '$password'  
      WHERE email = '$email'"; 

      mysqli_query($db,$sql_new);
      $_SESSION['login_user'] = $username;      
   }

?>
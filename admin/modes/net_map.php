<?php
   session_start();

    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $sql1 = "SELECT content_type from rheaders group by content_type;";
    $stmt1 = mysqli_query($db, $sql1);
    $cont = mysqli_fetch_all($stmt1);

    $sql4 = "SELECT supplier from entries group by supplier;";
    $stmt4 = mysqli_query($db, $sql4);
    $suppliers= mysqli_fetch_all($stmt4);
?>
<html">
   <head>
      <title>Admin <?php echo $_SESSION['login_user'] ?> </title>
      <link href="net_map.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""></script>
   </head>
   <body>
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
         <div class="map">
               <div class= "mapid" id="mapid"></div>
         </div>       
      </section>
   </body>
   <script src="../../user/jquery-3.5.1.js"> </script> 
   <script src="net_map.js"></script>
</html>

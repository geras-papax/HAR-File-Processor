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

    $sql2 = "SELECT wday from entries group by wday order by wday;";
    $stmt2 = mysqli_query($db, $sql2);
    $days = mysqli_fetch_all($stmt2);
    $wdays = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

    $sql3 = "SELECT method from requests group by method;";
    $stmt3 = mysqli_query($db, $sql3);
    $methods = mysqli_fetch_all($stmt3);

    $sql4 = "SELECT supplier from entries group by supplier;";
    $stmt4 = mysqli_query($db, $sql4);
    $suppliers= mysqli_fetch_all($stmt4);
?>
<html">
   <head>
      <title>Admin <?php echo $_SESSION['login_user'] ?> </title>
      <link href="response_time.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
   <script src="../../user/jquery-3.5.1.js"> </script> 
   <script src="response_time.js"></script>
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
         <div class="chart" id="chart"></div>
         <div class="stats">
            <div class="selector">
                <label for="content-type">Choose Content-Type</label>
                    <select name="content-type" id="content-type">
                    <option>Select a type:</option>
                    <option value="all">ALL</option>
                    <?php
                    foreach($cont as $row)
                    {
                    ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php
                    }
                    ?>
                    </select>
            </div>
            <div class="selector">
                <label for="wday">Choose day of the week</label>
                    <select name="wday" id="wday">
                    <option>Select a day:</option>
                    <option value="all">ALL</option>
                    <?php
                    foreach($days as $row)
                    {
                    ?>
                        <option value="<?php echo $wdays[intval($row[0])];?>"><?php echo $wdays[intval($row[0])];?></option>
                    <?php
                    }
                    ?>
                    </select>
            </div>
            <div class="selector">
                <label for="method">Choose HTTP Method</label>
                    <select name="method" id="method">
                    <option>Select a HTTP method:</option>
                    <option value="all">ALL</option>
                    <?php
                    foreach($methods as $row)
                    {
                    ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php
                    }
                    ?>
                    </select>
            </div>
            <div class="selector">
                <label for="supplier">Choose Supplier</label>
                    <select name="supplier" id="supplier">
                    <option>Select a supplier:</option>
                    <option value="all">ALL</option>
                    <?php
                    foreach($suppliers as $row)
                    {
                    ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php
                    }
                    ?>
                    </select>
            </div>
         </div>
      </section>
   </body>
</html>

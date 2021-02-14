<?php
    session_start();
    ini_set('max_execution_time', 300);

        
    $user = $_SESSION['login_email'];
    $loc = array();

    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $sql_stored = "SELECT *
    FROM `har-processor`.`map_data` order by 'count' desc;";
    $stored = mysqli_query($db,$sql_stored);
    $dataS = mysqli_fetch_all($stored);
    foreach ($dataS as $rows) 
    {                                
        $loc[] = array('lat' => floatval($rows[0]), 'lng' => floatval($rows[1]), 'count' => intval($rows[2]), 'ulat' => floatval($rows[4]), 'ulng' => floatval($rows[5]));
    }
     
    echo json_encode($loc);

    
?>
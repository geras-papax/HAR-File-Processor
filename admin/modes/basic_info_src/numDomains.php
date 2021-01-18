<?php
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $sql = "SELECT COUNT(id_req), url_domain
    FROM requests GROUP BY url_domain  ;";

    $loc = array();

    $stmt = mysqli_query($db, $sql);
    $data = mysqli_fetch_all($stmt);
    foreach ($data as $rows) 
    {                                
        $loc[] = array(strval($rows[1]), intval($rows[0]));
    }
    echo json_encode($loc);
?>
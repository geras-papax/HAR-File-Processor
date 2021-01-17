<?php
    session_start();
    ini_set('max_execution_time', 300);

        
    $user = $_SESSION['login_email'];

    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // These are all PHP variables. The web browser doesn't know about them.

    $sql = "SELECT COUNT(entries.id_e), entries.serverIP, entries.langitude, entries.longitude
    FROM ((entries INNER JOIN har_files ON entries.id_har = har_files.id_H)
    INNER JOIN users ON har_files.user_email = '$user') GROUP BY entries.serverIP;";

    $stmt = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($stmt);
    $data = mysqli_fetch_all($stmt);
    $loc = array();

    foreach ($data as $row) 
    { 
        $ip = $row[1];
        $result = "";
        if($ip != ""){
            $ch =curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/{$ip}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result=curl_exec($ch);
            if($result != ""){
                $result=json_decode($result);
                $ip_lat = $result->lat;
                $ip_lon = $result->lon;
                $loc[] = array('lat' => $ip_lat, 'lng' => $ip_lon, 'count' => intval($row[0]));
            }
        }
    }
    echo json_encode($loc, JSON_NUMERIC_CHECK); 
    
?>
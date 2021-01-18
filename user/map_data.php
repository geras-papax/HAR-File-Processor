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

    $sql = "SELECT COUNT(entries.id_e), entries.serverIP, entries.langitude, entries.longitude, entries.id_e
    FROM ((entries INNER JOIN har_files ON entries.id_har = har_files.id_H)
    INNER JOIN users ON har_files.user_email = '$user') WHERE entries.map_check = 0 GROUP BY entries.serverIP;";

    $stmt = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($stmt);
    if($numRows = 0){
        $sql_stored = "SELECT *
        FROM `har-processor`.`map_data` WHERE user = '$user';";
        $stored = mysqli_query($db,$sql_stored);
        $dataS = mysqli_fetch_all($stored);
        foreach ($dataS as $rows) 
        {                                
            $loc[] = array('lat' => $rows[0], 'lng' => $rows[1], 'count' => intval($rows[2]));
        }

        echo json_encode($loc, JSON_NUMERIC_CHECK);
    }else{//new data to stored
        //already stored data
        $sql_stored = "SELECT *
        FROM `har-processor`.`map_data` WHERE user = '$user';";
        $stored = mysqli_query($db,$sql_stored);
        $dataS = mysqli_fetch_all($stored);
        foreach ($dataS as $rows) 
        {                                
            $loc[] = array('lat' => $rows[0], 'lng' => $rows[1], 'count' => intval($rows[2]));
        }
        //new data 
        $data = mysqli_fetch_all($stmt);
        foreach ($data as $row) 
        { 
            $ip = $row[1];
            //im checking every entry that i use
            $sql_alter = "SELECT entries.id_e
            FROM ((entries INNER JOIN har_files ON entries.id_har = har_files.id_H)
            INNER JOIN users ON har_files.user_email = '$user') ;";
            $stm = mysqli_query($db,$sql_alter);
            $d = mysqli_fetch_all($stm);
            foreach ($d as $entry) 
            {                                
                $sql_new = "UPDATE entries 
                        SET map_check = 1 
                        WHERE id_e = '$entry[0]';";
                        mysqli_query($db,$sql_new);
            }
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
                    //insert into map_data table for faster loading in the next load of the heatmap
                    $sql_insert = "INSERT INTO `har-processor`.`map_data` (`serverLat`, `serverLon`, `count`, `user`, `Lat`, `Lon`) 
                    VALUES('$ip_lat', '$ip_lon', '$row[0]', '$user', '$row[2]', '$row[3]');";
                    mysqli_query($db,$sql_insert);
                    
                    $loc[] = array('lat' => $ip_lat, 'lng' => $ip_lon, 'count' => intval($row[0]));
                }
            }
        }
        echo json_encode($loc, JSON_NUMERIC_CHECK);
    } 
    
?>
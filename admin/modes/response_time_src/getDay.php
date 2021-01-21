<?php
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    $wdays = array("Sunday"=>0,"Monday"=>1,"Tuesday"=>2,"Wednesday"=>3,"Thursday"=>4,"Friday"=>5,"Saturday"=>6);

    if(isset($_GET["query"])){
        $query = $_GET["query"];
        $sql = "SELECT REGEXP_SUBSTR(startedDateTime,'[0-9]*:[0-9]*:[0-9]*'),avg(wait_time) from 
        entries where wday = '$wdays[$query]'
         group by REGEXP_SUBSTR(startedDateTime,'[0-9]*:[0-9]*:[0-9]*')
         order by REGEXP_SUBSTR(startedDateTime,'[0-9]*:[0-9]*:[0-9]*');";

        $loc = array();

        $stmt = mysqli_query($db, $sql);
        $data = mysqli_fetch_all($stmt);
        foreach ($data as $rows) 
        {                                
            $outputString = preg_replace('/[^0-9]/', '', strval($rows[0]));
            $time = array(intval(strval($outputString[0]).strval($outputString[1])),intval(strval($outputString[2]).strval($outputString[3])),intval(strval($outputString[4]).strval($outputString[5])));                                
            $loc[] = array($time, floatval($rows[1]));
        }
        echo json_encode($loc);
    }else{

    $sql = "SELECT REGEXP_SUBSTR(startedDateTime,'[0-9]*:[0-9]*:[0-9]*'),avg(wait_time) from entries 
    group by REGEXP_SUBSTR(startedDateTime,'[0-9]*:[0-9]*:[0-9]*')
    order by REGEXP_SUBSTR(startedDateTime,'[0-9]*:[0-9]*:[0-9]*');";

    $loc = array();

    $stmt = mysqli_query($db, $sql);
    $data = mysqli_fetch_all($stmt);
    foreach ($data as $rows) 
    {
        $outputString = preg_replace('/[^0-9]/', '', strval($rows[0]));
        $time = array(intval(strval($outputString[0]).strval($outputString[1])),intval(strval($outputString[2]).strval($outputString[3])),intval(strval($outputString[4]).strval($outputString[5])));                                 
        $loc[] = array($time, floatval($rows[1]));
    }
    echo json_encode($loc);
    }   
?>
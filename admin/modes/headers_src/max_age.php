<?php
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if(isset($_GET["query"])){
        $query = strval($_GET["query"]);
        $supplier = strval($_GET["supplier"]);
        $queries = explode(",", $query);
        $query = implode("','",$queries); 
        $count = count($queries);
        if($supplier == "" || $supplier == "all"){
            $sql = "SELECT avg(REGEXP_SUBSTR(cache_control,'[0-9]+')),content_type from 
            (((rheaders inner join responses on  rheaders.id_resp = responses.id_r ) 
            inner join har_files on responses.id_har = har_files.id_H )
            inner join entries on har_files.id_H = entries.id_har) 
            where  rheaders.content_type IN ('$query')
            group by rheaders.content_type
            HAVING COUNT(DISTINCT rheaders.content_type) = 1;";

            $loc = array();
            $loc[] = array('Content-Type','Max-Age');

            $stmt = mysqli_query($db, $sql);
            $data = mysqli_fetch_all($stmt);
            foreach ($data as $rows) 
            {                                  
                $loc[] = array($rows[1], floatval($rows[0]));
            }
            echo json_encode($loc);
        }else{
            $sql = "SELECT avg(REGEXP_SUBSTR(cache_control,'[0-9]+')),content_type from 
            (((rheaders inner join responses on  rheaders.id_resp = responses.id_r ) 
            inner join har_files on responses.id_har = har_files.id_H )
            inner join entries on har_files.id_H = entries.id_har) 
            where  rheaders.content_type IN ('$query') and entries.supplier = '$supplier'
            group by rheaders.content_type
            HAVING COUNT(DISTINCT rheaders.content_type) = 1;";

            $loc = array();
            $loc[] = array('Content-Type','Max-Age');

            $stmt = mysqli_query($db, $sql);
            $data = mysqli_fetch_all($stmt);
            foreach ($data as $rows) 
            {                                  
                $loc[] = array($rows[1], floatval($rows[0]));
            }
            echo json_encode($loc);
        }
    }elseif(!isset($_GET["query"]) && isset($_GET["supplier"])){

        $supplier = strval($_GET["supplier"]);
        $sql = "SELECT avg(REGEXP_SUBSTR(cache_control,'[0-9]+')),content_type from 
            (((rheaders inner join responses on  rheaders.id_resp = responses.id_r ) 
            inner join har_files on responses.id_har = har_files.id_H )
            inner join entries on har_files.id_H = entries.id_har) 
            where  entries.supplier = '$supplier'
            group by rheaders.content_type;";

            $loc = array();
            $loc[] = array('Content-Type','Max-Age');

            $stmt = mysqli_query($db, $sql);
            $data = mysqli_fetch_all($stmt);
            foreach ($data as $rows) 
            {                                  
                $loc[] = array($rows[1], floatval($rows[0]));
            }
            echo json_encode($loc);

    }
    else{

        $sql = "SELECT avg(REGEXP_SUBSTR(cache_control,'[0-9]+')),content_type from 
        (((rheaders inner join responses on  rheaders.id_resp = responses.id_r ) 
        inner join har_files on responses.id_har = har_files.id_H )
        inner join entries on har_files.id_H = entries.id_har) 
        group by rheaders.content_type;";

        $loc = array();
        $loc[] = array('Content-Type','Max-Age');

        $stmt = mysqli_query($db, $sql);
        $data = mysqli_fetch_all($stmt);
        foreach ($data as $rows) 
        {
            $loc[] = array($rows[1], floatval($rows[0]));
        }
        echo json_encode($loc);
    }   
?>
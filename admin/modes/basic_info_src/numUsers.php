<?php
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pao134ever');
    define('DB_DATABASE', 'har-processor');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $sql = "SELECT COUNT(email)
    FROM users WHERE role = 'user';";

    $stmt = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($stmt,MYSQLI_ASSOC);

    $count = mysqli_num_rows($stmt);

    echo "<table>";
    echo "<tr>";
    echo "<th>NUMBER OF USERS</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $row["COUNT(email)"]. "</td>";
    echo "</tr>";
    echo "</table>";
?>
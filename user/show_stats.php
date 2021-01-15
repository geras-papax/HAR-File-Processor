<?php

session_start();

define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'pao134ever');
define('DB_DATABASE', 'har-processor');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$user = $_SESSION['login_email'];

$sql = "SELECT up_date
FROM har_files WHERE user_email = '$user'
ORDER BY up_date DESC";

$stmt = mysqli_query($db, $sql);
$row = mysqli_fetch_array($stmt,MYSQLI_ASSOC);

$count = mysqli_num_rows($stmt);

echo "<table>";
echo "<tr>";
echo "<th>USER</th>";
echo "<th>LAST UPLOAD</th>";
echo "<th>NUMBER OF UPLOADS</th>";
echo "</tr>";
echo "<tr>";
echo "<td>" . $_SESSION['login_user'] . "</td>";
echo "<td>" . $row["up_date"]. "</td>";
echo "<td>" . $count . "</td>";
echo "</tr>";
echo "</table>";
?>
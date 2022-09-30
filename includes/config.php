<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentrecord";
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
define('APP_NAME', 'CRUD_APP');
?>
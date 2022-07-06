<?php

$host = "localhost"; 
$user = "root";
$password = ""; 
$database = "gms"; 
$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
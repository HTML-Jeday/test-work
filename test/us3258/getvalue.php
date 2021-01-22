<?php


$number = $_POST['number'];
$number = (int) $number;

$host = 'localhost'; 
$database = 'contest'; 
$user = 'root';
$password = ''; 

$db = new mysqli($host, $user, $password, $database);
$table = 'us3258';
$result = $db->query("SELECT value FROM $table WHERE id = $number")->fetch_all(MYSQLI_ASSOC);

echo $result[0]['value'];


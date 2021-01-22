<?php


$host = 'localhost'; 
$database = 'contest'; 
$user = 'root';
$password = ''; 

$db = new mysqli($host, $user, $password, $database);


function sumNumbers(int $n){
    $n = str_split($n);
    $summ = 0;
    for ($i=0; $i<count($n); $i++) {
        $summ += $n[$i];
    }
    return $summ;
}


function init(){

    global $db;

    $table = 'us3258';

    if ($db->connect_error) {
     die("Connection Error: " . $db->connect_error);
    }


    if (!$db->query("SELECT * FROM $table")){
        $query = "CREATE TABLE $table (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            value INT UNSIGNED)";
   
        $db->query($query);


        
        $insertID = "INSERT INTO $table (id, value) VALUES ";
        $idToInsert = [];
        $valuestToInsert = [];
       
    
        for($i = 1; $i <= 1000000; $i++){
            if(empty($idToInsert)){
                $idToInsert[] = "(1, 7)";
                $valuestToInsert[] = 7;
           }else{
                $last = end($valuestToInsert);
                $last  = (int) $last;
                $number = pow(sumNumbers($last), 2) + 1;
                $valuestToInsert[] = $number;
                $idToInsert[] = "($i, $number)";
           }
        }
    
        $query = $insertID . implode(",", $idToInsert);
        $db->query($query);

      }
}

init();


$db->close();

?>
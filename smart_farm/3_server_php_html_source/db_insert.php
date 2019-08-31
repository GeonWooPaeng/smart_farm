<?php
$servername = "localhost";
$username = "nicecut79";
$password = "Nice2300";
$dbname = "nicecut79";


$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
}
//http://emotionreport.co.kr/db_insert.php

$sql = "INSERT INTO smart_farm(temperature,humidity,light,soil) VALUES ('34','23','80','27')";

if ($conn->query($sql) === TRUE){
    echo "NEW record Suceessfully";
}else{
    echo "Error" .$sql. "<br/>" . $conn->error;
}

$conn->close();

?>
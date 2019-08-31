

<?php

header('Content-Type: application/json; charset=utf8');

$servername = "localhost";
$username = "admin";
$password = "1234";
$dbname = "smart_farm";



$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
}

//http://emotionreport.co.kr/smart_farm.php

/* select part */
// table 값 변경 
$sql_select = "SELECT id,temperature,humidity,light,soil,date FROM smart_farm ORDER BY id DESC LIMIT 30";
$result =  $conn->query($sql_select);
$sensor_array = array(array('SENSOR','humidity','temperature','light','soil_humi'));



if ($result->num_rows > 0){

    while ($row = $result->fetch_assoc()){

        // echo "id" .$row["id"]."----> ";
        // echo "Temprature" .$row["temperature"]." - ";
        // echo "light:".$row["light"]." - ";
        // echo "water_humi:".$row["whumi"]." - ";
        // echo  "humi:". $row["humi"]."<----- ";
        // echo "date" .$row["date"]."<br/>";

        array_push($sensor_array, array(
            $row["date"],(int)$row["humidity"],(int)$row["temperature"],(int)$row["light"],(int)$row["soil"]));

    } //close row


    echo json_encode($sensor_array);

    if(isset($_POST['get_chart'])) {
        exit;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
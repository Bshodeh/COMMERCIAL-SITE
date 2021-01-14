<?php

include_once '../models/car.php';
include_once '../dataBaseConn/connection.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new Database();
    $conn = $db->connect();
    $car = new Car($conn);

    $result = $car->getAllColors();
    $colors = array();
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data = array('color' => $row['color']);
            array_push($colors, $data);
        }
      
        print_r(json_encode($colors));
    } else {
        print_r(json_encode(array('data' => 'NO Data')));
    }
}

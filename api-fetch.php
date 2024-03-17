<?php
require "./config/config.php";
// Set headers to indicate JSON content type
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

// reading data from request
$data = json_decode(file_get_contents('php://input'), true);


$sql = "SELECT * FROM office";
$result = mysqli_query($conn, $sql) or die('sql query failed');

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Construct the response array
    $response = array(
        "success" => true,
        "data" => $data,
        'output' => $output
    );

    // Encode the response array to JSON format
    $json_response = json_encode($response);

    // Output the JSON response
    echo $json_response;
}else{

}
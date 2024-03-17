<?php
require "./config/config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

$data = json_decode(file_get_contents('php://input'), true);

$Name = $data['Name'] ?? '';
$emai = $data['email'] ?? '';

if (!empty($Name) && !empty($email)) {
    $sql = "INSERT INTO office (Name, email) VALUES ('{$Name}', '{$email}')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo json_encode(array('success' => true, 'message' => 'Note inserted successfully'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to insert note'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Title and description are required'));
}
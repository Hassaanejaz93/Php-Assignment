<?php
require "./config/config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

$data = json_decode(file_get_contents('php://input'), true);

$Name = $data['Name'] ?? '';
$email = $data['email'] ?? '';
$message = $data['message'] ?? '';

// if empty, return
if (!empty($email) && !empty($message)) {

    $sql = "UPDATE office SET email = '{$email}', message = '{$message}' WHERE Name = '{$Name}'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(array('success' => true, 'message' => 'office updated successfully'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to update office'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Title and description are required'));
}
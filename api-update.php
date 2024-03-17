<?php
require "./config/config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'] ?? '';
$title = $data['title'] ?? '';
$description = $data['description'] ?? '';

// if empty, return
if (!empty($title) && !empty($description)) {

    $sql = "UPDATE notes SET title = '{$title}', description = '{$description}' WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(array('success' => true, 'message' => 'Note updated successfully'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to update note'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Title and description are required'));
}
<?php

require('../app/database/connection.php');

// Receive application ID and new status from the client
$data = json_decode(file_get_contents('php://input'), true);
$applicationId = $data['app_id']; // Assuming client sends the application ID
$newStatus = $data['status']; // Assuming client sends the new status

// Update the status of the application in the database
$query = "UPDATE applications SET status = '$newStatus' WHERE app_id = $applicationId";
$result = mysqli_query($conn, $query);

// Check if the update was successful
if ($result) {
    // Return success response
    echo json_encode(array('message' => 'Status updated successfully'));
} else {
    // Return error response
    echo json_encode(array('message' => 'Failed to update status'));
}
?>

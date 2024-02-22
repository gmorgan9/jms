<?php

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);
$idno  = rand(1000000, 9999999);

$setZero = 0;





if(isset($data)) {
    $query1 = "SELECT app_id FROM applications WHERE company = '" . $data['phrase'] . "'";
    $app_id = mysqli_query($conn, $query1);

$query = "INSERT INTO email_application (idno, app_id, subject, sender, status) VALUES ('$idno','$app_id', '".$data['subject']."', '".$data['sender']."', 'Unread')";
$result = mysqli_query($conn, $query);
}
// END JSON entry from PS Script


?>
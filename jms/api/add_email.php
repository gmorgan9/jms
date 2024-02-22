<?php

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);
$idno  = rand(1000000, 9999999);

$setZero = 0;


$query1 = "SELECT app_id FROM applications WHERE company = '" . $data['phrase'] . "'";
$app_id = mysqli_query($conn, $query1);


if(isset($data)) {
$query = "INSERT INTO email_application (idno, app_id, subject,from, link, status) VALUES ('$idno','$app_id', '".$data['Subject']."', '".$data['Sender']."', 'Unread')";
$result = mysqli_query($conn, $query);
}
// END JSON entry from PS Script


?>
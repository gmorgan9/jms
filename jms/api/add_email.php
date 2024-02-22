<?php

require('../app/database/connection.php');

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data)) {
    foreach ($data as $item) {
        $phrase = mysqli_real_escape_string($conn, $item['phrase']);
        $subject = mysqli_real_escape_string($conn, $item['subject']);
        $sender = mysqli_real_escape_string($conn, $item['sender']);
        $link = mysqli_real_escape_string($conn, $item['link']);

        $query1 = "SELECT app_id FROM applications WHERE company = '$phrase'";
        $result1 = mysqli_query($conn, $query1);

        if ($result1) {
            $app_id = null;
            if (mysqli_num_rows($result1) > 0) {
                $row = mysqli_fetch_assoc($result1);
                $app_id = $row['app_id'];
            }

            $idno = rand(100000, 999999); // Generate unique ID

            $query2 = "INSERT INTO email_application (idno, app_id, subject, sender) VALUES ('$idno', NULLIF('$app_id',''), NULLIF('$subject',''), NULLIF('$sender',''))";
            $result2 = mysqli_query($conn, $query2);
// , NULLIF('$link','')
            if ($result2) {
                echo "Data inserted successfully.";
            } else {
                echo "Error inserting data.";
            }
        } else {
            echo "Error retrieving app_id.";
        }
    }
}

?>

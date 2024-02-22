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

            // Check if data already exists
            $query_check = "SELECT idno FROM email_application WHERE link = '$link' LIMIT 1";
            $result_check = mysqli_query($conn, $query_check);
            if (!$result_check) {
                // Error occurred while checking for existing data
                echo "Error: " . mysqli_error($conn);
                continue; // Move to next iteration of foreach loop
            }

            if (mysqli_num_rows($result_check) == 0) {
                $query2 = "INSERT INTO email_application (idno, app_id, subject, sender, link) VALUES ('$idno', NULLIF('$app_id',''), '$subject', '$sender', '$link')";
                $result2 = mysqli_query($conn, $query2);

                if ($result2) {
                    echo "Data inserted successfully.";
                } else {
                    echo "Error inserting data.";
                }
            } else {
                echo "Data already exists.";
            }
        } else {
            echo "Error retrieving app_id.";
        }
    }
}



?>
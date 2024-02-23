<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);

var_dump($data); // Debugging statement to inspect JSON data

if(!empty($data)) {
    foreach ($data as $entry) {
        if(isset($entry['companyName'], $entry['link'], $entry['subject'], $entry['sender']) &&
            !empty($entry['companyName']) && !empty($entry['link']) && 
            !empty($entry['subject']) && !empty($entry['sender'])) {
            
            echo "All required fields are present and not empty for entry:" . PHP_EOL;
            var_dump($entry);

            $companyName = mysqli_real_escape_string($conn, $entry['companyName']);
            $link = mysqli_real_escape_string($conn, $entry['link']);
            $subject = mysqli_real_escape_string($conn, $entry['subject']);
            $sender = mysqli_real_escape_string($conn, $entry['sender']);

            // Retrieve app_id from applications table
            $query1 = "SELECT app_id FROM applications WHERE company = '$companyName'";
            $result1 = mysqli_query($conn, $query1);

            if ($result1) {
                if (mysqli_num_rows($result1) > 0) {
                    // Fetch the app_id from the result set
                    $row = mysqli_fetch_assoc($result1);
                    $app_id = $row['app_id'];
                } else {
                    // No matching company, set app_id to null
                    $app_id = null;
                }

                // Generate idno
                $idno = rand(1000000, 9999999);

                // Check if the link already exists
                $query_check = "SELECT idno FROM email_application WHERE link = '$link' LIMIT 1";
                $result_check = mysqli_query($conn, $query_check);

                if (mysqli_num_rows($result_check) == 0) {
                    // Insert data into email_application table
                    $query2 = "INSERT INTO email_application (idno, app_id, subject, sender, link) VALUES ('$idno', NULLIF('$app_id',''), '$subject', '$sender', '$link')";
                    $result2 = mysqli_query($conn, $query2);

                    if ($result2) {
                        // Insertion successful
                        echo "Data inserted successfully for $companyName.";
                    } else {
                        // Error inserting data
                        echo "Error inserting data for $companyName: " . mysqli_error($conn);
                    }
                } else {
                    echo "Link already exists for $companyName.";
                }
            } else {
                // Error retrieving app_id
                echo "Error retrieving app_id for $companyName: " . mysqli_error($conn);
            }
        } else {
            echo "Missing required data for one or more entries.";
            var_dump($entry);
        }
    }
} else {
    echo "No data received.";
}

// END JSON entry from PS Script
?>

<?php

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);

$setZero = 0;

if(isset($data)) {
    // Retrieve app_id from applications table
    $query1 = "SELECT app_id FROM applications WHERE company = '" . mysqli_real_escape_string($conn, $data['phrase']) . "'";
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
        
        $query_check = "SELECT idno FROM email_application WHERE link = '$link' LIMIT 1";
            $result_check = mysqli_query($conn, $query_check);
            if (mysqli_num_rows($result_check) == 0) {
        // Insert data into email_application table
        $query2 = "INSERT INTO email_application (idno, app_id, subject, sender, link) VALUES ('$idno', NULLIF('$job_title',''), '" . mysqli_real_escape_string($conn, $data['subject']) . "', '" . mysqli_real_escape_string($conn, $data['sender']) . "', '" . mysqli_real_escape_string($conn, $data['link']) . "')";
        $result2 = mysqli_query($conn, $query2);
        
        if ($result2) {
            // Insertion successful
            echo "Data inserted successfully.";
        } else {
            // Error inserting data
            echo "Error inserting data: " . mysqli_error($conn);
        }
    } else {
        // Error retrieving app_id
        echo "Error retrieving app_id: " . mysqli_error($conn);
    }
}
}

// END JSON entry from PS Script

?>

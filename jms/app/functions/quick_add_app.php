<?php

// ADD QUICK JOB
if(isset($_POST['add-quick'])){
    $idno  = rand(1000000, 9999999);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $app_link = mysqli_real_escape_string($conn, $_POST['app_link']);
    $job_type = mysqli_real_escape_string($conn, $_POST['job_type']);
    $watchlist = isset($_POST['watchlist']) ? 1 : 0;
    $interview_set = isset($_POST['interview_set']) ? 1 : 0;

    $select = " SELECT * FROM applications WHERE idno = '$idno' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
    $error[] = 'Application already exist!';
    }else{
    $insert = "INSERT INTO applications (idno, job_title, company, location, app_link, job_type, watchlist,interview_set, status) VALUES('$idno', NULLIF('$job_title',''), NULLIF('$company',''), NULLIF('$location',''), NULLIF('$app_link',''), NULLIF('$job_type',''), '$watchlist', '$interview_set', 'Applied')";
    mysqli_query($conn, $insert);
    }
}
// END ADD QUICK JOB

?>
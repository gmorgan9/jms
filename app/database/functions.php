<?php

session_start();
require('connection.php');

function isLoggedIn()
{
	if (isset($_SESSION['fname'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	header("location: login.php");
}

// ADD JOB
if(isset($_POST['add-quick-job-app'])){
    $idno  = rand(1000000, 9999999);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $app_link = mysqli_real_escape_string($conn, $_POST['app_link']);
    $watchlist = isset($_POST['watchlist']) ? 1 : 0;

    $select = " SELECT * FROM applications WHERE idno = '$idno' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
      $error[] = 'Application already exist!';
    }else{
      $insert = "INSERT INTO applications (idno, job_title, company, location, app_link, watchlist) VALUES('$idno', '$job_title', '$company', '$location', '$app_link', '$watchlist')";
      mysqli_query($conn, $insert);
      header('location: /');
    }
};
// END ADD JOB


// ADD JOB
if (isset($_POST['add-full'])) {
    $idno = rand(1000000, 9999999);
    $job_title = empty($_POST['job_title']) ? NULL : mysqli_real_escape_string($conn, $_POST['job_title']);
    $company = empty($_POST['company']) ? NULL : mysqli_real_escape_string($conn, $_POST['company']);
    $location = empty($_POST['location']) ? NULL : mysqli_real_escape_string($conn, $_POST['location']);
    $job_desc = empty($_POST['job_desc']) ? NULL : mysqli_real_escape_string($conn, $_POST['job_desc']);
    $pay = empty($_POST['pay']) ? NULL : mysqli_real_escape_string($conn, $_POST['pay']);
    $bonus_pay = empty($_POST['bonus_pay']) ? NULL : mysqli_real_escape_string($conn, $_POST['bonus_pay']);
    $status = empty($_POST['status']) ? NULL : mysqli_real_escape_string($conn, $_POST['status']);
    $watchlist = isset($_POST['watchlist']) ? 1 : 0;
    $app_link = empty($_POST['app_link']) ? NULL : mysqli_real_escape_string($conn, $_POST['app_link']);
    $job_type = empty($_POST['job_type']) ? NULL : mysqli_real_escape_string($conn, $_POST['job_type']);
    $contact_name = empty($_POST['contact_name']) ? NULL : mysqli_real_escape_string($conn, $_POST['contact_name']);
    $contact_email = empty($_POST['contact_email']) ? NULL : mysqli_real_escape_string($conn, $_POST['contact_email']);
    $contact_phone = empty($_POST['contact_phone']) ? NULL : mysqli_real_escape_string($conn, $_POST['contact_phone']);
    $interview_set = isset($_POST['interview_set']) ? 1 : 0;
    $start_date = empty($_POST['start_date']) ? NULL : mysqli_real_escape_string($conn, $_POST['start_date']);
    $resume_used = empty($_POST['resume_used']) ? NULL : mysqli_real_escape_string($conn, $_POST['resume_used']);
    $notes = empty($_POST['notes']) ? NULL : mysqli_real_escape_string($conn, $_POST['notes']);

    $select1 = "SELECT * FROM applications WHERE idno = '$idno'";
    $result1 = mysqli_query($conn, $select1);

    if (mysqli_num_rows($result1) > 0) {
        $error[] = 'Application already exists!';
    } else {
        $insert1 = "INSERT INTO applications (idno, job_title, company, location, job_desc, pay, bonus_pay, status, watchlist, app_link, job_type, contact_name, contact_email, contact_phone, interview_set, start_date, resume_used, notes) 
        VALUES ('$idno','$job_title','$company','$location','$job_desc','$pay','$bonus_pay','$status','$watchlist','$app_link','$job_type','$contact_name','$contact_email','$contact_phone','$interview_set','$start_date','$resume_used','$notes')";
        mysqli_query($conn, $insert1);
        header('location: /');
    }
}
// END ADD JOB
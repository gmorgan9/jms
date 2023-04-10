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
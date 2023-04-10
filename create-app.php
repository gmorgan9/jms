<?php

require_once "app/database/connection.php";
require_once "app/database/functions.php";
require_once "path.php";
session_start();

if (!isLoggedIN()) {
	header('location: login.php');
}


// ADD JOB
if(isset($_POST['add-full'])){
    $idno  = rand(1000000, 9999999);
    $job_title = isset($_POST['job_title']) ? mysqli_real_escape_string($conn, $_POST['job_title']) : "NULL";
    $company = isset($_POST['company']) ? mysqli_real_escape_string($conn, $_POST['company']) : "NULL";
    $location = isset($_POST['location']) ? mysqli_real_escape_string($conn, $_POST['location']) : "NULL";
    $job_desc = isset($_POST['job_desc']) ? mysqli_real_escape_string($conn, $_POST['job_desc']) : "NULL";
	$pay = isset($_POST['pay']) ? mysqli_real_escape_string($conn, $_POST['pay']) : "NULL";
    $bonus_pay = isset($_POST['bonus_pay']) ? mysqli_real_escape_string($conn, $_POST['bonus_pay']) : "NULL";
    $status = isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : "NULL";
    $watchlist = isset($_POST['watchlist']) ? 1 : 0;
	$app_link = isset($_POST['app_link']) ? mysqli_real_escape_string($conn, $_POST['app_link']) : "NULL";
	$job_type = isset($_POST['job_type']) ? mysqli_real_escape_string($conn, $_POST['job_type']) : "NULL";
	$contact_name = isset($_POST['contact_name']) ? mysqli_real_escape_string($conn, $_POST['contact_name']) : "NULL";
	$contact_email = isset($_POST['contact_email']) ? mysqli_real_escape_string($conn, $_POST['contact_email']) : "NULL";
	$contact_phone = isset($_POST['contact_phone']) ? mysqli_real_escape_string($conn, $_POST['contact_phone']) : "NULL";
	$interview_set = isset($_POST['interview_set']) ? 1 : 0;
	$start_date = isset($_POST['start_date']) ? mysqli_real_escape_string($conn, $_POST['start_date']) : "NULL";
	$resume_used = isset($_POST['resume_used']) ? mysqli_real_escape_string($conn, $_POST['resume_used']) : "NULL";
	$notes = isset($_POST['notes']) ? mysqli_real_escape_string($conn, $_POST['notes']) : "NULL";

    $select1 = " SELECT * FROM applications WHERE idno = '$idno' ";
    $result1 = mysqli_query($conn, $select1);

    if(mysqli_num_rows($result1) > 0){
      $error[] = 'Application already exist!';
    }else{
	  $insert1 = "INSERT INTO applications (idno, job_title, company, location, job_desc, pay, bonus_pay, status, watchlist, app_link, job_type, contact_name, contact_email, contact_phone, interview_set, start_date, resume_used, notes) VALUES ('$idno','$job_title','$company','$location','$job_desc','$pay','$bonus_pay','$status','$watchlist','$app_link','$job_type','$contact_name','$contact_email','$contact_phone','$interview_set','$start_date','$resume_used','$notes')";
      mysqli_query($conn, $insert1);
      header('location: /');
    }
};
// END ADD JOB





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css?v=1.75">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>

    <style>
        
    </style>
    
</head>
<body>

<div class="header">
        <h3 class="logo ms-3 me-3 pt-1">
            Job Management System
            <a class="float-end" href="index.php?logout='1'"><button style="cursor:pointer;" class="btn btn-link text-white"><i class="bi bi-box-arrow-left fs-5"></i></button></a>
        </h3>
    </div>
<br>
<div class="record_incident float-end me-5">
    <a href="/"><button class="btn btn-secondary rec">Home</button></a>
</div>







 <!-- main-container -->
 <div class="container-fluid main" style="background-color: rgb(240, 240, 240); max-width: 80%; border-radius: 15px;">

<br><br>

<form action="" method="POST">
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title">
            </div>
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
            <div class="form-group">
                <label for="app_link">Application Link:</label>
                <input type="text" class="form-control" id="app_link" name="app_link">
            </div>
            <br>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1">
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                </div>
            </div>
            <button type="submit" name="add-full" class="btn btn-primary">Submit</button>
        </form>

 

    <!-- <form method="POST" action="">

        <div class="row mb-3">
            <div class="col">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="col">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="job_desc">Job Description</label>
                <textarea class="form-control" name="job_desc" rows="5"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="pay" class="form-label">Pay</label>
                <input type="text" class="form-control" id="pay" name="pay">
            </div>
            <div class="col">
                <label for="bonus_pay" class="form-label">Bonus Pay  <span class="text-muted" style="font-size: 10px;">Optional</span></label>
                <input type="text" class="form-control" id="bonus_pay" name="bonus_pay">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="applied">Applied</option>
                    <option value="interviewed">Interviewed</option>
                    <option value="offered">Offered</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label" for="job_type">Job Type</label>
                <select class="form-control" name="job_type">
                    <option value="applied">Applied</option>
                    <option value="interviewed">Interviewed</option>
                    <option value="offered">Offered</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="app_link" class="form-label">Application Link</label>
                <input type="text" class="form-control" id="app_link" name="app_link">
            </div>
        </div>

        <hr>

        <div class="row mb-3">
            <div class="col">
                <label for="contact_name" class="form-label">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name">
            </div>
            <div class="col">
                <label for="contact_phone" class="form-label">Contact Phone</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="text" class="form-control" id="contact_email" name="contact_email">
            </div>
        </div>

        <hr>

        <div class="row mb-3">
            <div class="col">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="col">
                <label for="resume_used" class="form-label">Resume Used</label>
                <input type="text" class="form-control" id="resume_used" name="resume_used">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-control" name="notes" rows="5"></textarea>
            </div>
        </div>

        <div class="row mb-3 ps-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1">
                <label class="form-check-label" for="watchlist">Add to Watchlist</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="1">
                <label class="form-check-label" for="interview_set">Interview Set</label>
            </div>
        </div>


    
        <button type="submit" name="add-full-job-app" class="btn btn-primary">Submit</button>
        <div class="pb-4"></div>
    </form> -->



</div>
<!-- END main-container -->

<br><br><br>








</body>
</html>
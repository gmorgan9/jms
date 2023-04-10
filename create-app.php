<?php

require_once "app/database/connection.php";
require_once "app/database/functions.php";
require_once "path.php";
session_start();

if (!isLoggedIN()) {
	header('location: login.php');
}
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
    
        <!-- <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="job_desc">Job Description</label>
                <textarea class="form-control" name="job_desc" rows="5"></textarea>
            </div>
        </div> -->

        <!-- <div class="row mb-3">
            <div class="col">
                <label for="pay" class="form-label">Pay</label>
                <input type="text" class="form-control" id="pay" name="pay">
            </div>
            <div class="col">
                <label for="bonus_pay" class="form-label">Bonus Pay  <span class="text-muted" style="font-size: 10px;">Optional</span></label>
                <input type="text" class="form-control" id="bonus_pay" name="bonus_pay">
            </div>
        </div> -->

        <!-- <div class="row mb-3">
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
        </div> -->

        <div class="row mb-3">
            <div class="col">
                <label for="app_link" class="form-label">Application Link</label>
                <input type="text" class="form-control" id="app_link" name="app_link">
            </div>
        </div>

        <!-- <hr> -->

        <!-- <div class="row mb-3">
            <div class="col">
                <label for="contact_name" class="form-label">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name">
            </div>
            <div class="col">
                <label for="contact_phone" class="form-label">Contact Phone</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone">
            </div>
        </div> -->

        <div class="row mb-3">
            <!-- <div class="col">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="text" class="form-control" id="contact_email" name="contact_email">
            </div> -->
        </div>

        <!-- <hr> -->

        <div class="row mb-3">
            <!-- <div class="col">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div> -->
            <!-- <div class="col">
                <label for="resume_used" class="form-label">Resume Used</label>
                <input type="text" class="form-control" id="resume_used" name="resume_used">
            </div> -->
        </div>

        <!-- <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-control" name="notes" rows="5"></textarea>
            </div>
        </div> -->

        <!-- <div class="row mb-3 ps-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1">
                <label class="form-check-label" for="watchlist">Add to Watchlist</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="1">
                <label class="form-check-label" for="interview_set">Interview Set</label>
            </div>
        </div> -->


    
        <button type="submit" name="add-full-job-app" class="btn btn-primary">Submit</button>
        <div class="pb-4"></div>
        </form>



</div>
<!-- END main-container -->

<br><br><br>








</body>
</html>
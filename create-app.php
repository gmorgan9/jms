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
            <div class="form-group">
                <label for="pay">pay</label>
                <input type="text" class="form-control" id="pay" name="pay">
            </div>
            <br>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1">
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="1">
                    <label class="form-check-label" for="interview_set">interview_set</label>
                </div>
            </div>
            
            <button type="submit" name="add-quick-job-app" class="btn btn-primary">Submit</button>
        </form>



</div>
<!-- END main-container -->

<br><br><br>








</body>
</html>
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
 <div class="container-fluid main">



 <form method="POST" action="process_form.php">

    <div class="row mb-3">
      <label for="job_title" class="col-sm-2 col-form-label">Job Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="job_title" name="job_title">
      </div>
    </div>

    <div class="row mb-3">
      <label for="company" class="col-sm-2 col-form-label">Company</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="company" name="company">
      </div>
    </div>




    <label for="job_title">Job Title:</label>
    <input type="text" name="job_title" required><br><br>
    
    <label for="company">Company:</label>
    <input type="text" name="company" required><br><br>
    
    <label for="location">Location:</label>
    <input type="text" name="location" required><br><br>
    
    <label for="job_desc">Job Description:</label>
    <textarea name="job_desc" rows="5"></textarea><br><br>
    
    <label for="pay">Pay:</label>
    <input type="text" name="pay"><br><br>
    
    <label for="bonus_pay">Bonus Pay:</label>
    <input type="text" name="bonus_pay"><br><br>
    
    <label for="status">Status:</label>
    <select name="status">
        <option value="applied">Applied</option>
        <option value="interviewed">Interviewed</option>
        <option value="offered">Offered</option>
        <option value="rejected">Rejected</option>
    </select><br><br>
    
    <label for="watchlist">Add to Watchlist:</label>
    <input type="checkbox" name="watchlist" value="1"><br><br>
    
    <label for="app_link">Application Link:</label>
    <input type="text" name="app_link"><br><br>
    
    <label for="job_type">Job Type:</label>
    <input type="text" name="job_type"><br><br>
    
    <label for="contact_name">Contact Name:</label>
    <input type="text" name="contact_name"><br><br>
    
    <label for="contact_email">Contact Email:</label>
    <input type="email" name="contact_email"><br><br>
    
    <label for="contact_phone">Contact Phone:</label>
    <input type="text" name="contact_phone"><br><br>
    
    <label for="interview_set">Interview Scheduled:</label>
    <input type="checkbox" name="interview_set" value="1"><br><br>
    
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date"><br><br>
    
    <label for="resume_used">Resume Used:</label>
    <input type="text" name="resume_used"><br><br>
    
    <label for="notes">Notes:</label>
    <textarea name="notes" rows="5"></textarea><br><br>
    
    <input type="submit" value="Submit">
</form>




</div>
<!-- END main-container -->








</body>
</html>
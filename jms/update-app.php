<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "path.php";
session_start();

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

// if (!isLoggedIN()) {
// 	header('location: login.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css?v=1.77">
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
            <a class="text-decoration-none text-white" href="/">Job Management System</a>
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

    <?php
            $id = $_GET['updateid'];
            $sql = "SELECT * FROM applications WHERE appid=$id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                $num_rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $appid          = $row['appid'];
                    $job_title      = $row['job_title'];
                    $comapny        = $row['company'];
                    $location       = $row['location'];
                    $job_desc       = $row['job_desc'];
                    $pay            = $row['pay'];
                    $bonus_pay      = $row['bonus_pay'];
                    $status         = $row['status'];
                    $job_type       = $row['job_type'];
                    $app_link       = $row['app_link'];
                    $contact_name   = $row['contact_name'];
                    $contact_phone  = $row['contact_phone'];
                    $contact_email  = $row['contact_email'];
                    $start_date     = $row['start_date'];
                    $resume_used    = $row['resume_used'];
                    $notes          = $row['notes'];
                    $watchlist      = $row['watchlist'];
                    $interview_set  = $row['interview_set'];
    ?>








    <form method="POST" action="">

        <input type="hidden" class="form-control" id="appid" name="appid" value="<?php echo $appid; ?>">

        <div class="row mb-3">
            <div class="col">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $job_title; ?>">
            </div>
            <div class="col">
                <label for="app_link" class="form-label">Application Link</label>
                <input type="text" class="form-control" id="app_link" name="app_link" value="<?php echo $app_link; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="<?php echo $comapny; ?>">
            </div>
            <div class="col">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>">
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <label for="pay" class="form-label">Pay</label>
                <input type="text" class="form-control" id="pay" name="pay" value="<?php echo $pay; ?>">
            </div>
            <div class="col">
                <label for="bonus_pay" class="form-label">Bonus Pay  <span class="text-muted" style="font-size: 10px;">Optional</span></label>
                <input type="text" class="form-control" id="bonus_pay" name="bonus_pay" value="<?php echo $bonus_pay; ?>">
            </div>
            <div class="col">
                <label class="form-label" for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                    <option value="Applied">Applied</option>
                    <option value="Interviewed">Interviewed</option>
                    <option value="Offered">Offered</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label" for="job_type">Job Type</label>
                <select class="form-control" name="job_type">
                    <option value="<?php echo $job_type; ?>"><?php echo $job_type; ?></option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contract">Contract</option>
                    <option value="Internship">Internship</option>
                    <option value="Temporary">Temporary</option>
                </select>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-control" name="notes" rows="5"><?php echo $notes; ?></textarea>
            </div>
        </div>

        <div class="row mb-3 ps-3">
            <div class="form-check">
                <?php if($watchlist == 1) { ?>
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1" checked>
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                <?php } else { ?>
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="0">
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                <?php } ?>

            </div>
            <div class="form-check">
                <?php if($interview_set == 1) { ?>
                    <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="1" checked>
                    <label class="form-check-label" for="interview_set">Interview Set</label>
                <?php } else { ?>
                    <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="0">
                    <label class="form-check-label" for="interview_set">Interview Set</label>
                <?php } ?>
            </div>
        </div>


    
        <button type="submit" name="update-full" class="btn btn-primary">Submit</button>
        <div class="pb-4"></div>
    </form>

    <?php

                
            }
        }

    ?>



</div>
<!-- END main-container -->

<br><br><br>








</body>
</html>
<?php

require_once "app/database/connection.php";
require_once "app/database/functions.php";
require_once "path.php";
session_start();

if (!isLoggedIN()) {
	header('location: login.php');
}
// if (isset($_GET['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['user']);
// 	header("location: login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css?v=1.63">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>
    
</head>
<body>

<div class="header">
        <h3 class="logo ms-3 me-3">
            Job Management System
            <a class="float-end" href="index.php?logout='1'"><button style="cursor:pointer;" class="btn btn-link text-black"><i class="bi bi-box-arrow-left fs-5"></i></button></a>
        </h3>
    </div>
<br>
<div class="record_incident float-end me-5">
    <a href="record-incident.php"><button class="btn btn-secondary rec">Record Job</button></a>
</div>

<?php  if (isset($_SESSION['fname'])) : ?>
    	<h1 style="margin-left: 150px;" class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
    <?php endif ?>
    <br>

    <div class="container">
    
    <div class="col d-flex justify-content-center">
<div class="row row_one">
<div class="card" style="width: 18rem;">
    <div class="card-body d-flex flex-column align-items-center">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-envelope-open fa-8x"></i> <br>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/open-incidents.php" class="btn stretched-link">Open Incidents</a>
            </div>
        </div>
    </div>
</div>
<div class="card" style="width: 18rem;">
    <div class="card-body d-flex flex-column align-items-center">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-envelope-circle-check fa-8x"></i> <br>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/closed-incidents.php" class="btn stretched-link">Closed Incidents</a>
            </div>
        </div>
    </div>
</div>
<div class="card" style="width: 18rem;">
    <div class="card-body d-flex flex-column align-items-center">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-envelopes-bulk fa-8x"></i> <br>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/all-incidents.php" class="btn stretched-link">All Incidents</a>
            </div>
        </div>
    </div>
</div>
  </div>
  </div>
  <br>
<!-- Row 2 -->
<div class="col d-flex justify-content-center">
<div class="row">
<div class="card" style="width: 18rem;">
    <div class="card-body d-flex flex-column align-items-center">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-file-invoice fa-8x"></i> <br>
            </div>
            <div class="d-flex justify-content-center">
                <a href="priority-report.php" class="btn stretched-link" style="width: 200px;">Incident Priority Report</a>
            </div>
        </div>
    </div>
</div>
<div class="card" style="width: 18rem;">
    <div class="card-body d-flex flex-column align-items-center">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-file-lines fa-8x"></i> <br>
            </div>
            <div class="d-flex justify-content-center">
                <a href="other-reports.php" class="btn stretched-link">Other Reports</a>
            </div>
        </div>
    </div>
</div>
<div class="card" style="width: 18rem;">
    <div class="card-body d-flex flex-column align-items-center">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-note-sticky fa-8x"></i> <br>
            </div>
            <div class="d-flex justify-content-center">
                <a href="incident-notes.php" class="btn stretched-link">Incident Notes</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

        <!-- end container -->
    </div>

</body>
</html>
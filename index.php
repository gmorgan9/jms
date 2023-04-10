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
    <link rel="stylesheet" href="assets/css/main.css?v=1.72">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>

    <style>
        .bg-lightblue {
    background-color: lightblue;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
    </style>
    
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

<?php if (isset($_SESSION['fname'])) : ?>
    	<h1 style="margin-left: 150px;" class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
    <?php endif ?>
    <br>







 <!-- main-container -->
 <div class="container-fluid main">
    <div class="row">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Open</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 bg-lightblue">
                        <i class="bi bi-clipboard-check mt-5" style="font-size: 48px"></i>
                    </div>
                    <div class="col-8">
                        <div class="pt-3"></div>
                        <h5 class="card-text text-center">10</h5>
                        <p class="card-title text-center">Made Offer</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Declined</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </div>
</div>
<!-- END main-container -->








</body>
</html>
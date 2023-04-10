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
    <a href="record-incident.php"><button class="btn btn-secondary rec">Record Job</button></a>
</div>

<?php if (isset($_SESSION['fname'])) : ?>
    	<h1 style="margin-left: 150px;" class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
    <?php endif ?>
    <br>







 <!-- main-container -->
 <div class="container-fluid main">

    <!-- Top Row -->
        <div class="row d-flex justify-content-center">
        <!-- Open/Awaiting -->
            <div class="card" style="width: 18rem;">
                <div class="card-body p-0">
                    <div class="left float-start" style="background-color: lightgreen; height: 100%; width: 110px; margin-left: -12px;">
                        <i class="bi bi-clipboard d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
                    </div>

                    <div class="right float-end mt-2" style="margin-right: 30px !important;">
                        <div class="pt-3"></div>
                        <h5 class="card-text text-center">04</h5>
                        <p class="card-title text-center">Open/Awaiting</p>
                    </div>
                </div>
            </div>
        <!-- end Open/Awaiting -->

        <!-- Recieved Offer -->
            <div class="card" style="width: 18rem;">
                <div class="card-body p-0">
                    <div class="left float-start" style="background-color: lightblue; height: 100%; width: 110px; margin-left: -12px;">
                        <i class="bi bi-clipboard-check d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
                    </div>

                    <div class="right float-end mt-2" style="margin-right: 30px !important;">
                        <div class="pt-3"></div>
                        <h5 class="card-text text-center">10</h5>
                        <p class="card-title text-center">Recevied Offer</p>
                    </div>
                </div>
            </div>
        <!-- end Received Offer -->

        <!-- Declined -->
            <div class="card" style="width: 18rem;">
                <div class="card-body p-0">
                    <div class="left float-start" style="background-color: lightpink; height: 100%; width: 110px; margin-left: -12px;">
                        <i class="bi bi-clipboard-x d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
                    </div>

                    <div class="right float-end mt-2" style="margin-right: 40px !important;">
                        <div class="pt-3"></div>
                        <h5 class="card-text text-center">12</h5>
                        <p class="card-title text-center">Declined</p>
                    </div>
                </div>
            </div>
        <!-- end Declined -->

        <!-- Total -->
            <div class="card" style="width: 18rem;">
                <div class="card-body p-0">
                    <div class="left float-start" style="background-color: lightsalmon; height: 100%; width: 110px; margin-left: -12px;">
                        <i class="bi bi-clipboard-data d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
                    </div>

                    <div class="right float-end mt-2" style="margin-right: 18px !important;">
                        <div class="pt-3"></div>
                        <h5 class="card-text text-center">22</h5>
                        <p class="card-title text-center">Total Applications</p>
                    </div>
                </div>
            </div>
        <!-- end Total -->
        </div>
    <!-- end Top Row -->

    <br><br>

    <hr>

    <br><br>

    <!-- Bottom Row -->
        <div class="row d-flex justify-content-center">
            <!-- first table -->
                <div class="card p-0" style="width: 25rem;">
                    <div class="card-header">
                        <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">latest applications</span> 
                    </div>
                    <div class="card-body">
                        table 1
                    </div>
                </div>
            <!-- end first table -->

            <!-- second table -->
            <div class="card p-0" style="width: 25rem;">
                    <div class="card-header">
                        <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">watch list</span>
                    </div>
                    <div class="card-body">
                        table 2
                    </div>
                </div>
            <!-- end second table -->

            <!-- third table -->
            <div class="card p-0" style="width: 25rem;">
                    <div class="card-header">
                        <i class="bi bi-grid-3x3-gap-fill"></i>  
                    </div>
                    <div class="card-body">
                        table 3
                    </div>
                </div>
            <!-- end third table -->

        </div>
    <!-- end Bottom Row -->

</div>
<!-- END main-container -->








</body>
</html>
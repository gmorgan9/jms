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
    <link rel="stylesheet" href="assets/css/main.css?v=1.71">
    <link rel="stylesheet" href="assets/css/sidebar.css?v=1.66">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>
    
</head>
<body>

<div class="header">
        <h3 class="logo">
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
  <?php //include(ROOT_PATH . "/app/includes/header.php"); ?>
</div>

<div class="row">
  <div class="col" style="margin:0;padding:0;">
    <?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
  </div>
</div>

<div class="mt-5"></div>
<div class="row">
  <div class="col-2"></div>
  <div class="col-10" style="margin-left: -30px;">
    <div class="mt-5"></div>
    <h3 class="text-black">
      Dashboard
    </h3>
    <div class="mt-3"></div>


<div class="mb-5"></div>
</div>
<!-- END main-container -->








</body>
</html>
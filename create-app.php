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




 <div class="d-flex justify-content-center">
    <!-- form start -->
<form action="record-incident.php" class="reg-form" method="post">
<?php include('errors.php'); ?>
    <!-- <div class="form-header d-flex justify-content-center">
        <div class="bg-circle">
            <div class="sm-circle">
                <div class="d-flex justify-content-center">
                    <i class="user-header fa-solid fa-user fa-3x"></i>
                </div>
            </div>
        </div>
    </div> -->
<br>
<h2 class="text-center">Record Incident</h2>
<br>

    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
            <div class="input-group-prepend">
	            <span class="input-group-text"> <i class="bi bi-hash"></i> </span>
	        </div>
            <input name="inc_num" class="form-control" placeholder="Incident Number" type="text">
        </div>
    </div> 
    <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa-solid fa-arrow-up-wide-short"></i> </span>
		    </div>
            <input name="priority" class="form-control" placeholder="Priority" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa-solid fa-pen-to-square"></i> </span>
		    </div>
            <input name="description" class="form-control" placeholder="Description" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-users fa-xs"></i> </span>
		    </div>
            <input name="assign_group" class="form-control" placeholder="Assignment Group" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-book"></i> </span>
		    </div>
            <input name="kb_article" class="form-control" placeholder="KB Artcile" type="text">
        </div>
    </div> <!-- form-group// -->    
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-calendar-days"></i> </span>
		    </div>
            <input name="date" class="form-control" placeholder="Date" type="date">
        </div>
    </div> <!-- form-group// -->    
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
		    </div>
            <input name="time" class="form-control" placeholder="Time" type="time">
        </div>
    </div> <!-- form-group// -->   
    <div class="d-flex justify-content-center">                                
        <button id="button" type="submit" name="rec_inc" class="btn btn-primary text-center reg-log">Submit Incident</button>  
    </div>                                                               
</form>
</div>





</div>
<!-- END main-container -->








</body>
</html>
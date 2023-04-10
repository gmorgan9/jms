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
    <link rel="stylesheet" href="assets/css/main.css?v=1.4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>
    
</head>
<body>

    <div class="header">
        <div class="logo float-start ms-2 my-auto">
            <h2>JMS</h2>
        <!-- end logo -->
        </div>
        <div class="links float-end me-2 mt-2">
            <a href="" class="text-decoration-none text-black"><?php echo $_SESSION['fname']; ?></a>
        </div>


    <!-- end header -->
    </div>

    <div class="container">
    

        <!-- end container -->
    </div>



    Logged in

    <a href="index.php?logout='1'"><button style="cursor:pointer;color: #ff3860;border: 1px solid #ff3860;padding:2px;border-radius: 5px;">Logout</button></a>


</body>
</html>
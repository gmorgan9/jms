<?php

session_start();
require('connection.php');

// function isLoggedIn()
// {
// 	if ($_SESSION['loggedin'] == 1) {
// 		return true;
// 	}else{
// 		return false;
// 	}
// }

function checkLoginStatus() {
    // Start the session
    session_start();
  
    // Check if the user is logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      // User is logged in, show index page
      include("/");
    } else {
      // User is not logged in, show login page
      include("login.php");
    }
  }
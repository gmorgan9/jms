<?php

session_start();
require('connection.php');

function isLoggedIn()
{
	if (isset($_SESSION['fname'])) {
		return true;
	}else{
		return false;
	}
}

// LOGOUT
	if (isset($_GET['logout'])) {
		session_destroy();
		header("location: login.php");
	}
// END LOGOUT


// ADD QUICK JOB
	if(isset($_POST['add-quick'])){
		$idno  = rand(1000000, 9999999);
		$job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
		$company = mysqli_real_escape_string($conn, $_POST['company']);
		$location = mysqli_real_escape_string($conn, $_POST['location']);
		$app_link = mysqli_real_escape_string($conn, $_POST['app_link']);
		$job_type = mysqli_real_escape_string($conn, $_POST['job_type']);
		$watchlist = isset($_POST['watchlist']) ? 1 : 0;
		$interview_set = isset($_POST['interview_set']) ? 1 : 0;

		$select = " SELECT * FROM applications WHERE idno = '$idno' ";
		$result = mysqli_query($conn, $select);

		if(mysqli_num_rows($result) > 0){
		$error[] = 'Application already exist!';
		}else{
		$insert = "INSERT INTO applications (idno, job_title, company, location, app_link, job_type, watchlist,interview_set, status) VALUES('$idno', NULLIF('$job_title',''), NULLIF('$company',''), NULLIF('$location',''), NULLIF('$app_link',''), NULLIF('$job_type',''), '$watchlist', '$interview_set', 'Applied')";
		mysqli_query($conn, $insert);
		}
	}
// END ADD QUICK JOB


// ADD FULL APPLICATION
	if (isset($_POST['add-full'])) {
		$idno  = rand(1000000, 9999999);
		$watchlist = isset($_POST['watchlist']) ? 1 : 0;
		$interview_set = isset($_POST['interview_set']) ? 1 : 0;
		if(isset($_POST['job_title'])) { $job_title = mysqli_real_escape_string($conn, $_POST['job_title']); } else { $job_title = ""; }
		if(isset($_POST['company'])) { $company = mysqli_real_escape_string($conn, $_POST['company']); } else { $company = ""; }
		if(isset($_POST['location'])) { $location = mysqli_real_escape_string($conn, $_POST['location']); } else { $location = ""; }
		// if(isset($_POST['job_desc'])) { $job_desc = mysqli_real_escape_string($conn, $_POST['job_desc']); } else { $job_desc = ""; }
		if(isset($_POST['pay'])) { $pay = mysqli_real_escape_string($conn, $_POST['pay']); } else { $pay = ""; }
		if(isset($_POST['bonus_pay'])) { $bonus_pay = mysqli_real_escape_string($conn, $_POST['bonus_pay']); } else { $bonus_pay = ""; }
		if(isset($_POST['status'])) { $status = mysqli_real_escape_string($conn, $_POST['status']); } else { $status = ""; }
		if(isset($_POST['app_link'])) { $app_link = mysqli_real_escape_string($conn, $_POST['app_link']); } else { $app_link = ""; }
		if(isset($_POST['job_type'])) { $job_type = mysqli_real_escape_string($conn, $_POST['job_type']); } else { $job_type = ""; }
		// if(isset($_POST['contact_name'])) { $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']); } else { $contact_name = ""; }
		// if(isset($_POST['contact_email'])) { $contact_email = mysqli_real_escape_string($conn, $_POST['contact_email']); } else { $contact_email = ""; }
		// if(isset($_POST['contact_phone'])) { $contact_phone = mysqli_real_escape_string($conn, $_POST['contact_phone']); } else { $contact_phone = ""; }
		// if(isset($_POST['start_date'])) { $start_date = mysqli_real_escape_string($conn, $_POST['start_date']); } else { $start_date = ""; }
		// if(isset($_POST['resume_used'])) { $resume_used = mysqli_real_escape_string($conn, $_POST['resume_used']); } else { $resume_used = ""; }
		if(isset($_POST['notes'])) { $notes = mysqli_real_escape_string($conn, $_POST['notes']); } else { $notes = ""; }
		

		$select = "SELECT * FROM applications WHERE idno = '$idno'";
		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {
			$error[] = 'Application already exists!';
		} else {
			$insert = "INSERT INTO applications (idno, job_title, company, location, pay, bonus_pay, status, watchlist, app_link, job_type, interview_set, notes) 
			VALUES ('$idno',NULLIF('$job_title',''),NULLIF('$company',''),NULLIF('$location',''),NULLIF('$pay',''),NULLIF('$bonus_pay',''),NULLIF('$status',''),'$watchlist',NULLIF('$app_link',''),NULLIF('$job_type',''),'$interview_set',NULLIF('$notes',''))";
			mysqli_query($conn, $insert);
			header('location: /');
		}
	}
// END ADD FULL APPLICATION

// DELETE
	if(isset($_GET['appid'])) {
		$id = $_GET['appid'];

		$sql = "DELETE FROM applications WHERE appid=$id";
		$result = mysqli_query($conn, $sql);
	}
// END DELETE

// UPDATE FULL APPLICATION
	if (isset($_POST['update-full'])) {
		$id = $_POST['appid'];
		$watchlist = isset($_POST['watchlist']) ? 1 : 0;
		$interview_set = isset($_POST['interview_set']) ? 1 : 0;
		if(isset($_POST['job_title'])) { $job_title = mysqli_real_escape_string($conn, $_POST['job_title']); } else { $job_title = ""; }
		if(isset($_POST['company'])) { $company = mysqli_real_escape_string($conn, $_POST['company']); } else { $company = ""; }
		if(isset($_POST['location'])) { $location = mysqli_real_escape_string($conn, $_POST['location']); } else { $location = ""; }
		// if(isset($_POST['job_desc'])) { $job_desc = mysqli_real_escape_string($conn, $_POST['job_desc']); } else { $job_desc = ""; }
		if(isset($_POST['pay'])) { $pay = mysqli_real_escape_string($conn, $_POST['pay']); } else { $pay = ""; }
		if(isset($_POST['bonus_pay'])) { $bonus_pay = mysqli_real_escape_string($conn, $_POST['bonus_pay']); } else { $bonus_pay = ""; }
		if(isset($_POST['status'])) { $status = mysqli_real_escape_string($conn, $_POST['status']); } else { $status = ""; }
		if(isset($_POST['app_link'])) { $app_link = mysqli_real_escape_string($conn, $_POST['app_link']); } else { $app_link = ""; }
		if(isset($_POST['job_type'])) { $job_type = mysqli_real_escape_string($conn, $_POST['job_type']); } else { $job_type = ""; }
		// if(isset($_POST['contact_name'])) { $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']); } else { $contact_name = ""; }
		// if(isset($_POST['contact_email'])) { $contact_email = mysqli_real_escape_string($conn, $_POST['contact_email']); } else { $contact_email = ""; }
		// if(isset($_POST['contact_phone'])) { $contact_phone = mysqli_real_escape_string($conn, $_POST['contact_phone']); } else { $contact_phone = ""; }
		// if(isset($_POST['start_date'])) { $start_date = mysqli_real_escape_string($conn, $_POST['start_date']); } else { $start_date = ""; }
		// if(isset($_POST['resume_used'])) { $resume_used = mysqli_real_escape_string($conn, $_POST['resume_used']); } else { $resume_used = ""; }
		if(isset($_POST['notes'])) { $notes = mysqli_real_escape_string($conn, $_POST['notes']); } else { $notes = ""; }
		

		$select = "SELECT * FROM applications WHERE idno = '$idno'";
		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {
			$error[] = 'Application already exists!';
		} else {
			$update = "UPDATE applications SET job_title = NULLIF('$job_title',''), company = NULLIF('$company',''), location = NULLIF('$location',''), pay = NULLIF('$pay',''), bonus_pay = NULLIF('$bonus_pay',''), status = NULLIF('$status',''), watchlist = '$watchlist', app_link = NULLIF('$app_link',''), job_type = NULLIF('$job_type',''), interview_set = '$interview_set', notes = NULLIF('$notes','') WHERE appid = '$id';";
			mysqli_query($conn, $update);
			header('location: /');
		}
	}
// END UPDATE FULL APPLICATION


// JSON entry from PS Script
	$data = json_decode(file_get_contents('php://input'), true);

	$conn = mysqli_connect('localhost', 'dbuser', 'DBuser123!', 'jms');
	if (!$conn) {
		die('Connection failed: ' . mysqli_connect_error());
	}

	$query = "INSERT INTO applications (job_title) VALUES ('".$data['job_title']."')";
	$result = mysqli_query($conn, $query);
	if ($result) {
		echo "Data inserted successfully" + $data;
	} else {
		echo "Error inserting data: " . mysqli_error($conn);
	}
	mysqli_close($conn);
// END JSON entry from PS Script
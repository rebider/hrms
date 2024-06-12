<?php
session_start();
error_reporting(E_ALL); // Enable error reporting for debugging

// Include necessary files
include('admin/create_log.php');
include('dbconfig/dbcon.php');

// Connect to the first database
$conn = dbcon();
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

function hashPassword($password, $salt1 = "2345#$%@3e", $salt2 = "taesa%#@2%^#")
{
	// Use stronger hashing algorithms like bcrypt instead of sha1 and md5
	return password_hash($salt2 . $password . $salt1, PASSWORD_DEFAULT);
}

// Check if username and password are submitted via POST
if (isset($_POST['username']) && isset($_POST['password'])) {
	// Retrieve username and password from POST data
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Hash the password
	$hashedPassword = hashPassword($password);

	// Prepare and execute the query for admin login
	$stmt = $conn->prepare("SELECT * FROM tbl_login WHERE username=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	// Verify password
	if ($row && password_verify($salt2 . $password . $salt1, $row['password'])) {
		// Set session variables
		$_SESSION['id'] = $row['adminid'];
		$_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
		$_SESSION['SESS_ADMIN_FULLNAME'] = $row['adminname'];
		$_SESSION['SESSION_ROLE'] = $row['role'];
		$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
		$_SESSION['SESS_ADMIN_NAME'] = $username;
		$_SESSION['set_update_pf'] = '';
		$_SESSION['same_pf_no'] = '';

		// Log the successful login
		create_log("Logged In Successfully", $_SESSION['set_update_pf']);

		// Redirect to admin index page
		header("Location: admin/index.php");
		exit;
	} else {
		// If login fails, display an error message
		echo '<script>
            $.jGrowl("Please check Username or Password", {life: 400, close: function(e, m) { window.location="index.php"; }});
            </script>';
	}

	// Close statement and connection
	$stmt->close();
	$conn->close();
}

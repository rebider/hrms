<?php
include('../dbconfig/dbcon.php');
include('smscode.php');
$conn = dbcon();
session_start();
error_reporting(0);

$userfullname = $_POST["txtuserfullname"];
$txtuserpf = $_POST["txtuserpf"];
//$username=$_POST["txtusername"];
$role = $_POST["role"];
$email = $_POST["txtemail"];
$dept = $_POST["cmbdept"];
$contact = $_POST["txtmobile"];
$group = $_POST["cmbgroup"];
$accesslevel = $_POST["cmbaccesslevel"];
$joindate = $_POST["txtjoindate"];
$designation = $_POST["cmbdesignation"];
$session = $_SESSION['SESS_MEMBER_NAME'];

//$send=array("mobile_no"=>"$contact","message"=>"Dear $userfullname, Message From: DRM OFFICE This is your username=$username and password=$password");
//send_sms1($send);

if (mysqli_query($conn, "insert into tbl_user (empno,fullname,username,email,dept,designation,contact,createddate,createdby,status,modifydate,groupid,accesslevel,joiningdate)
			values ('$txtuserpf','$userfullname','$txtuserpf','$email','$dept','$designation','$contact',NOW(),'" . $_SESSION['SESS_MEMBER_NAME'] . "','0',NOW(),'$group','$accesslevel','$joindate')")) {
	$conn1 = dbcon1();
	$sql_in = "SELECT pf_num,e_apar from user_permission where pf_num='$txtuserpf'";
	$sql = mysqli_query($conn, $sql_in);
	//var_dump($sql);
	if (mysqli_num_rows($sql) == 0) {
		$ins = mysqli_query($conn1, "INSERT into user_permission(`pf_num`,`e_apar`) values('$txtuserpf','$role')");
	} else {
		$row_usr = mysqli_fetch_array($sql);
		if (empty($row_usr["e_apar"])) {

			$upd = ("UPDATE user_permission set e_apar='$role' where pf_num='$txtuserpf'");
			$ss = mysqli_query($conn1, $upd);
		} else {
			$user_perm = explode(",", $row_usr["e_apar"]);
			//print_r($user_perm);
			if (in_array("$role", $user_perm)) {
				echo "<script>
						alert('Already preseted in db!!!!');
						window.location='frmadduser.php';
						</script>";
			} elseif (!in_array(",", $user_perm)) {
				array_push($user_perm, $role);
				$user_perm = (count($user_perm) > 1) ? implode(",", $user_perm) : 1;
				//print_r($user_perm);
				$upd = ("UPDATE user_permission set e_apar='" . $user_perm . "' where pf_num='" . $txtuserpf . "'");
				$s = mysqli_query($conn1, $upd);
			}
		}
	}
	//exit();
	// dbcon();
	mysqli_query($conn, "insert into tbl_audit(message,action,updatePerson,date) values('User Added with username $username','adding','$session',NOW())");
	echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmadduser.php';
						</script>";
} else {
	echo mysqli_error($conn);
}

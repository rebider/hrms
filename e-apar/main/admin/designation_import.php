<?php

session_start();


//import excel

/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

define("DB_HOST", "localhost"); // set database host
define("DB_USER", "root"); // set database user
define("DB_PASS", ""); // set database password
define("DB_NAME", "pnm"); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysqli_select_db(DB_NAME, $link) or die("Couldn't select database");

$databasetable = "tbl_designation";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
//$inputFileName = 'Sample.xlsx'; 
//$inputFileName = $_FILES['file']['tmp_name'];
$FILENAME = $_GET['txtfile'];
echo "File name   &&   $FILENAME";

//$file = $_FILES['file']['tmp_name'];

try {
	$objPHPExcel = PHPExcel_IOFactory::load($FILENAME);
} catch (Exception $e) {
	die('Error loading file "' . pathinfo($FILENAME, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for ($i = 2; $i <= $arrayCount; $i++) {
	$emplcode = addslashes(trim($allDataInSheet[$i]["A"]));

	$query = "SELECT * FROM tbl_designation WHERE designation = '" . $emplcode . "'";
	$sql = mysqli_query($query);
	$recResult = mysqli_fetch_array($sql);
	$existName = $recResult["designation"];
	if ($existName == "") {


		// $insertTable= mysql_query("insert into tbl_registration (registerno, ppono,fullname,designation,station,department,dateofbirth) 
		// values('".$reg_no."', '".$ppono."','".$name."','".$design."','".$station."','".$dept."','".$dob."')");


		$insertTable = mysqli_query("insert into tbl_designation(designation)values('$emplcode')");


		$msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="import.php">Go Back to tutorial</a></div>';
		echo "<script>
				 alert('Sheet Added Successfully!!!!');
				 window.location='frmimport.php';
				 </script>";
	} else {
		$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="frmimport.php">Go Back to tutorial</a></div>';
	}
}
echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>" . $msg . "</div>";

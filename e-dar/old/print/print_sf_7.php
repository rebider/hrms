<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$sql=mysql_query("SELECT * from  tbl_form_details where id='".$_GET['id']."'",$db_edar);
$frm_fetch=mysql_fetch_array($sql);
$emp_name = get_emp_name($frm_fetch['emp_id']);
$emp_desig = get_emp_designation($frm_fetch['emp_id']); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print SF 7 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">
    <style type="text/css">
        .text-tabbed2 {
    text-indent: 04em;
}       
.text-tabbed {
    text-indent: 12em;
}
.text-tabbed3 {
    text-indent: 09em;
}
.sf6-text-tabbed1 {
        text-indent: 20em;
    }
    .text-tabbed4{
        text-indent: 14em;
    }
    </style>

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.7</strong></h3>
        <h4 class="text-center"><strong>Standard Form of Order Relating to Appointment of Inquiry Officer/ Board of Inquiry  </strong></h4>
        <h4 class="text-center"><strong>[Rule 9(2) of RS(D&A) Rules,1968]</strong></h4>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No <strong><?php echo $frm_fetch['form_no']; ?></strong></h5>
                <h5>Railway <strong><?php echo $frm_fetch['railway_board']; ?></strong></h5>
                <h5>Place of Issue <strong><?php echo $frm_fetch['place_of_issue']; ?></strong></h5>
                <h5>Dated <strong><?php echo $frm_fetch['form_dated']; ?></strong></h5>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div>
        <div class="row">
            <p class="text-tabbed">Where as an Inquiry under Rule 9 of the Railway Servants (Discipline and Appeal) Rules.</p>
            <p class="text-tabbed3">1968 is being held against Shri <strong><?php echo get_emp_name($frm_fetch['emp_id'])." (".get_emp_designation($frm_fetch['emp_id']).")"; ?></strong></p>
            <p class="sf6-text-tabbed1">(Name and Desigantion of the Railway servant.)
            </p>
            <p class="text-tabbed">AND Where as the undersigned considers that Board of Inquiry /an Inquiry Officer </p>
            <p class="text-tabbed3">should be apointed to inquire into the charge framed agaist him.</p>
            <p class="text-tabbed">NOW, therefore ,the undersigned , in exercise of the power conferred by sub-rule(2)</p>
            <p class="text-tabbed3">of the said Rule, hereby appoints.</p>
            
        </div>
        <div class="row" style="margin-left: 90px;">
            <p class="sf6-text-tabbed2"> A Board of Inquiry consisting of:</p>
            <div class="col-md-4 left" >
                <h5><i>Name of Member</i> </h5>
                <?php 
                    $sf7_mem_data=explode(",", $frm_fetch['sf7_board_members_details']);
                    $i=0;
                    foreach ($sf7_mem_data as $key => $value) {
                        $i++;
                        echo "<h5><b>$i. ".get_emp_name($value)."</b></h5>";
                    }
                ?>
                
            </div>
            <div class="col-md-8 right">
                <h5><i>Designation</i> </h5>
                <?php 
                    $sf7_mem_data=explode(",", $frm_fetch['sf7_board_members_details']);
                    //$i=0;
                    foreach ($sf7_mem_data as $key => $value) {
                        $i++;
                        echo "<h5><b> ".get_emp_designation($value)."</b></h5>";
                    }
                ?>
                
            </div>
        </div>
        <div class="row">
            <h4 class="text-center">OR</h4>
        </div>
        <div class="row">
            <p class="text-tabbed4">Shri <strong><?php echo get_emp_name($frm_fetch['inquiry_o_pf'])." (".get_emp_designation($frm_fetch['inquiry_o_pf']).")"; ?></strong></p>
            <p class="sf6-text-tabbed1">(Name and Desigantion of the Inquiry Officer.)</p>
            <p class="text-tabbed3">as Inquiry Officer to Inquire into the charges against the said Shri <strong><?php echo $emp_name;?></strong></p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ......................................</h5>
                <h5>Name .........................................</h5>
                <h5>(Designation of the Disciplinary Authority)</h5>
                
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Copy to:</h5>
            <h5><b>Shri <?php echo $emp_name." (".$emp_desig.")";?></b> </h5>
            <h5>(Name and designation of the Railway Servant)</h5>
        </div>
        <div class="col-md-6">
        </div>
            
        </div>
        <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Copy to:</h5>
            <?php
                    $i=0;
                    foreach ($sf7_mem_data as $key => $value) {
                        $i++;
                        echo "<h5><b>$i.  Shri".get_emp_name($value)."  (".get_emp_designation($value).")</b></h5>";
                        echo "<h5>(Name and designation of the Member)</h5>";
                    }
                ?>
        </div>
        <div class="col-md-6">
        </div>
            
        </div>
        <div class="row">
            <h4 class="text-center">OR</h4>
        </div>
        <div class="row">
        <div class="col-md-6 pull-left">
            
            <h5><b>Shri <?php echo get_emp_name($frm_fetch['inquiry_o_pf'])." (".get_emp_designation($frm_fetch['inquiry_o_pf']).")"; ?></b> </h5>
            <h5>(Name and designation of the Inquiry Officer)</h5>
            
        </div>
        <div class="col-md-6">
        </div>
            
        </div>
        
    </div>
</body>

</html>
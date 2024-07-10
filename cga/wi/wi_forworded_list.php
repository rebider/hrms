<?php
	$GLOBALS['flag']="1.7";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Forworded Application List
							</div>
							<div class="tools">
							</div>
						</div>
						
						<div class="portlet-body">
						<br>
							 <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                      <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
							<thead>
							<tr>
								<th>SR No</th>
								<th>Ex. Employee PFno</th>
								<th>Ex. Employee Name</th>
								<th>Applicant Name</th>
								<!-- <th>Applicant Userame</th> -->
								<th>Category</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
<?php
$con = dbcon1();

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch forward application details
$sql = mysqli_query($con, "SELECT * FROM forward_application WHERE hold_status = 1 AND rcc_note_status = 1");
if (!$sql) {
    die("Query failed: " . mysqli_error($con));
}
$f_sql = mysqli_fetch_array($sql);

// Check if f_sql is not null
if ($f_sql) {
    // Fetch login details for forward_from_pfno
    $sql1 = mysqli_query($con, "SELECT pf_number FROM login WHERE pf_number = '".$f_sql['forward_from_pfno']."' AND role = '7'");
    if (!$sql1) {
        die("Query failed: " . mysqli_error($con));
    }
    $l_sql = mysqli_fetch_array($sql1);

    // Fetch login details for forward_to_pfno
    $sql2 = mysqli_query($con, "SELECT pf_number FROM login WHERE pf_number = '".$f_sql['forward_to_pfno']."' AND role = '4'");
    if (!$sql2) {
        die("Query failed: " . mysqli_error($con));
    }
    $l_sql1 = mysqli_fetch_array($sql2);

    // Validate fetched data
    if ($l_sql && $l_sql1 && $f_sql['forward_from_pfno'] == $l_sql['pf_number'] && $f_sql['forward_to_pfno'] == $l_sql1['pf_number'] && $f_sql['hold_status'] == 1 && $f_sql['rcc_note_status'] == 1) {
        // Conditions are met, proceed accordingly
    } else {
        $query_emp = "SELECT forward_application.id, applicant_registration.*, hold_status, rcc_note_status, dak_status, forward_from_pfno 
                      FROM forward_application 
                      JOIN applicant_registration ON forward_application.ex_emp_pfno = applicant_registration.ex_emp_pfno 
                      WHERE (hold_status = 0 OR hold_status = 1) 
                      AND forward_from_pfno = '".$_SESSION['pf_number']."' 
                      GROUP BY forward_application.ex_emp_pfno 
                      ORDER BY forward_application.id DESC";

        $result_emp = mysqli_query($con, $query_emp);
        if (!$result_emp) {
            die("Query failed: " . mysqli_error($con));
        }

        $sr = 1;
        while ($value_emp = mysqli_fetch_array($result_emp)) {
            echo "
            <tr>
                <td>".$sr++."</td>
                <td>".$value_emp['ex_emp_pfno']."</td>
                <td>".$value_emp['ex_empname']."</td>
                <td>".$value_emp['applicant_name']."</td>
                <td>".getcase($value_emp['category'])."</td>
                <td>
                    <a class='btn btn-primary btnn' href='track-modul.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Status</a>&nbsp;&nbsp;
                    <a class='btn btn-default' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show Application</a>
                </td>
            </tr>";
        }
    }
} else {
    echo "No records found.";
}
?>
</tbody>

							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				
			</div>
			<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Rejected Application List
							</div>
							<div class="tools">
							</div>
						</div>
						
						<div class="portlet-body">
						<br>
							 <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                      <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
							<thead>
							<tr>
								<th>SR No</th>
								<th>Ex. Employee PFno</th>
								<th>Ex. Employee Name</th>
								<th>Applicant Name</th>
								<th>Category</th>
								<th>Reason</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<?php
								$con=dbcon1();
								$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and hold_status='0' AND return_status='1' AND forward_to_pfno='".$_SESSION['pf_number']."' ";
								
								$result_emp = mysqli_query($con,$query_emp);
								$sr=1;
								while($value_emp = mysqli_fetch_array($result_emp))
								{
									 echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td>".$value_emp['remark']."</td>";
								
									echo "<td><a class='btn btn-primary btnn' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a></td>";
								//<a class='btn btn-primary btnn'   href='deathcase.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>
								echo "</tr>";
								} 
								?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
	include 'common/footer.php';
?>

<!-- 
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=forward_application" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" >
					 <input type="hidden" id="username" name="username">
					 <input type="hidden" id="fw_tbl_id" name="fw_tbl_id">

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
									<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>Select Recruitment cell clerk</option>
										  <?php
											 
											 $query_emp =mysqli_query($con,"SELECT emp_data.emp_name as name,login.pf_number as pf_number,login.* from login,emp_data where emp_data.pf_number=login.pf_number AND role='7' AND login.dept='".$_SESSION['dept']."' ");
											 					
											 while($value_emp = mysqli_fetch_array($query_emp))
											 {
											  	echo "<option value='".$value_emp['pf_number']."'>".$value_emp['name']."</option>";
											 }
										  ?>
									</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								
								<button type="submit" class="btn blue">Forward</button>
									
							</div>
						</div>
						
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn blue">Save changes</button> ->
				</div>
			</form>
		</div>
		<!-- /.modal-content ->
	</div>
	<!-- /.modal-dialog ->
</div> -->
<!-- /.modal -->

<script type="text/javascript">
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );

    $(document).on('click','.btnn',function(){
  	var pf=$(this).attr("id");
  	var username=$(this).attr("value");
  	var id=$(this).attr("mass");

  	$("#ex_emp_pfno").val(pf);
  	$("#username").val(username);
  	$("#fw_tbl_id").val(id);

  });
</script>
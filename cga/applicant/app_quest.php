<?php
$GLOBALS['flag'] = "1.5";
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
							<i class="fa fa-globe"></i>Question Paper & Syllabus List
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
										<th>Question Paper Name</th>
										<th>Year</th>
										<th>Uploaded Date</th>
										<th>Files</th>
										<!-- <th>Action</th> -->

									</tr>
								</thead>
								<tbody>
									<?php
									$con = dbcon1();
									$query_emp = "SELECT * from add_syllabus";
									$result_emp = mysqli_query($con, $query_emp);
									$sr = 1;
									while ($value_emp = mysqli_fetch_array($result_emp)) {

										echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['name_of_que_paper'] . "</td>
								<td>" . $value_emp['year'] . "</td>
								<td>" . $value_emp['uploaded_date'] . "</td>
								
								<td>";

										//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

										echo "<a href='../syllabus/" . $value_emp['uploaded_file_path'] . "' target='_blank'>" . $value_emp['uploaded_file_path'] . "</a></td>";

										//echo "<td><button value='".$value_emp['id']."' class='btn btn-danger active' style='margin-left:10px;'>Remove</button></td>";
										echo "</tr>
								";
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
	<?php
	include 'common/footer.php';
	?>

	<script type="text/javascript">
		$('#DataTables_Table_22').DataTable({
			dom: 'Bfrtip',
			"pageLength": 5,
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
	</script>
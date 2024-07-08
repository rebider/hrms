<?php
$GLOBALS['flag']="5.12";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
  }
  
	#info1 {
	border: 1px solid black;
    display : none;
	page-break-after:always;
    } 
	#info2 {
    display : none;
    }   
	#info3 {
    display : none;
    }
    #info4 {
    display : none;
    }
 
}
 @media print{
   .content{
    background: #fff !important;
   }
   .content-wrapper{
    background: #fff !important;
   }
 }
 
 .box.box-info {
    border-top-color: #ccc;
  }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
          border : 1px solid #ccc;
        }
        .table-bordered {
            border: 1px solid #ccc;
        }
	
	#info1 {
    display : none;
  page-break-after:always;
  
      } 
  #info2 {
    display : none;
    }   
  #info3 {
    display : none;
      }
      #info4 {
    display : none;
      }
	
  .borderbox{
	  border: 1px solid black !important;
	  overflow: hidden;
  }
  .summary-total{
	  width: 33% !important;
	  margin: 0px auto;
  }
</style>

<?php

// if(isset($_REQUEST['id']))
// {
//   $empl_query = mysqli_query("select * from taentryform_master where reference='".$_REQUEST['id']."'");
//   $empl_id_result = mysqli_fetch_array($empl_query);
//   $empl_id = $empl_id_result['empid'];

//   $emp_query = mysqli_query("select * from employees where pfno='".$empl_id."'");
//   $emp_result = mysqli_fetch_array($emp_query);
//   $years=["January","February","March","April","May","June","July","August","September","October","November","December"];
//   $expl = explode(",",$empl_id_result['TAMonth']);
// }        

?>		
<div class="">			
<div class="page-content-wrapper">
		<div class="page-content">
		    
		    <div class="page-bar">
            	<ul class="page-breadcrumb">
            		<li>
            			<i class="fa fa-home"></i>
            			<a href="index.php">Home / मुख पृष्ठ</a>
            			<i class="fa fa-angle-right"></i>
            		</li>
            		<li>
            			<a href="#">All Verified Contigency List</a>
            		</li>
            	</ul>
            	
            </div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 btnhide">
						<b>All Verified Contigency List</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div>
				</div>
	<div class="portlet-body form">
						
	<form method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
			
					<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<th>Reference No.</th>
											<th>Date</th>
											<th><center>From<br>Place</center></th> 
											<th><center>To<br>Place</center></th> 
											<th>K.M.</th> 
											<th>Rate/K.M </th>
											<th>Amount</th>
											<th>Objective</th>  
											<!-- <th>Action</th> 	 -->							
										</tr>										
									</thead>
									<tbody align="center">
										<?php
										$query="SELECT DISTINCT(set_number),reference FROM `continjency` WHERE reference='".$_GET['ref_no']."' ORDER by STR_TO_DATE(cntdate,'%d/%m/%Y') ASC";
											$sql=mysqli_query($conn,$query);
											$total_row1=mysqli_num_rows($sql);
											while($row_1 = mysqli_fetch_array($sql)){

										    $query1="SELECT * FROM `continjency` WHERE set_number='".$row_1['set_number']."' AND reference='".$_GET['ref_no']."' ORDER by STR_TO_DATE(cntdate,'%d/%m/%Y') ASC";
											$sql1=mysqli_query($conn,$query1);
											echo mysqli_error($conn);
											$total_rows=mysqli_num_rows($sql1);
											$cnt=1;
											$T_amount=0;
											while ($row = mysqli_fetch_array($sql1)) {
										?>
										<tr>
											<?php 
												if($cnt == 1){
											?>
											<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo $row_1['reference']; ?> </td>
											<?php 												
												}
											?>
											<td><?php echo $row['cntdate']; ?></td>
											<td><?php echo $row['cntfrom']; ?></td>
											<td><?php echo $row['cntTo']; ?></td>
											<td><?php echo $row['kms']; ?></td>
											<td><?php echo $row['rate_per_km']; ?></td>
											<td>
												<?php 
													echo $row['total_amount']; 
													$T_amount=$T_amount+$row['total_amount'];
												?>												
											</td>
											<?php 
												if($cnt == 1){
											?>
											<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo $row['objective']; ?> </td>

											<?php }

											 $cnt++;
											?>											
										</tr>
										<?php 
											}
										?>
										<tr>
											<td colspan="6" style="text-align: right;"><b>Total</b></td>
											<td colspan="3" style="text-align: left;"><b><?php echo $T_amount; ?></b></td>
										</tr>
										<tr>
											<td colspan="13" style="background-color: #fcf8e3a3;"></td>
										</tr>
										<?php 
											} 
											?>
										
									</tbody>
								</table>
							</div>

							<!-- <div class="text-right">
								<button class="btn yellow">Print</button>
							</div> -->
						</div>
						
						<div class="col-md-4"></div>
						</div>
						
						<div class="col-md-12 trackprint-btn">
							<!-- <ul>
										<li><a href="otp_forward_con1.php?reference_no=<?php echo $_GET['ref_no'];?>"" class="btn green"  class="hide_print btn btn-primary pull-right" >Forword To</a></li>
							</ul> -->
						</div>
					</div>
					</div>
					
				</div>
			</div>
	</div>
	
</form>				

			
			</div>
		</div>
	</div>
	</div>
	
<?php
	include 'common/footer.php';
?>



<!-- File export script -->
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

   function print_button()
   {
      $(".main-footer").hide();
      $(".box-header").hide();
      $(".hide_print").hide();
      $("#info").hide();
      $(".btnhide").hide(); 
      window.print();
      $(".main-footer").show();
      $(".box-header").show();
      $(".hide_print").show();
     $("#info").show();
     $("#info2").show();
     $("#info3").show();
	 $("#info4").show();
	 window.location.reload();
   }

</script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
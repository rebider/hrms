<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

error_reporting(0);


function get_level_value($id)
{
	$sql=mysql_query("select * from seventh where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['level'];
	

	}
	return $fetch;
}

function get_dept($id)
{
	$sql=mysql_query("select * from department where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['dept'];
	}
	return $fetch;
}


function get_mod_fill($id)
{
	$sql=mysql_query("select mode_of_filling from excel_table where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['mode_of_filling'];
	}
	return $fetch;
}


function get_cat($id)
{
	$sql=mysql_query("select categary from category_new where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['categary'];
	}
	return $fetch;
}



?>


<style>
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
 <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
      Post Schedule Entries Report
      </h1>
    </section>
    <section class="content">
       
	 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daily Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Department</th>
				  <th>Date of Assessment</th>
				  <th>Date of Exam</th>
				  <th>Date of Panel</th>
				  <th>Date of Notification</th>
				   <th>In-Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
			    $ename=$_SESSION['SESS_USER_FULLNAME'];
					$sql=mysql_query("select * from post_schedule where date_time=CURDATE() AND updated_by='$ename'");
               		//$row_cnt = mysqli_num_rows($sql);	
					
					
				if($sql)
				{
					
					while($result=mysql_fetch_array($sql))
					{
						$conv=$result['date_of_ass'];
					    if($conv!='0000-00-00')
					{
						$con1=date('d-m-Y',strtotime($conv));
					}
					else
					{
						$con1='-';
					}
					
					 $con_exam1=$result['date_of_exam'];
					 if($con_exam1!='0000-00-00')
					{
						$con_exam=date('d-m-Y',strtotime($con_exam1));
					}
					else
					{
						$con_exam='-';
					}
					
					$con_date_pan1=$result['date_of_panel'];
					if($con_date_pan1!='0000-00-00')
					{
				    $con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_pan='-';
					}
					
					$con_date_noti1=$result['date_of_noti'];
					if($con_date_noti1!='0000-00-00')
					{
				    $con_date_not=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_not='-';
					}
					
					$in_date=$result['date_time'];
					//echo $in_date1;
					if($in_date!='0000-00-00')
					{
				    $in_date1=date('d-m-Y',strtotime($in_date));
					}
					else
					{
						$in_date1='-';
					}
						
						echo "<tr>";						
						echo "<td>".get_dept($result['dept'])."</td>";
						echo "<td>".$con1."</td>";
						echo "<td>".$con_exam."</td>";
						echo "<td>".$con_date_pan."</td>";
						echo "<td>".$con_date_not."</td>";
						echo "<td>".$in_date1."</td>";
						echo "<td>
						
							<button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button>
						</td>";
						echo "</tr>";
						
					
					}
				
				}
				else
				{
             		echo "<script>alert('No entries found for today')</ script>";
				}
				
				
				
				?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	 <script>
		 
  $(function () {
    $('#example1').DataTable()
    /* $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    }) */
  })
</script> 
 </section>
  </div>


<!---------------------->
<div class="wrap">
  <h1>Bootstrap Modal Example</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">
    Large modal
  </button>
</div>
 <div id="printThis">
<div id="MyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg">
    
    <!-- Modal Content: begins -->
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Your Headings</h4>
      </div>
    
      <!-- Modal Body -->  
      <div class="modal-body">
        <div class="body-message">
          <h4>Any Heading</h4>
          <p>And a paragraph with a full sentence or something else...</p>
        </div>
      </div>
    
      <!-- Modal Footer -->
      <div class="modal-footer">
       <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button id="btnPrint" type="button" class="btn btn-default">Print</button>
      </div>
    
    </div>
    <!-- Modal Content: ends -->
    
  </div>
    </div>
</div>
   <?php
 include_once('../global/footer.php');
 ?>
<script>
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>
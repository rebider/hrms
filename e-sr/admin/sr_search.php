<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/SR/index.php';</script>";
 }
 $_GLOBALS['a'] = 'sr_search';
include_once('../global/header.php');
include_once('../global/topbar.php');

include('create_log.php');
$action_on=$_SESSION['set_update_pf'];
$action="Visited SR Search Page";
create_log($action,$action_on);

//include_once('../global/sidebaradmin.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
		<div class="box box-info text-center">
            <div class="box-header with-border">
              <h3 class="box-title">Search SR record</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 col-sm-2 col-xs-12 control-label">Enter PF Number</label>

                  <div class="col-md-6 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter PF Number" name="pf_no" id="pf_no" required maxlength="50">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-md-2 col-sm-2 col-xs-12 control-label"></label>
                  <div class="col-md-6 col-sm-10 col-xs-12">
				  
                <button type="submit" id="search" name="search" class="btn btn-primary">Search</button>
                     <button type="reset" class="btn btn-warning">Cancel</button>
			 <?php
			 dbcon1();
				if(isset($_POST['search'])){
						$pf=$_POST['pf_no'];
					$sql=mysql_query("select * from biodata_temp where pf_number='$pf'");
					//echo "select * from biodata_temp where pf_number='$pf'".mysql_error();
					
					$result=mysql_num_rows($sql);
					if($result<=0)
					{
						echo "<script>alert('This SR Number is not registered');</script>";
					}else{
					    
					    $action_on=$pf;
						$action="Searched ".$action_on." PF Number For SR View";
						create_log($action,$action_on);
					    
					echo "<script>window.location.href='display_sr_tab.php?pf=$pf';</script>";
					}
				}
			?>
                  </div>
                </div>  
              </div>
            </form>
         </div>
    </section>
  </div> 
<?php
 include_once('../global/footer.php');
?> 

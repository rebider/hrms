 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar hidden-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;डैशबोर्ड /  Dashboard</b></li></a>

        <!--li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class=""><a href="Designation.php"><i class="fa fa-circle-o"></i>Designation</a></li>
                 <li class=""><a href="user_registration.php"><i class="fa fa-circle-o"></i>Employee Registration</a></li>
              </ul>
            </li>
		 <!--li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pay Commission</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="full_list.php"><i class="fa fa-circle-o"></i>Full List</a></li>
            <li><a href="full_list.php?pay_comm=3"><i class="fa fa-circle-o"></i>3</a></li>
            <li><a href="full_list.php?pay_comm=4"><i class="fa fa-circle-o"></i>4</a></li>
            <li><a href="full_list.php?pay_comm=5"><i class="fa fa-circle-o"></i>5</a></li>
            <li><a href="full_list.php?pay_comm=6"><i class="fa fa-circle-o"></i>6</a></li>
            <!--li><a href="add_station.php"><i class="fa fa-circle-o"></i>Add Station</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="report.php?stat=1"><i class="fa fa-circle-o"></i>PC Wise</a></li>
            <li><a href="report.php?stat=2"><i class="fa fa-circle-o"></i>Year Wise</a></li>
          </ul>
        </li-->
		
		      <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>यात्रा भत्ता <br>Travelling Allowances</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <?php 
			 $query = "select role from users where username='".$_SESSION['admin_username']."'";
                $result = mysql_query($query);
				$result_set = mysql_fetch_array($result);
				$role = $result_set['role'];
				if($role=="3")
				{
		  ?>
             <li class=""><a href="Show_claimed_TA.php"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची <br>Claimed TA List</a></li>
             <li class=""><a href="ApprovedList.php"><i class="fa fa-circle-o"></i>अनुमोदित  यात्रा भत्ता सूची<br> Approved TA List</a></li>
             <li class=""><a href="generate_summary.php"><i class="fa fa-circle-o"></i>Generate Summary</a></li>
             <li class=""><a href="summary_report.php"><i class="fa fa-circle-o"></i>Generated Summary</a></li>
<li class=""><a href="vetted_list.php"><i class="fa fa-circle-o"></i>Vetted Summary</a></li>
				<?php } else if($role=='2') {?>
			 <li class=""><a href="level_summary_report.php"><i class="fa fa-circle-o"></i>Summary</a></li>
             <li class=""><a href="final_approved_list.php"><i class="fa fa-circle-o"></i>Approved Summary</a></li>
				<?php } else if($role=='5'){ ?>
				<li class=""><a href="level_summary_report.php"><i class="fa fa-circle-o"></i>Summary</a></li>
             <li class=""><a href="final_approved_list.php"><i class="fa fa-circle-o"></i>Approved Summary</a></li>
				<?php }else if($role=='6') { ?>
				<li class=""><a href="show_rejected_claim.php"><i class="fa fa-circle-o"></i>Rejected Pending TA List</a></li>
             <li class=""><a href="rejectedclaim.php"><i class="fa fa-circle-o"></i>Rejected Approved TA List</a></li>
				<?php } else{ ?>
				<li class=""><a href="Show_claimed_TA.php"><i class="fa fa-circle-o"></i>Claimed TA List</a></li>
             <li class=""><a href="ApprovedList.php"><i class="fa fa-circle-o"></i>Approved TA List</a></li>
				<?php } ?>
          </ul>
        </li>
		
		

       <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

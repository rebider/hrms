<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
  echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaremployee.php');
include_once('../global/sidebaremployee.php');

?>
<script>
  //----------------------------// Document Ready Function //----------------------------//
  $(document).ready(function() {
    //ShowRecordsUser();
    $("#frmaddemployee").submit(function(event) {
      var formData = new FormData($(this)[0]);
      formData.append("Flag", $("#btnSave").val());
      $.ajax({
        url: "Ajaxemployee.php",
        type: 'POST',
        data: formData,
        async: false,
        success: function(data) {
          // alert(data);
          // ShowRecords();
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  }); ///ready fun close


  //----------------------------//Function ShowRecords User//----------------------------//
  function ShowRecordsUser() {
    $.post("Ajaxemployee.php", {
        Flag: "ShowRecordsUser"
      },
      function(data, success) {
        $("#divRecords").html(data);
        var oTable = $('#tbl_registration').dataTable({
          "oLanguage": {
            "sSearch": "Search all columns:"
          },
          "aoColumnDefs": [{
              'bSortable': false,
              'aTargets': [0]
            } //disables sorting for column one
          ],
          'iDisplayLength': 12,
          "sPaginationType": "full_numbers",
          "dom": 'T<"clear">lfrtip'
        });
      }
    );
  }
</script> <!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
    </h1>

    <br>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <?php
      $sqlEmployee = mysqli_query($conn,"select * from tbl_employee where username='" . $_SESSION['SESS_MEMBER_NAME'] . "'");
      while ($rwEmployee = mysqli_fetch_array($sqlEmployee)) {
      ?>
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile" style="height: 391px;">
              <img class="profile-user-img img-responsive img-circle" src="../plugins/dist/img/usericon.png" alt="User profile picture">

              <h5 class="profile-username text-center"><?php echo $rwEmployee["empname"];  ?></h5>
              <br>
              <p class="text-muted text-center"><?php echo $rwEmployee["design"]; ?></p>
              <br>
              <p class="text-muted text-center">Department:&nbsp;<span><?php echo $rwEmployee["dept"]; ?></span></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Basic Details</a></li>
              <li><a href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../plugins/dist/img/usericon.png" alt="user image">
                    <span class="username">
                      <a href="#"><?php echo $rwEmployee["empname"];  ?></a>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    About Me
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" value="<?php echo $rwEmployee["empname"]; ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Department</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" value="<?php echo $rwEmployee["dept"]; ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Designation</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $rwEmployee["design"]; ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputExperience" class="col-sm-2 control-label">User Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txtusername" name="txtusername" value="<?php echo $rwEmployee["emplcode"]; ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" value="<?php echo $rwEmployee["password"]; ?>" readonly />
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- /.post -->
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" id="frmchangepass" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Old Username</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtoldpass" name="txtoldpass" value="<?php echo $rwEmployee["password"]; ?>" readonly />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">New Password</label>

                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="txtnewpass" name="txtnewpass" placeholder="Enter New Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Re-Enter New Password</label>

                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="txtrenewpass" name="txtrenewpass" placeholder="Re-Enter New Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember Me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info btn-flat" id="btnChange" name="btnChange">Change Password</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->


              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      <?php
      }
      ?>
    </div>

    <?php
    if (isset($_POST["btnChange"])) {
      $newpass = $_POST["txtnewpass"];
      $renewpass = $_POST["txtrenewpass"];
      //$username=$_POST["txtusername"];

      if (mysqli_query($conn,"update tbl_employee set password='$renewpass' where username='" . $_SESSION['SESS_MEMBER_NAME'] . "'")) {
        mysqli_query($conn,"insert into tbl_audit(message,action,updatePerson,date) values(' " . $_SESSION['SESS_MEMBER_NAME'] . " Password Changed Successfully','editing','" . $_SESSION['SESS_MEMBER_NAME'] . "',NOW())");
        echo "<script>
			  alert('Password Changed Successfully....');
			  window.location='frmemployeeprofile.php';
			  </script>";
      }
    }
    ?>
    <!-- /.row -->

  </section>

  <!-- /.content -->
</div>
<?php
include_once('../global/footer.php');
?>
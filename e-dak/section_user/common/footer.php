<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        © Copyright 2020 <a href="http://www.infoigy.com/" target="_blank">Salgem Infoigy Tech Pvt Ltd.</a>All rights reserved.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script src="../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="../../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.js"></script>

<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../new_eta/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../new_eta/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="../../new_eta/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="../../new_eta/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<script src="../../new_eta/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="../../new_eta/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>

<script type="text/javascript" src="../../new_eta/assets/global/plugins/select2/select2.min.js"></script>

<!-- <script src="../assets/other/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap datepicker -->
<!-- <script src="../assets/other/plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="../../new_eta/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="../../new_eta/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../new_eta/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../new_eta/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../new_eta/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../new_eta/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="../../new_eta/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="../../new_eta/assets/admin/pages/scripts/table-managed.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="../../new_eta/assets/global/plugins/select2/select2.full.min.js"></script>
<script src="../../new_eta/assets/admin/pages/scripts/components-pickers.js"></script>

<!-- datatables-->
<script src="../../new_eta/assets/global/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../../new_eta/assets/global/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- <script src="../assets/other/plugins/jquery-datatable/jquery-datatable.js"></script> -->

<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features 
        Index.init();
        Index.initDashboardDaterange();
        Index.initCalendar(); // init index page's custom scripts
        Tasks.initDashboardWidget();
    });

    $(document).ready(function() {
        $(".select2").select2();
    });
    $(document).ready(function() {
        //Date picker
        $('.datepicker_1').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
        });
    });

    $(document).ready(function() {
        'use strict';
        $(window).on('load', function() {
            if ($(".pre-loader").length > 0) {
                $(".pre-loader").fadeOut(1500);
                // $(".pre-loader").fadeOut("slow");
            }
        });
    });


    $(document).ready(function() {
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ]
        });
    });
</script>

<!-- END JAVASCRIPTS -->



<script type="text/javascript">
    var disabledTool = new Date();
    disabledTool.setDate(disabledTool.getDate() - 2);
    disabledTool.setHours(0, 0, 0, 0);

    $(function() {
        $("#datepicker").datepicker({
            beforeShowDay: function(date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
    });
</script>

<script>
    function modu(modu_name) {
        $.ajax({
            url: '../../../../module.php',
            type: 'POST',
            data: {
                name: modu_name
            },
            success: function(data) {
                //console.log(data);
                $('#rad').html(data);
                $('#mod').html(modu_name.toUpperCase());
            }
        });
    }
</script>


</body>
<!-- END BODY -->

</html>
// DATA_TEMPLATE: dom_data
oTest.fnStart( "aoColumns.sTitle" );

$(document).ready( function () {
	/* Check the default */
	var oTable = $('#example').dataTable();
	var oSettings = oTable.fnSettings();
	
	oTest.fnTest( 
		"Column names are read from the DOM by default",
		null,
		function () {
			var jqNodes = $('#example thead tr:eq(0) th');
			var bReturn = 
				jqNodes[0].innerHTML == "Rendering engine" &&
				jqNodes[1].innerHTML == "Browser" &&
				jqNodes[2].innerHTML == "Platform(s)" &&
				jqNodes[3].innerHTML == "Engine version" &&
				jqNodes[4].innerHTML == "CSS grade";
			return bReturn;
		}
	);
	
	oTest.fnTest( 
		"Can set a single column title - and others are read from DOM",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"aoColumns": [
					null,
					{ "sTitle": 'unit test' },
					null,
					null,
					null
				]
			} );
		},
		function () {
			var jqNodes = $('#example thead tr:eq(0) th');
			var bReturn = 
				jqNodes[0].innerHTML == "Rendering engine" &&
				jqNodes[1].innerHTML == "unit test" &&
				jqNodes[2].innerHTML == "Platform(s)" &&
				jqNodes[3].innerHTML == "Engine version" &&
				jqNodes[4].innerHTML == "CSS grade";
			return bReturn;
		}
	);
	
	oTest.fnTest( 
		"Can set multiple column titles",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"aoColumns": [
					null,
					{ "sTitle": 'unit test 1' },
					null,
					null,
					{ "sTitle": 'unit test 2' }
				]
			} );
		},
		function () {
			var jqNodes = $('#example thead tr:eq(0) th');
			var bReturn = 
				jqNodes[0].innerHTML == "Rendering engine" &&
				jqNodes[1].innerHTML == "unit test 1" &&
				jqNodes[2].innerHTML == "Platform(s)" &&
				jqNodes[3].innerHTML == "Engine version" &&
				jqNodes[4].innerHTML == "unit test 2";
			return bReturn;
		}
	);
	
	
	oTest.fnComplete();
} );;
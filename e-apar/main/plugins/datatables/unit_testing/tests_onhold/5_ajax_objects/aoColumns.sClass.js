// DATA_TEMPLATE: empty_table
oTest.fnStart( "aoColumns.sClass" );

$(document).ready( function () {
	/* Check the default */
	var oTable = $('#example').dataTable( {
		"sAjaxSource": "../../../examples/ajax/sources/objects.txt",
		"aoColumns": [
			{ "mData": "engine" },
			{ "mData": "browser" },
			{ "mData": "platform" },
			{ "mData": "version" },
			{ "mData": "grade" }
		]
	} );
	var oSettings = oTable.fnSettings();
	
	oTest.fnWaitTest( 
		"By default the test class hasn't been applied to the column (sanity!)",
		null,
		function () { return $('#example tbody tr:eq(0) td:eq(2)').hasClass('unittest') == false; }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - first row",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/objects.txt",
				"aoColumns": [
					{ "mData": "engine" },
					{ "mData": "browser" },
					{ "mData": "platform", "sClass": 'unittest' },
					{ "mData": "version" },
					{ "mData": "grade" }
				]
			} );
		},
		function () { return $('#example tbody tr:eq(1) td:eq(2)').hasClass('unittest'); }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - third row",
		null,
		function () { return $('#example tbody tr:eq(3) td:eq(2)').hasClass('unittest'); }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - last row",
		null,
		function () { return $('#example tbody tr:eq(9) td:eq(2)').hasClass('unittest'); }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - has not applied to other columns - 1st",
		null,
		function () { return $('#example tbody tr:eq(3) td:eq(0)').hasClass('unittest') == false; }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - has not applied to other columns - 5th",
		null,
		function () { return $('#example tbody tr:eq(3) td:eq(4)').hasClass('unittest') == false; }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - seventh row - second page",
		function () { $('#example_next').click(); },
		function () { return $('#example tbody tr:eq(6) td:eq(2)').hasClass('unittest'); }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - has not applied to header",
		null,
		function () { return $('#example thead tr:eq(3) th:eq(4)').hasClass('unittest') == false; }
	);
	
	oTest.fnWaitTest( 
		"Add a class to a single column - has not applied to footer",
		null,
		function () { return $('#example thead tr:eq(3) th:eq(4)').hasClass('unittest') == false; }
	);
	
	
	oTest.fnWaitTest( 
		"Class defined for multiple columns - first row",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/objects.txt",
				"aoColumns": [
					{ "mData": "engine", "sClass": 'unittest2' },
					{ "mData": "browser" },
					{ "mData": "platform" },
					{ "mData": "version", "sClass": 'unittest1' },
					{ "mData": "grade" }
				]
			} );
		},
		function () {
			var bReturn = 
				$('#example tbody tr:eq(3) td:eq(0)').hasClass('unittest2') &&
				$('#example tbody tr:eq(8) td:eq(3)').hasClass('unittest1');
			return bReturn;
		}
	);
	
	oTest.fnWaitTest( 
		"Class defined for multiple columns - has not applied to other columns - 5th 1",
		null,
		function () { return $('#example tbody tr:eq(0) td:eq(4)').hasClass('unittest1') == false; }
	);
	
	oTest.fnWaitTest( 
		"Class defined for multiple columns - has not applied to other columns - 5th 2",
		null,
		function () { return $('#example tbody tr:eq(6) td:eq(4)').hasClass('unittest2') == false; }
	);
	
	
	oTest.fnComplete();
} );;;
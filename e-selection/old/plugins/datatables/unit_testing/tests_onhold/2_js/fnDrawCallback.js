// DATA_TEMPLATE: js_data
oTest.fnStart( "fnDrawCallback" );

/* Fairly boring function compared to the others! */

$(document).ready( function () {
	/* Check the default */
	var oTable = $('#example').dataTable( {
		"aaData": gaaData
	} );
	var oSettings = oTable.fnSettings();
	var mPass;
	
	oTest.fnTest( 
		"Default should be null",
		null,
		function () { return oSettings.fnDrawCallback == null; }
	);
	
	
	oTest.fnTest( 
		"One argument passed",
		function () {
			oSession.fnRestore();
			
			mPass = -1;
			$('#example').dataTable( {
				"aaData": gaaData,
				"fnDrawCallback": function ( ) {
					mPass = arguments.length;
				}
			} );
		},
		function () { return mPass == 1; }
	);
	
	
	oTest.fnTest( 
		"That one argument is the settings object",
		function () {
			oSession.fnRestore();
			
			oTable = $('#example').dataTable( {
				"aaData": gaaData,
				"fnDrawCallback": function ( oSettings ) {
					mPass = oSettings;
				}
			} );
		},
		function () { return oTable.fnSettings() == mPass; }
	);
	
	
	oTest.fnTest( 
		"fnRowCallback called once on first draw",
		function () {
			oSession.fnRestore();
			
			mPass = 0;
			$('#example').dataTable( {
				"aaData": gaaData,
				"fnDrawCallback": function ( ) {
					mPass++;
				}
			} );
		},
		function () { return mPass == 1; }
	);
	
	oTest.fnTest( 
		"fnRowCallback called once on each draw there after as well",
		function () {
			$('#example_next').click();
			$('#example_next').click();
			$('#example_next').click();
		},
		function () { return mPass == 4; }
	);
	
	
	
	
	
	oTest.fnComplete();
} );;
@extends('layouts.master_dialog')

@section('title', 'Welcome page')
@section('page_specific_jquery')
<script>
	if (top !== self) {
		$.ui.dialog.prototype._focusTabbable = $.noop;
	}
</script>


<script>
		/*
		 * jQuery UI Dialog: Open Dialog on Click
		 * http://salman-w.blogspot.com/2013/05/jquery-ui-dialog-examples.html
		 */
/*		 
		$(function() {
			$("#dialog").dialog({
				autoOpen: false,
				modal: true,
				buttons: {
					"Close": function() {
						$(this).dialog("close");
					}
				},	
				position: {
					my: "center",
					at: "center",
					of: window
				},
				
				dialogClass: "dlg-no-title"
			});

			$("#button").on("click", function() {
//				alert ('button clicked');
				$("#dialog").dialog("open");
			});
		});
*/		
	</script>

@endsection

@section('content')
<!-- /app/resources/views/public/index.blade.php -->
    
 
<div class="row">
	<div class="col-sm-12"> 
<!--   	<div class="bs-component">
-->
test content for dialog window	
<!-- </div> --> 
	</div>
</div><!-- end row -->
     
@endsection





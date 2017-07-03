@extends('layouts.master_public')

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
		$(function() {
			$("#dialog").dialog({
				autoOpen: false,
				height: 250,
				width: 450,
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
				$("#dialog").load('/dialog/test_form').dialog("open");
			});
		});
	</script>

@endsection

@section('content')
<!-- /app/resources/views/public/index.blade.php -->
    
 
<div class="row">
	<div class="col-sm-12"> 
<!--   	<div class="bs-component">
-->
		<div id="dialog" title="Dialog">
		<p>This dialog was created on document ready event with <code>autoOpen</code> set to <code>false</code>.</p>
		<p>It was opened by calling <code>.dialog(&quot;open&quot;)</code> method.</p>
		</div>
	
		<input type="button" id="button" value="Click to open the dialog">	
	
<!-- </div> --> 
	</div>
</div><!-- end row -->
     
@endsection





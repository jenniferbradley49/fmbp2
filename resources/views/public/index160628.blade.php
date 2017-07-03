@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
		$(document).ready(function() {
//			console.log('doc ready called');
//			$('#q1').hide();
//			$('#q2').hide();
//			$('#q1').show(2000);
			exec_jq_ajax_get('genre');

			$('input:radio[name=genre]').change(function(){
//			$('input:radio[name=genre]').change(function(){
				alert($('input:radio[name=genre]:checked').val());
				var item_name = "genre";
				var item_value = ($('#genre:checked').val());				
//				propagate_csrf_code();
//				exec_jq_ajax(item_name, item_value, 'q1', 'q2')
				exec_jq_ajax_get('schedule')
			}); // end on q1 change
			
		}); // end document ready function


	    function propagate_csrf_code()
	    {
	        var csrf_token = $("input[name=_token]").val();

	// laravel imposes csrf protection - the ajax setup 
	// sends the csrf token in the header to remove the 
	// 500 internal service error 
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': csrf_token
				}
			});
	    }     // end function propagate_csrf_code  

/*
		function exec_jq_ajax(item_name, item_value, q_current, q_next)
	    {
	        jQuery.ajax({
	            url: "/ajax/set_item",
	            type: "POST",
//	            async: false,
	            data: {   
	                "item_name":item_name,
	                "item_value":item_value,
					},
	            dataType : "json",
	            beforeSend: function () {
	                console.log('AJAX sent');
	            },               
	            success: function( data ) 
	            {
//		            data = JSON.parse(data);
		            console.log(data);
		            console.log(typeof(data));
		            console.log(data.response);
		            console.log(data['response']);
//		            if (data. == 1)
//		            {
	    				$('#' + q_current).hide();
	    				$('#' + q_next).show(2000);
//		            }
				},
	            error: function( xhr, status, errorThrown ) {
	                console.log("Ajax error");
	                console.log(errorThrown);
	            }
	        });  // end jquery ajax						
	    
	    }  // end funtion exec_jq_ajax
*/

		function exec_jq_ajax_get(question_name)
	    {
//		    console.log('exec jq ajax get called');
	        jQuery.ajax({
	            url: "/ajax/get_question",
	            type: "POST",
//	            async: false,
	            data: {   
	                "question_name":question_name,
//	                "item_value":item_value,
					},
	            dataType : "html",
	            beforeSend: function () {
	                console.log('AJAX sent');
	            },               
	            success: function( data ) 
	            {
//		            data = JSON.parse(data);
//		            console.log(data);
//		            console.log(typeof(data));
//		            console.log(data.response);
//		            console.log(data['response']);
//		            if (data. == 1)
//		            {
	    				$('#survey').html(data);
//	    				$('#' + q_next).show(2000);
//		            }
				},
	            error: function( xhr, status, errorThrown ) {
	                console.log("Ajax error");
	                console.log(errorThrown);
	            }
	        });  // end jquery ajax						
	    
	    }  // end funtion exec_jq_ajax
	    
	    </script>

@endsection

@section('content')
<!-- /app/resources/views/public/index.blade.php -->
    
 
<div class="row">
	<div class="col-lg-6"> <!-- begin left side column -->
<!--   	<div class="bs-component">
-->
		<div id="survey">
		</div>
		<div id="q1">
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{!! Form::label('q1', 'Art') !!}</div>
				<div class="col-lg-1">{!! Form::radio('q1', '101') !!}</div>
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-3">{!! Form::label('q1', 'Biography / Memoir') !!}</div>
				<div class="col-lg-1">{!! Form::radio('q1', '102') !!}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{!! Form::label('q12', 'Business') !!}</div>
				<div class="col-lg-1">{!! Form::radio('q12', '103') !!}</div>
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-3">{!! Form::label('q12', "Children's book") !!}</div>
				<div class="col-lg-1">{!! Form::radio('q12', '104') !!}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->			
		</div><!-- end div id=q1 -->

		
		<div id="q2">
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-9">{!! Form::label('q2', 'I am ready to publish today') !!}</div>
				<div class="col-lg-1">{!! Form::radio('q2', '101') !!}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-9">{!! Form::label('q2', 'I will be ready in 1-3 months') !!}</div>
				<div class="col-lg-1">{!! Form::radio('q2', '102') !!}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-9">{!! Form::label('q2', 'I do not have a manuscript') !!}</div>
				<div class="col-lg-1">{!! Form::radio('q2', '110') !!}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
		</div><!-- end div id=q2 -->

	
	
	
<!-- </div> --> 
	</div> <!-- end left side column -->
	<div class="col-lg-6"> right side, level 1
	</div>
</div><!-- end row -->
     
@endsection





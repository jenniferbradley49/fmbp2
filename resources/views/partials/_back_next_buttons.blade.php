
<!-- /app/resources/views/partials/_back_next_buttons.blade.php -->
				
		<!-- next and back buttons -->
			<div class="row">		
				<div class="col-lg-6" style="text-align:center">
					@if (!$data['survey_question']->bool_first)
						<input type='button' id='show_{{$data["survey_question"]->str_name}}_prev'  class="btn btn-md btn-primary-filled btn-rounded" value='Back'>
					@else
						&nbsp;
					@endif
				</div>
				<div class="col-lg-6" style="text-align:center">
				
					@if (!$data['survey_question']->bool_last)
						<input type='button' id='show_{{$data["survey_question"]->str_name}}_next' class="btn btn-md btn-primary-filled btn-rounded" value='Next'>
					@else
						&nbsp;
					@endif
				</div>
			</div><!-- end row, level 2 -->
		





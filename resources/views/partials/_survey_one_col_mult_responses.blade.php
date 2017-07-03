
<!-- /app/resources/views/partial/_survey_one_col_mult_responses.blade.php -->
	@include('partials._survey_heading')

			<div class="row">		
				<div class="col-lg-12" style="text-align:center">
					<br>For this question, please all appropriate responses, then click next
					<br><br>
				</div>
			</div><!-- end row, level 2 -->
	
	@foreach ($data['arr_content'] as $row)

			<div class="row">		
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-5">{{ Form::label($row['str_form_code'], $row['str_text']) }}</div>
				<div class="col-lg-3">{{ Form::checkbox($row['str_form_code'], $row['id']) }}</div>
				<div class="col-lg-2">&nbsp;</div>
			</div><!-- end row, level 2 -->
		@endforeach
		
		@include('partials._error_message')
		@include('partials._back_next_buttons')
		
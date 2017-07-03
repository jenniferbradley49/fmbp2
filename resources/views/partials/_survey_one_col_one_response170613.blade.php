
<!-- /app/resources/views/ajax/genre.blade.php -->
	@include('partials._survey_heading')


	@foreach ($data['arr_content'] as $row)

			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>

				<div class="col-lg-9">{{ Form::label($data['survey_question']->str_name, $row['str_text']) }}</div>
				
				<div class="col-lg-1">{{ Form::radio($data['survey_question']->str_name, $row['id'], false, ['class' => $data['survey_question']->str_name]) }}</div>
				
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
		@endforeach

		@include('partials._error_message')
		@include('partials._back_next_buttons')
		



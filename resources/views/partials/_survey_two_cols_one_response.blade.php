
<!-- /app/resources/views/partials/_survey_two_cols_one_response.blade.php -->
	@include('partials._survey_heading')

	@foreach ($data['arr_two_cols'] as $row)

			<div class="row">		
				<div class="col-lg-5">{{ Form::label($data['survey_question']->str_name, $row['first']['str_text']) }}</div>
				<div class="col-lg-1">{{ Form::radio($data['survey_question']->str_name, $row['first']['id'], false, ['class' => 'genre']) }}</div>
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-4">{{ Form::label($data['survey_question']->str_name, $row['second']['str_text']) }}</div>
				<div class="col-lg-1">{{ Form::radio($data['survey_question']->str_name, $row['second']['id'], false, ['class' => 'genre']) }}</div>
			</div><!-- end row, level 2 -->
		@endforeach
		
		@include('partials._error_message')
		@include('partials._back_next_buttons')
		


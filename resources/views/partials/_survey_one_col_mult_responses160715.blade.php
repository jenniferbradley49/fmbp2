
<!-- /app/resources/views/ajax/genre.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center">{{$data['str_text']}}</div>
			</div><!-- end row, level 2 -->

	@foreach ($data['arr_content'] as $row)

			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-9">{{ Form::label($data['survey_question']->str_name, $row['str_text']) }}</div>
				<div class="col-lg-1">{{ Form::checkbox($data['survey_question']->str_name, $row['id']) }}</div>
				<div class="col-lg-1">&nbsp;xzc</div>
			</div><!-- end row, level 2 -->
		@endforeach
		
		@include('partials._error_message')
		@include('partials._back_next_buttons')
		
		
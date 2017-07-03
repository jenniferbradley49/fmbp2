
<!-- /app/resources/views/ajax/genre.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center">{{$data['survey_question']->str_text}}</div>
			</div><!-- end row, level 2 -->

	@foreach ($data['arr_two_cols'] as $row)
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label($data['survey_question']->str_name, $row['first']['str_text']) }}</div>
				<div class="col-lg-1">{{ Form::radio($data['survey_question']->str_name, $row['first']['id'], false, ['class' => 'genre']) }}</div>
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label($data['survey_question']->str_name, $row['second']['str_text']) }}</div>
				<div class="col-lg-1">{{ Form::radio($data['survey_question']->str_name, $row['second']['id'], false, ['class' => 'genre']) }}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
		@endforeach





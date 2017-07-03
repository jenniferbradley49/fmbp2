
<!-- /app/resources/views/ajax/genre.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center">{{$data['question_text']}}</div>
			</div><!-- end row, level 2 -->

	@foreach ($data['arr_content'] as $row)
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-9">{{ Form::label($row['survey_question_id'], $row['str_text']) }}</div>
				<div class="col-lg-1">{{ Form::radio($row['survey_question_id'], $row['id']) }}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
		@endforeach





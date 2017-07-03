
<!-- /app/resources/views/ajax/genre.blade.php -->
    @foreach ($data['arr_two_cols'] as $row)
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{!! Form::label($row['first']['survey_question_id'], $row['first']['str_text']) !!}</div>
				<div class="col-lg-1">{!! Form::radio($row['first']['survey_question_id'], $row['first']['id']) !!}</div>
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-3">{!! Form::label($row['second']['survey_question_id'], $row['second']['str_text']) !!}</div>
				<div class="col-lg-1">{!! Form::radio($row['second']['survey_question_id'], $row['second']['id']) !!}</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
		@endforeach





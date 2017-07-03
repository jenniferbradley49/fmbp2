
<!-- /app/resources/views/ajax/genre.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center">{{$data['str_text']}}</div>
			</div><!-- end row, level 2 -->

	@foreach ($data['arr_content'] as $row)

			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>

  
				<div class="col-lg-9">{{ Form::label($data['survey_question']->str_name, $row['str_text']) }}<div>
				<div class="col-lg-1">{{ Form::radio($data['survey_question']->str_name, $row['id'], false, ['class' => 'schedule']) }}</div>
								
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
		@endforeach
		<!-- next and back buttons -->
			<div class="row">		
				<div class="col-lg-6" style="text-align:center">
					@if (!$data['survey_question']->bool_first)
						<input type='button' id='show_{{$data["survey_question"]->str_name}}_prev' value='Back'>
					@else
						&nbsp;
					@endif
				</div>
				<div class="col-lg-6" style="text-align:center">
					@if (!$data['survey_question']->bool_last)
						<input type='button' id='show_{{$data["survey_question"]->str_next}}_next' value='Next'>
					@else
						&nbsp;
					@endif
				</div>
			</div><!-- end row, level 2 -->
		
		




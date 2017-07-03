
<!-- /app/resources/views/partials/_survey_author_info.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center">{{$data['survey_question']->str_text}}</div>
			</div><!-- end row, level 2 -->

<!-- start salutation -->
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label('salutation', 'Salutation') }}</div>

<!--				<div class="col-lg-7">{{ Form::select('str_salutation', array('Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.')) }}</div>
-->
				<div class="col-lg-7">{{ Form::select('int_salutation_id', $data['arr_salutations']) }}</div>
				
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
<!-- end salutation -->

<!-- start first name -->			
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label('str_first_name', 'First name') }}</div>
				<div class="col-lg-7">{{ Form::text('str_first_name', $data['input_old']['str_first_name'], array('class' => "form-control", 'id' => 'str_first_name', 'placeholder' => 'first name')) }}                    
				</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
<!-- end first name -->

<!-- start last name -->			
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label('str_last_name', 'Last name') }}</div>
				<div class="col-lg-7">{{ Form::text('str_last_name', $data['input_old']['str_last_name'], array('class' => "form-control", 'id' => 'str_last_name', 'placeholder' => 'last name')) }}                    
				</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
<!-- end last name -->

<!-- start email -->			
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label('str_email', 'Email') }}</div>
				<div class="col-lg-7">{{ Form::text('str_email', $data['input_old']['str_email'], array('class' => "IsEmail form-control", 'id' => 'email', 'placeholder' => 'email')) }}                    
				</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
<!-- end email -->
			
			
<!-- start telephone -->			
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3">{{ Form::label('str_telephone_ac', 'Telephone') }}</div>
				<div class="col-lg-7">({{ Form::text('str_telephone_ac', $data['input_old']['str_telephone_ac'], array('class' => 'IsInteger', 'maxlength' => '3', 'size' => '7', 'id' => 'str_telephone_ac', 'placeholder' => 'area code')) }})
				{{ Form::text('str_telephone_two', $data['input_old']['str_telephone_two'], array('class' => 'IsInteger', 'maxlength' => '3', 'size' => '3', 'id' => 'str_telephone_two', 'placeholder' => 'first 3')) }}                    
				-{{ Form::text('str_telephone_three', $data['input_old']['str_telephone_three'], array('class' => 'IsInteger', 'maxlength' => '4', 'size' => '4', 'id' => 'str_telephone_three', 'placeholder' => 'last 4')) }}                    
				</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
<!-- end telephone -->

			@include('partials._error_message')
						
			@include('partials._back_next_buttons')
			



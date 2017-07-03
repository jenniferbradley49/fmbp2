@extends('layouts.master_admin')

@section('title', 'Edit client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/test_client.blade.php -->
	
	  
<div class="row">
<div class="col-sm-3"><br><br><br><br><br><br> </div>
<div class="col-sm-6"> 
{{ $data['page_heading_content'] }}
    </div>
<div class="col-sm-3"> </div>
</div><!-- end row -->


  		
  		
	<!-- headers for test post table -->					                                 
  	        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-3">
              	<label for="str_lead_destination_tested">lead dest tested</label>
            </div>
            <div class="col-lg-2">
             	test id                                        		
            </div>
             <div class="col-lg-5">
             	creation date/time                                       		
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
 <!-- loop for whole test_post table -->   
   @foreach ($data['test_post'] as $line)                
  		
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-3">
 				{{ $line['str_lead_destination_tested'] }}            
 			</div>
       		<div class="col-lg-2">
 				{{ $line['str_test_id'] }}            
 			</div>
       		<div class="col-lg-5">
 				{{ $line['created_at'] }}            
 			</div>
 			<div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
  @endforeach                
  		
  		
  		
              
 <!--                     
                  <div class="form-group">
                    <label for="recaptcha" class="col-lg-2 control-label">Captcha required</label>
                    <div class="col-lg-10">
						<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>
						
					</div>
-->                                               
<!--            </div>
          </div>                 
        </div>
-->
@endsection	
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Survey_item;
use App\Models\State;
use App\Models\Salutation;
use Html;
use Illuminate\Support\Facades\Input;
use Mail;
/**************************************
 * order
 * 1. validation / conform
 * 2. get request
 * 3. get data array
 * 4. other functions, alphabetical
 * 
 * 
 */
class PublicForm extends Model
{
	
	var $adminEmail = '@yahoo.com';
	var $contactSubject = 'message from contact page';

	public function getValidationRulesSignUp()
	{
		return array(
				'first_name' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
				//				'first_name' => 'required|max:50|alpha_dash_spaces',
				'last_name' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
				'company' => 'max:50|regex:/^[\pL\s\-]+$/u',
				'client_url' => 'required',
				'email' => 'required|email|max:50|unique:users',
				'password' => 'required|confirmed|max:50|min:6|alpha_num'
		);
	}
	
	public function getCustomMessages()
	{
		return array('regex' => 'The :attribute field can only contain letters or spaces');
	}
	
	
	
	public function getValidationRulesContact()
	{
		return array(
				'first_name' => 'max:50|regex:/^[\pL\s\-]+$/u',
				//			'first_name' => 'max:50|alpha_dash_spaces',
				'last_name' => 'max:50|regex:/^[\pL\s\-]+$/u',
				'telephone' => 'max:100000000000000|integer',
				'message' => 'required|max:2000|regex:/^[a-zA-Z0-9\s\-]+$/u',
				//'g-recaptcha-response'  => 'required',
				'email' => 'required|email|max:50'
		);
	}
	
	public function manuallyConformIndex(
			Salutation $salutation, 
			State $state, 
			Survey_question $survey_question, 
			$arr_request
			)
	{
		// limit text to permitted characteres
		$arr_request['str_email'] = $this->conformEmail($arr_request['str_email']);
		$arr_request['str_first_name'] = $this->conformText($arr_request['str_first_name']);
		$arr_request['str_last_name'] = $this->conformText($arr_request['str_last_name']);
		$arr_request['str_address_one'] = $this->conformText($arr_request['str_address_one']);
		$arr_request['str_address_two'] = $this->conformText($arr_request['str_address_two']);
		$arr_request['str_city'] = $this->conformText($arr_request['str_city']);
		$arr_request['str_zip'] = $this->conformText($arr_request['str_zip']);
// limit to string representation of integer or zero + integer
		$arr_request['str_telephone_ac'] = $this->conformTelephoneOneTwo($arr_request['str_telephone_ac']);
		$arr_request['str_telephone_two'] = $this->conformTelephoneOneTwo($arr_request['str_telephone_two']);
		$arr_request['str_telephone_three'] = $this->conformTelephoneThree($arr_request['str_telephone_three']);
// limit ID to integer in the approporate table
		$arr_request['int_salutation_id'] = $this->conformSalutationID($salutation, $arr_request['int_salutation_id']);
		$arr_request['int_state_id'] = $this->conformStateID($state, $arr_request['int_state_id']);
		$arr_request['int_genre'] = $this->conformID($survey_question, $arr_request['int_genre'], 'genre');
		$arr_request['int_schedule'] = $this->conformID($survey_question, $arr_request['int_schedule'], 'schedule');
		$arr_request['int_contact_time'] = $this->conformID($survey_question, $arr_request['int_contact_time'], 'contact_time');
		$arr_request['int_age'] = $this->conformID($survey_question, $arr_request['int_age'], 'age');
//		$arr_request['genre'] = $this->conformID($arr_request['genre'], 'genre');
//		$arr_request['genre'] = $this->conformID($arr_request['genre'], 'genre');
		
// conform checkbox to database row
		$arr_request['int_format_mw'] = $this->conformID($survey_question, $arr_request['int_format_mw'], 'format');
		$arr_request['int_format_hw'] = $this->conformID($survey_question, $arr_request['int_format_hw'], 'format');
		$arr_request['int_format_tw'] = $this->conformID($survey_question, $arr_request['int_format_tw'], 'format');
		$arr_request['int_format_mo'] = $this->conformID($survey_question, $arr_request['int_format_mo'], 'format');
		$arr_request['int_format_pd'] = $this->conformID($survey_question, $arr_request['int_format_pd'], 'format');
		//		$arr_request['int_format_mw'] = $this->conformCheckbox($arr_request['int_format_mw']);
//		$arr_request['int_format_hw'] = $this->conformCheckbox($arr_request['bool_format_hw']);
//		$arr_request['int_format_tw'] = $this->conformCheckbox($arr_request['bool_format_tw']);
//		$arr_request['int_format_mo'] = $this->conformCheckbox($arr_request['bool_format_mo']);	
		return $arr_request;	
	}

	public function getRequestArrayIndex($request)
	{
		// this function need maintenance every time survey questions
		// or survey items are changed
		// populate all format responses
		$arr_request['int_format_mw'] = (empty($request->format_mw))?0:$request->format_mw;
		$arr_request['int_format_hw'] = (empty($request->format_hw))?0:$request->format_hw;
		$arr_request['int_format_tw'] = (empty($request->format_tw))?0:$request->format_tw;
		$arr_request['int_format_mo'] = (empty($request->format_mo))?0:$request->format_mo;		
		$arr_request['int_format_pd'] = (empty($request->format_pd))?0:$request->format_pd;		
		$arr_request['int_genre'] = (empty($request->genre))?0:$request->genre;
    	$arr_request['int_schedule'] = (empty($request->schedule))?0:$request->schedule;
    	$arr_request['int_contact_time'] = (empty($request->contact_time))?0:$request->contact_time;
    	$arr_request['int_age'] = (empty($request->age))?0:$request->age;

    	$arr_request['int_salutation_id'] = (empty($request->int_salutation_id))?0:$request->int_salutation_id;
		$arr_request['str_first_name'] = (empty($request->str_first_name))?'not offered':$request->str_first_name;
		$arr_request['str_last_name'] = (empty($request->str_last_name))?'not offered':$request->str_last_name;
		$arr_request['str_telephone_ac'] = (empty($request->str_telephone_ac))?'111':$request->str_telephone_ac;
		$arr_request['str_telephone_two'] = (empty($request->str_telephone_two))?'111':$request->str_telephone_two;
		$arr_request['str_telephone_three'] = (empty($request->str_telephone_three))?'1111':$request->str_telephone_three;
		$arr_request['str_email']    = $request->str_email;
		$arr_request['str_address_one'] = (empty($request->str_address_one))?'not offered':$request->str_address_one;
		$arr_request['str_address_two'] = (empty($request->str_address_two))?'not offered':$request->str_address_two;
		$arr_request['str_city'] = (empty($request->str_city))?'not offered':$request->str_city;
		$arr_request['int_state_id'] = (empty($request->int_state_id))?0:$request->int_state_id;
		$arr_request['str_zip'] = (empty($request->str_zip))?'not offered':$request->str_zip;
		return $arr_request;
	}
	

	public function getRequestArraySignUp($request)
	{
		return array(
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'company' => $request->company,
				'client_url' => $request->client_url,
				'email'    => $request->email,
				'password' => \Hash::make($request->password)
		);
	}
	
	public function getRequestArrayContact($request)
	{
		return array(
				'first_name' => (empty($request->first_name))?'not offered':$request->first_name,
				'last_name' => (empty($request->last_name))?'not offered':$request->last_name,
				'telephone' => (empty($request->telephone))?'not offered':$request->telephone,
				'message' => $request->message,
				'email'    => $request->email
		);
	}

	public function getDataArrayGetSignUp()
	{
		return array(
				'input_old' =>array(
						'first_name' => Input::old('first_name'),
						'last_name' => Input::old('last_name'),
						'company' => Input::old('company'),
						'client_url' => Input::old('client_url'),
						'email' => Input::old('email'),
				)
				//    			'navbar_right' => $navbar_right
	
	
		);
	}
	
	
	public function getDataArrayGetContact()
	{
		return array(
				'input_old' =>array(
						'first_name' => Input::old('first_name'),
						'last_name' => Input::old('last_name'),
						'company' => Input::old('company'),
						'message' => Input::old('message'),
						'email' => Input::old('email'),
						'telephone' => Input::old('telephone'),
				)
				//   			'navbar_right' => $navbar_right
	
		);
	}
	
	
	
	public function getDataArrayPostSignUp(
			$arr_request, $user_id,
			$cloaked_client_id,
			$bool_role_assigned
			//   		$navbar_right
	)
	{
		// hide password
		$arr_request['password'] = "*********";
		return array(
				'arr_request' => $arr_request,
				'user_id' => $user_id,
				'cloaked_client_id' => $cloaked_client_id,
				'bool_role_assigned' => $bool_role_assigned
				//  			'navbar_right' => $navbar_right
				 
		);
	}
	
	
	public function getDataArrayPostContact(
			$arr_request)
	{
		return array('arr_request' => $arr_request
				//  			'navbar_right' => $navbar_right
		);
	}
	
	
    public function getDataArrayGetIndexPage($page_heading_content, 
    		$dataGenre, $dataSchedule, $dataFormat, $dataContactTime, $dataAge,
    		$dataAuthorInfo, $dataAuthorInfoTwo)
    {
    	$data = array();
    	$data['page_heading_content'] = $page_heading_content;
    	$data['dataGenre'] = $dataGenre;
    	$data['dataSchedule'] = $dataSchedule;
    	$data['dataFormat'] = $dataFormat;
    	$data['dataContactTime'] = $dataContactTime;
    	$data['dataAge'] = $dataAge;
    	$data['dataAuthorInfo'] = $dataAuthorInfo;
    	$data['dataAuthorInfoTwo'] = $dataAuthorInfoTwo;
    	 
    	return $data;
    }

    public function getDataArrayGetPubhelp(
    		$page_heading_content,
    		$arr_results,
    		$arr_salutations,
    		$arr_states)
    {
    	$data = array();
    	$data['page_heading_content'] = $page_heading_content;
 //   	$data['arr_results'] = $arr_results'[;
    	$data['dataGenre'] = $arr_results['genre'];
    	$data['dataSchedule'] = $arr_results['schedule'];
    	$data['dataFormat'] = $arr_results['format'];
    	$data['dataContactTime'] = $arr_results['contact_time'];
    	$data['dataAge'] = $arr_results['age'];
    	$data['dataAuthorInfo'] = $arr_results['dataAuthorInfo'];
    	$data['arr_salutations'] = $arr_salutations;
    	 
//    	echo "publicForm, line 125<br>";
//    	echo "<pre>";
//    	print_r($data['dataAuthorInfo']);
 //   	echo "</pre>";
    	$data['dataAuthorInfoTwo'] = $arr_results['dataAuthorInfoTwo'];
    
    	return $data;
    }
    
    
    public function getDataArrayGetAuthorInfo($arr_data, $arr_salutations)
    {
    	$arr_data['arr_salutations'] = $arr_salutations;
    	$arr_data['input_old'] =     array(
    		'str_first_name' => 	Input::old('str_first_name'),
    		'str_last_name' => 		Input::old('str_last_name'),
    		'str_email' => 			Input::old('str_email'),
    		'str_telephone_ac' => 	Input::old('str_telephone_ac'),
    		'str_telephone_two' => 	Input::old('str_telephone_two'),
    		'str_telephone_three' => Input::old('str_telephone_three'),  			
    	);
    	return $arr_data;
    }

    public function getDataArrayGetAuthorInfoTwo($arr_data, $arr_states)
    {
    	$arr_data['arr_states'] = $arr_states;
    	$arr_data['input_old'] =     array(
    			'str_address_one' => 	Input::old('str_address_one'),
    			'str_address_two' => 	Input::old('str_address_two'),
    			'str_city' => 			Input::old('str_city'),
    			'int_state_id' => 		Input::old('int_state_id', 0),
    			'str_zip' => 			Input::old('str_zip'),
    	);
    	return $arr_data;
    }
    
    
    
    
    public function getDataArrayGetQuestionTwoCols($survey_question, $arr_two_cols)
    {
    	$arr_data = array();
    	$arr_data['survey_question'] = $survey_question;
    	$arr_data['str_text'] = $survey_question->str_text;
    	$arr_data['arr_two_cols'] = $arr_two_cols;
    	return $arr_data;
    }
    
    public function getDataArrayGetQuestionOneCol($survey_question, $arr_content)
    {
    	$arr_data = array();
    	$arr_data['survey_question'] = $survey_question;
    	$arr_data['str_text'] = $survey_question->str_text;
       	$arr_data['arr_content'] = $arr_content;
    	return $arr_data;
    }

    public function getDataArrayGetQuestionOneColMultResp($survey_question, $arr_content)
    {
    	$arr_data = array();
    	$arr_data['survey_question'] = $survey_question;
    	$arr_data['str_text'] = $survey_question->str_text;
//    	$arr_data['str_form_code'] = $survey_question->str_form_code;
    	$arr_data['arr_content'] = $arr_content;
    	return $arr_data;
    }
    
    // begin non categorized functions , alphabetical
    
    public function cleanRequestArray($arr_request)
    {
    	unset($arr_request['int_genre']);
    	unset($arr_request['int_schedule']);
    	unset($arr_request['int_contact_time']);
    	unset($arr_request['int_age']);
    	unset($arr_request['int_salutation_id']);
    	unset($arr_request['int_state_id']);
    	unset($arr_request['str_telephone_ac']);   
    	unset($arr_request['str_telephone_two']);   
    	unset($arr_request['str_telephone_three']);   
    	unset($arr_request['int_format_mw']);
    	unset($arr_request['int_format_tw']);
    	unset($arr_request['int_format_hw']);
    	unset($arr_request['int_format_mo']);
    	unset($arr_request['int_format_pd']);   
    	return $arr_request;
    }

    
    public function conformCheckbox($checkboxVal)
    {
    	$checkboxVal = (int)$checkboxVal;
    	return ($checkboxVal == 1)?1:0;
    }

    public function conformEmail($email)
    {
    	return (filter_var($email, FILTER_VALIDATE_EMAIL))?$email:'invalid@format_email.com';
    }

    public function conformID(Survey_question $survey_question, $id, $str_name)
    {
    	$id = (int)$id;
    	if (is_null($id))
    		return 0;
		$result = $survey_question
					->where('str_name', $str_name)
					->first()
					->survey_items()
					->find($id);
		return (is_null($result))?0:$id;
    }
    
    public function conformTelephoneOneTwo($partialTelephoneVal)
    {
    	return (is_null((int)$partialTelephoneVal))?'111':$partialTelephoneVal;
    }

    public function conformTelephoneThree($partialTelephoneVal)
    {
    	return (is_null((int)$partialTelephoneVal))?'1111':$partialTelephoneVal;
    }

    public function conformText($text)
    {
    	return preg_replace('/[^a-zA-Z0-9._\- ]/', '', $text);
    }
    
    
    public function conformSalutationID(Salutation $salutation, $id)
    {
    	$id = (int)$id;
    	if (is_null($id))
    		return 0;
    	if (!is_int($id))
    		return 0;
    	$salutation = $salutation->find($id);
    	if (is_null($salutation))
    		return 0;
    	else return $id;
    }
    
    
    public function conformStateID(State $state, $id)
    {
    	$id = (int)$id;
    	if (is_null($id))
    		return 0;
    	if (!is_int($id))
    		return 0;
    	$state = $state->find($id);
    	if (is_null($state))
    		return 0;
    	else return $id;
    }
    
    
    public function convert_survey_items_obj_to_array($survey_items)
    {
    	// convert to formatted array
    	$arr_items = array();
    	foreach($survey_items as $item)
    	{
    		if ($item->bool_include)
    		{
    			$temp = array();
    		//	foreach($item as $key => $val)
    		//	{
    			//	$temp[$key] = $val;
     			$temp['str_form_code'] = $item->str_mult_resps_id;
    			$temp['str_text'] = $item->str_text;
    			$temp['survey_question_id'] = $item->survey_question_id;
    			$temp['id'] = $item->id;
    		//	}
//echo "<pre>";
//print_r($temp);
//echo "</pre>";
    			$arr_items[] = $temp;
    		}
    	}
    	return $arr_items;
    	 
    }



    public function make_readable(
    		Salutation $salutation, 
    		State $state, 
    		Survey_item $survey_item, 
    		$arr_request)
    {
    	// this function needs to be manually adjusted with every change in survey question and survey items
    	// particularly when changing a multiple response item
    	// get genre
    	$obj_survey_item = $survey_item->find($arr_request['int_genre']);
    	$arr_request['str_genre'] = $obj_survey_item->str_text;
    	 
    	// get schedule
    	$obj_survey_item = $survey_item->find($arr_request['int_schedule']);
    	$arr_request['str_schedule'] = $obj_survey_item->str_text;

    	$obj_survey_item = $survey_item->find($arr_request['int_contact_time']);
    	$arr_request['str_contact_time'] = ($obj_survey_item == null)?'not offered':$obj_survey_item->str_text;
    	
    	$obj_survey_item = $survey_item->find($arr_request['int_age']);
    	$arr_request['str_age'] = ($obj_survey_item == null)?'not offered':$obj_survey_item->str_text;
    	 
    
    	// get formats
    	$arr_formats['int_format_mw'] = $arr_request['int_format_mw'];
    	$arr_formats['int_format_hw'] = $arr_request['int_format_hw'];
    	$arr_formats['int_format_tw'] = $arr_request['int_format_tw'];
    	$arr_formats['int_format_mo'] = $arr_request['int_format_mo'];
    	$arr_formats['int_format_pd'] = $arr_request['int_format_pd'];
    	// get human readable text associated with ID
    	$arr_formats_results = array();
    	foreach ($arr_formats as $int_format)
    	{
    		if ($int_format) // exclude boxes not checked
    		{
    			$obj_survey_item = $survey_item->find($int_format);
    			$arr_formats_results[] = $obj_survey_item->str_text;
    		}
    	}
    	// implode to one string
    	$arr_request['str_formats'] = implode(', ', $arr_formats_results);
    	 
    	$salutation = $salutation->find($arr_request['int_salutation_id']);
    	$arr_request['str_salutation'] = $salutation->str_text;

    	$state = $state->find($arr_request['int_state_id']);
    	$arr_request['str_state'] = $state->str_text;
    	
    	$arr_request['str_telephone'] = '('.$arr_request['str_telephone_ac'].') ';
    	$arr_request['str_telephone'] .= $arr_request['str_telephone_two'].'-'.$arr_request['str_telephone_three'];
		return $arr_request;
    }
    
    
    public function prepare_question_data(Survey_question $survey_question, $str_question)
    {
    	$survey_question = $survey_question
    	->where('str_name', $str_question)
    	->first();
    	 
    	$survey_items = $survey_question->survey_items;
    
    	$arr_items = $this->convert_survey_items_obj_to_array($survey_items);
    
    	if ($survey_question->bool_two_columns)
    	{
    		$arr_two_cols = $this->reorganize_items_to_two_cols($arr_items);
    		$dataQuestion = $this->getDataArrayGetQuestionTwoCols($survey_question, $arr_two_cols);
    	} // if bool two cols
    	else
    	{
    		$dataQuestion = $this->getDataArrayGetQuestionOneCol($survey_question, $arr_items);
    	}
    	$dataQuestion = array_merge($dataQuestion, array('str_question' => $str_question));
    	return $dataQuestion;
    }
    
    
    
    
    public function reorganize_items_to_two_cols($arr_items)
    {
    	$arr_two_cols = array();
    	$int_arr_items_length = count($arr_items);
    	$mod_two_arr_items_length = $int_arr_items_length % 2;
    	$int_row = 0;
    	$bool_first = 1;
    	$int_rows_required = ($int_arr_items_length / 2) + $mod_two_arr_items_length;
    	 
    	for ($i = 0; $i < $int_arr_items_length; $i++)
    	{
    		if ($bool_first)
    		{
    			$arr_two_cols[$int_row]['first'] = $arr_items[$i];
    			$int_row ++;
    			if ($int_row >= $int_rows_required)
    			{
    			$bool_first = 0;
    			$int_row = 0;
    			}
    				 
    		}
    		else
    		{
    			$arr_two_cols[$int_row]['second'] = $arr_items[$i];
    			$int_row ++;
    				 
    		}
    	}
    	return $arr_two_cols;
    	  	
    } // end function reorganize items to two cols


/* already presented above    
    public function prepare_question_data(Survey_question $survey_question, $str_question)
    {
    	$survey_question = $survey_question
    	->where('str_name', $str_question)
    	->first();
    	
    	$survey_items = $survey_question->survey_items;
    	 
    	$arr_items = $this->convert_survey_items_obj_to_array($survey_items);
    	 
    	if ($survey_question->bool_two_columns)
    	{
    		$arr_two_cols = $this->reorganize_items_to_two_cols($arr_items);
    		$dataQuestion = $this->getDataArrayGetQuestionTwoCols($survey_question, $arr_two_cols);
    	} // if bool two cols
    	else
    	{
    		$dataQuestion = $this->getDataArrayGetQuestionOneCol($survey_question, $arr_items);
    	}
    	$dataQuestion = array_merge($dataQuestion, array('str_question' => $str_question));
    	return $dataQuestion;    	 
    }
*/
    

    public function boolSendMail($which, $data, $sender, $recipient, $subject)
    {
    	$arr_params = array(
    			'sender' => $sender,
    			'recipient' => $recipient,
    			'subject' => $subject
    	);
    	$obj_params = (object) $arr_params;
    	$response = Mail::send('emails/'.$which, $data, function ($m) use ($obj_params) {
    		$m->from($obj_params->sender);
    		$m->to($obj_params->recipient);
    		$m->subject($obj_params->subject);
    	});
    
    		return (count(Mail::failures() == 0));
    }
    
    
}

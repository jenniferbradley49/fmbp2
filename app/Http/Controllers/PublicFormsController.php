<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Survey_question;
use App\Models\Survey_project;
use App\Models\Registration;
use App\Models\PublicForm;
use App\Models\PublicPages;
use App\Models\Client;
use App\Models\Client_registration;
use App\Models\Role_user;
use App\Models\Role;
use App\Models\Salutation;
use App\Models\State;
use App\Models\Survey_item;
use App\Classes\CommonCode;
use App\Traits\CaptchaTrait;
use App\User;

class PublicFormsController extends Controller
{
	use CaptchaTrait;
	public function getSignUp(PublicForm $publicForms, PublicPages $publicPages)
	{
		$dataForm = $publicForms->getDataArrayGetSignUp();
		$page_heading_content = "Get an account";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/sign_up')->with('data', $data);
	}

	
	public function getContact(PublicForm $publicForms, PublicPages $publicPages)
	{
		$dataForm = $publicForms->getDataArrayGetContact();
		$page_heading_content = "Contact Us";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/contact')->with('data', $data);
	}
	

	public function getMessage(PublicForm $publicForms, PublicPages $publicPages)
	{
		$dataForm = $publicForms->getDataArrayGetMessage();
		$page_heading_content = "Message for publishers";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/message')->with('data', $data);
	}
	
	
	public function getTestRecaptcha(PublicForms $publicForms, PublicPages $publicPages)
	{
		$dataForm = $publicForms->getDataArrayGetContact();
		$page_heading_content = "Test recaptchax";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/test_recaptcha')->with('data', $data);
	}
	
	
	
    public function index(
    		Request $request,
    		PublicForm $publicForm,
    		Survey_question $survey_question,
    		Salutation $salutation,
    		State $state
    		)
    {
    	
    	$page_heading_content = "Welcome";
    	$data = $publicForm -> assembleDataGetIndex(
    				1,  // which page / text to display
    				$page_heading_content,
    				$survey_question, 
    				$salutation, 
    				$state
    			);
		return view('public/index')->with('data', $data);
    }
    

	
    public function index_test(
    		Request $request,
    		PublicForm $publicForm,
    		Survey_question $survey_question,
    		Salutation $salutation,
    		State $state
    		)
    {
    	
    	$page_heading_content = "Welcome";
    	$data = $publicForm -> assembleDataGetIndex(
    				1,  // which page / text to display
    				$page_heading_content,
    				$survey_question, 
    				$salutation, 
    				$state
    			);
		return view('public/index_test_170620')->with('data', $data);
    }
    

    public function getLandingPage(
    		Request $request,
    		PublicForm $publicForm,
    		Survey_question $survey_question,
    		Salutation $salutation,
    		State $state
    )
    { 
    	$int_which = $publicForm->validateLandingPage($request->int_which);    	   	 
    	$page_heading_content = "Welcome";
    	$data = $publicForm -> assembleDataGetIndex(
    			$int_which,  // which page / text to display
    			$page_heading_content,
    			$survey_question,
    			$salutation,
    			$state
    	);
    	return view('public/index')->with('data', $data);
    }
    
    
    
    public function get_test_bootstrap()
    {
    	return view('public/test_bootstrap');//->with('data', $data);
    	 	
    }
    
    public function pubhelp(
    		Request $request,
    		PublicForm $publicForm,
    		//    		Ajax $ajax,
    		Survey_question $survey_question,
    		Survey_project $survey_project,
    		Salutation $salutation,
    		State $state
    )
    {
    	$page_heading_content = "Welcome";
    	$arr_salutations = $salutation->get_salutations();
    	$arr_states = $state->get_states();
		$arr_results = Array();
    	$obj_survey_project = $survey_project->where('str_text', 'pubhelp')->first();
    	
 //   	if ($obj_survey_project == null)
//    		echo "obj_survey_project is null<br>";
//    	else echo "obj_survey_project is not null<br>";
//    	echo "<pre>";
//    	print_r($obj_survey_project);
//    	echo "</pre>";
    	//    	echo "obj_survey_project-str_text = ".$obj_survey_project->str_text."<br>";
//		foreach ($obj_survey_project as $key => $val)
//		{
//			echo $key." = <br>";
//		}
    	$included_survey_questions = $obj_survey_project->survey_questions;
    	foreach ($included_survey_questions as $question)
    	{  		
    		$arr_results[$question->str_name] = $publicForm->prepare_question_data($survey_question, $question->str_name);
    	}
  //  	$dataGenre = $publicForm->prepare_question_data($survey_question, 'genre');
    //	echo "<pre>";
//    	print_r($arr_results);
    //	echo "</pre>";
//    	$dataSchedule = $publicForm->prepare_question_data($survey_question, 'schedule');
//    	$dataFormat = $publicForm->prepare_question_data($survey_question, 'format');
    	//echo "<pre>";
    	//print_r($dataFormat);
    	//echo "</pre>";
 //   	$dataContactTime = $publicForm->prepare_question_data($survey_question, 'contact_time');
 //   	$dataAge = $publicForm->prepare_question_data($survey_question, 'age');
  //  	$dataAuthorInfo = $publicForm->prepare_question_data($survey_question, 'author_info');
    	$arr_results['dataAuthorInfo'] = $publicForm->getDataArrayGetAuthorInfo($arr_results['author_info'], $arr_salutations);
  //  	$dataAuthorInfoTwo = $publicForm->prepare_question_data($survey_question, 'author_info_two');
		$arr_results['dataAuthorInfoTwo'] = $publicForm->getDataArrayGetAuthorInfoTwo($arr_results['author_info_two'], $arr_states);
    	$data = $publicForm->getDataArrayGetPubhelp(
    			$page_heading_content,
    			$arr_results,
    			$arr_salutations,
    			$arr_states);
    	return view('public/pubhelp')->with('data', $data);
    }


    public function postMessage(
    		Request $request,
    		PublicForm $publicForm,
    		Client $client,
    		Client_registration $client_registration,
    		Survey_project $survey_project,
    		Registration $registration,
    		State $state,
    		Salutation $salutation,
    		Survey_question $survey_question,
    		Survey_item $survey_item
    )
    {
    	$validation_rules = $publicForm->getValidationRulesMessage();
    	$validation_messages = $publicForm->getCustomMessagesMessage();
    	$this->validate($request, $validation_rules, $validation_messages);
    	$arr_request = $publicForm->getRequestArrayMessage($request);
		$arr_request['str_message'] = $publicForm->protect_input($arr_request['str_message']);
//    	$bool_accept = ($request->bool_accept == '1')?1:0;
    	if ($arr_request['bool_accept'])
    	{
   			$int_registration_id = session()->get('int_registration_id');
    		$obj_registration = $registration
    				->find($int_registration_id);
    				
    		$obj_registration->save_registration_data('str_message', $arr_request['str_message']);
    		$obj_registration->save_registration_data('bool_accept', $arr_request['bool_accept']);
    		$arr_registration_data = $obj_registration
    									->registration_data()
    									->get()
    									->toArray();
    										
//   echo "publicFormsController, line 183<br>"; 
 //   echo "<pre>";
//    print_r($arr_registration_data);
//    echo "</pre>";		
    		 										 			
    		$registration->record_registration(
    			$client, 
    			$client_registration,
    			$publicForm,
    			$arr_registration_data,  
    			$int_registration_id    			 
    			);
    			
 //  echo "publicformsController, line 385<br>"; 
//   echo "postIndex completed, going to view<br>";	
    		return view('public/message_results');//->with('data', $data);    	 
    	}
    	else 
    	{
    		return view('pubic/no_accept_results');
    	}
    }
    
    public function postSignUp(
    		Request $request,
    		PublicForm $publicForms,
    		User $user,
    		CommonCode $cCode,
    		//			CloakedClientId $cloakedClientId,
    		Client $client,
    		Role_user $roleUser,
    		Role $role,
    		Survey_project $survey_project,
    		PublicPages $publicPages)
    {
    	$validation_rules = $publicForms->getValidationRulesSignUp();
    	$validation_messages = $publicForms->getCustomMessages();
    	$this->validate($request, $validation_rules, $validation_messages);
    
    	// validate captcha
    	/*
    	 if($this->captchaCheck($request->input('g-recaptcha-response')) == false)
    	 {
    	return redirect()->back()
    	->withErrors(['Incorrect CAPTCHA response'])
    	->withInput();
    	}
    	*/
    
    	$arr_request = $publicForms->getRequestArraySignup($request);
    	//   	$arr_request = $admin->getRequestArray($request);
    	$user->email = $arr_request['email'];
    	$user->password = $arr_request['password'];
    	//		$user->name = '';
    	$user->save();
    	$obj_survey_project = $survey_project 
    							-> where('str_text', 'publish')
    							-> first();
    	$client->str_cloaked_client_id = $client->getNewCloakedClientId($user->id);
// temporarily, all clients receive the publish survey_project id
    	$client->survey_project_id = $obj_survey_project->id;
    	$client->user_id = $user->id;
    	$client->str_first_name = $arr_request['str_first_name'];
    	$client->str_last_name = $arr_request['str_last_name'];
    	$client->str_telephone = $arr_request['str_telephone'];
    	$client->str_company = $arr_request['str_company'];
    	// database name is str_website, not str_client_url
    	$client->str_client_url = $arr_request['str_client_url'];
    	$client->str_lead_destination = $arr_request['str_lead_destination'];
    	$client->str_crm = $arr_request['str_crm'];
    	$client->str_crm_url = $arr_request['str_crm_url'];
    	$client->save();
    
    	$bool_role_assigned = $roleUser->add_role_by_name($user->id, 'client', $role);
    
    	$dataForm = $publicForms->getDataArrayPostSignUp(
    			$arr_request, $user->id,
    			$client->cloaked_client_id,
    			$bool_role_assigned
    			//				$partialDirector->getNavbarRightPublic()
    	);
    	$publicForms->boolSendMail(
    			'sign_up',
    			$dataForm,
    			$arr_request['email'],
    			$publicForms->adminEmail,
    			$publicForms->signUpSubject
    	);
    	// this email sends a thank you to to new client registering
    	// commented out, as mailgun only allows email to be sent to one address
    	// until the domain is verified with mailgun
    	/*
    	$publicForms->boolSendMail(
    			'sign_up_thank_you',
    			$dataForm,
    			$publicForms->adminEmail,
    			$arr_request['email'],
    			$publicForms->signUpThankYouSubject
    	);
    	*/
    	$page_heading_content = "Get an account - results";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    		$data = array_merge($dataForm, $dataPublic);
    		return view('public/sign_up_results')->with('data', $data);
    }
    
    
    public function postContact(
    		Request $request,
    		PublicForm $publicForms,
    		User $user,
    		CommonCode $cCode,
    		//			CloakedClientId $cloakedClientId,
    		Client $client,
    		Role_user $roleUser,
    		Role $role,
    		PublicPages $publicPages)
    {
    //		return redirect('contact')
    	//		->withErrors($validator)
    	//		->withInput();
    	//		echo "request secret = ".$request['secret']."<br><br>";
    
    	//		print_r(Input::all());
    	//		echo "<br>";
    	//		echo "request getConten() = ".$request->getContent()."<br>";
    	$validation_rules = $publicForms->getValidationRulesContact();
    	$validation_messages = $publicForms->getCustomMessages();
    	$this->validate($request, $validation_rules, $validation_messages);
    
    	// validate captcha
    	// recaptcha reports invalid site key, need to produce, recaptcha can wait
    	/*
    	if($this->captchaCheck(Input::get('g-recaptcha-response')) == false)
    		{
    		return redirect()->back()
    		->withErrors(['Incorrect CAPTCHA response'])
    		->withInput();
    		}
    		*/
    	$arr_request = $publicForms->getRequestArrayContact($request);
    		//		echo "<pre>";
    		//	print_r($arr_request);
    		//		echo "<pre>";
    
    	$dataForm = $publicForms->getDataArrayPostContact($arr_request);
    	$page_heading_content = "Contact Us - Results";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    	$data = array_merge($dataForm, $dataPublic);
    		// temp code until confidence in mailgun
    	$publicForms->boolSendPHPMail(
    			$dataForm,
    			$arr_request['email'],
    			$publicForms->adminEmail,
    			$publicForms->contactSubject
    			    
    			);		
    		// end temp codee
    		//	permanent code
    	if ($publicForms->boolSendMail(
    				'contact',
    				$dataForm,
    				$arr_request['email'],
    				$publicForms->adminEmail,
    				$publicForms->contactSubject
    		))
    
    	{
    		return view('public/contact_success')->with('data', $data);
    	}
    	else
    	{
    		return view('public/contact_fail')->with('data', $data);
    	}
    }
    
    public function postIndex(
    		Request $request,
    		PublicForm $publicForm,
    		PublicPages $publicPages,
    		Client $client,
    		Client_registration $client_registration,
    		Survey_project $survey_project,
    		Registration $registration,
    		State $state,
    		Salutation $salutation,
    		Survey_question $survey_question,
    		Survey_item $survey_item
    )
    {
    	$page_heading_content = "Almost done";
    	// manually validate here - cannot reject, only conform
    	$arr_request = $publicForm->getRequestArrayIndex($request);
    	$arr_request = $publicForm->manuallyConformIndex($salutation, $state, $survey_question, $arr_request);

    	$arr_request = $publicForm->make_readable($salutation, $state, $survey_item, $arr_request);
    	$arr_request = $publicForm->cleanRequestArray($arr_request);
    	 
 //   	echo "<br><br>after make_readable<br>";
 //   	echo "<pre>";
//		print_r($arr_request);
//		echo "</pre>";
		$int_public_id = $registration->gen_public_id();
		session()->put('int_public_id', $int_public_id);
		$survey_project_id = $survey_project->get_project_id('publish');
    	$int_registration_id = $registration->save_registration(    			
    			$arr_request, $request->ip(), $int_public_id, $survey_project_id);		
    	 
		session()->put('int_registration_id', $int_registration_id);
 // line below appears to be a duplicate 
 //  	$arr_request, $request->ip(), $int_public_id, $survey_project_id);		
/* this code will be transferred to postAccept function
 * 
 *
		$arr_data = $registration->prepare_data(
				$arr_request, $request->ip(),
				$int_public_id
				);
		echo "<br><br>PublicFormsController,line 373<br>";
		echo "<pre>";
		print_r($arr_data);
		echo "</pre>";
		
    	$registration->record_registration(
    			$client, 
    			$client_registration,
    			$publicForm,
    			$arr_data,  
    			$int_registration_id    			 
    			);
  */  			
//   echo "publicformsController, line 385<br>"; 
 //  echo "postIndex completed, going to view<br>";	
   $dataForm = $publicForm->getDataArrayPostIndex(
   		$arr_request
//   		$user->id,
//   		$client->cloaked_client_id,
//   		$bool_role_assigned
   		//				$partialDirector->getNavbarRightPublic()
   );
   // email explodes the array
//   $dataForm = array('data' => $data);
   $publicForm->boolSendMail(
   		'registration_one',
   		$dataForm,
   		$arr_request['str_email'],
   		$publicForm->adminEmail,
   		$publicForm->registrationOneSubject
   );
   // this email sends a thank you to to new client registering
   // commented out, as mailgun only allows email to be sent to one address
   // until the domain is verified with mailgun
   /*
    $publicForms->boolSendMail(
    		'sign_up_thank_you',
    		$dataForm,
    		$publicForms->adminEmail,
    		$arr_request['email'],
    		$publicForms->signUpThankYouSubject
    );
   */
   		$page_heading_content = "Add a message";
   		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
   		$data = array_merge($dataForm, $dataPublic);
 		return redirect ('message');
//   		return view('public/results')->with('data', $data);    	 
    }

    public function postPubhelp(
    		Request $request,
    		PublicForm $publicForm,
    		Client $client,
    		//   		Survey_question $survey_question,
    		Registration $registration,
    		State $state,
    		Salutation $salutation,
    		Survey_project $survey_project,
    		Survey_question $survey_question,
    		Survey_item $survey_item
    )
    {
    	echo "publicFormsController, line 163, postPubhelp called";
    	$page_heading_content = "Publishers chosen for you";
    	// manually validate here - cannot reject, only conform
    	$arr_request = $publicForm->getRequestArrayIndex($request);
    	$arr_request = $publicForm->manuallyConformIndex($salutation, $state, $survey_question, $arr_request);
//    	echo 'after manuallyConformIndex<br>';
//    	echo "<pre>";
//    	print_r($arr_request);
//    	echo "</pre>";
    
    	$arr_request = $publicForm->make_readable($salutation, $state, $survey_item, $arr_request);
    	$arr_request = $publicForm->cleanRequestArray($arr_request);
    
//    	echo "<br><br>after make_readable<br>";
//    	echo "<pre>";
 //   	print_r($arr_request);
 //   	echo "</pre>";
    	$int_public_registration_id = $registration->gen_public_id();
    	$int_project_id = $survey_project->get_project_id('pubhelp');
    	$int_registration_id = $registration->save_registration(
    			$arr_request, $request->ip(), $int_public_registration_id, $int_project_id);
    	$registration->record_registration($arr_request, $request->ip(), $int_registration_id, $client, $int_public_registration_id);
    	return view('public/pubhelp_results');//->with('data', $data);
    }
    
    //this is to test data sent to clients
    // combines with a test cleint, 
    public function testLandingPage(
    		Request $request,
    		PublicForm $publicForms)
    {
//    	$data = $request->all();
		$data = array('test key' => 'test val');
    	
    	$publicForms->boolSendMail(
    			'test_landing_page',
    			$data,
    			$publicForms->adminEmail,
    			$publicForms->adminEmail,
    			'test of info sent to clients'
    	);
    	 
 // no reason to return a view, as page is called through guzzle   	
//    	return view('crm/testLandingPage')->with('data', $data);
    	   
    }
    
}

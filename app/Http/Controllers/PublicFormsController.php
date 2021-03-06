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
use App\Models\Contact;
use App\Models\Salutation;
use App\Models\State;
use App\Models\Survey_item;
use App\Classes\CommonCode;
use App\Traits\CaptchaTrait;
use App\User;
use Carbon\Carbon;

class PublicFormsController extends Controller
{
	use CaptchaTrait;
	public function getSignUp(PublicForm $publicForm, PublicPages $publicPages)
	{
		$dataForm = $publicForm->getDataArrayGetSignUp();
		$page_heading_content = "Get an account";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/sign_up')->with('data', $data);
	}

	
	public function getContact(PublicForm $publicForm, PublicPages $publicPages)
	{
		$dataForm = $publicForm->getDataArrayGetContact();
		$page_heading_content = "Contact Us";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/contact')->with('data', $data);
	}
	

	public function getMessage(PublicForm $publicForm, PublicPages $publicPages)
	{
		$dataForm = $publicForm->getDataArrayGetMessage();
		$page_heading_content = "Message for publishers";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataForm, $dataPublic);
		return view('public/message')->with('data', $data);
	}
	
	
	public function getTestRecaptcha(PublicForms $publicForm, PublicPages $publicPages)
	{
		$dataForm = $publicForm->getDataArrayGetContact();
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
			$str_date_now_new_york = Carbon::now('America/New_York')->toDateTimeString();
   			$obj_registration->save_registration_data('str_date_time', $str_date_now_new_york);
   			$str_date_now_new_york_human_read = Carbon::now('America/New_York')->toDayDateTimeString();
   			$obj_registration->save_registration_data('str_date_time_human_read', $str_date_now_new_york_human_read);
   			
// retrieve all data from this registration
			$arr_registration_data_raw = $obj_registration
    									->registration_data()
    									->get()
    									->toArray();
    		$arr_registration_data_formatted = $publicForm->format_registration_data($arr_registration_data_raw);

    		$registration->notifyAdmin(
    				$publicForm,
    				$arr_registration_data_formatted
    				);
    		
    		$registration->record_registration(
    			$client, 
    			$client_registration,
    			$publicForm,
    			$arr_registration_data_formatted,  
    			$int_registration_id    			 
    			);
    			
    		return view('public/message_results');//->with('data', $data);    	 
    	}
    	else 
    	{
    		return view('pubic/no_accept_results');
    	}
    }
    
    public function postSignUp(
    		Request $request,
    		PublicForm $publicForm,
    		User $user,
    		CommonCode $cCode,
    		//			CloakedClientId $cloakedClientId,
    		Client $client,
    		Role_user $roleUser,
    		Role $role,
    		Survey_project $survey_project,
    		PublicPages $publicPages)
    {
    	$validation_rules = $publicForm->getValidationRulesSignUp();
    	$validation_messages = $publicForm->getCustomMessages();
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
    
    	$arr_request = $publicForm->getRequestArraySignup($request);
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
    
    	$dataForm = $publicForm->getDataArrayPostSignUp(
    			$arr_request, $user->id,
    			$client->cloaked_client_id,
    			$bool_role_assigned
    			//				$partialDirector->getNavbarRightPublic()
    	);
    	$publicForm->boolSendMail(
    			'sign_up',
    			$dataForm,
    			$arr_request['email'],
    			$publicForm->adminEmail,
    			$publicForm->signUpSubject
    	);
    	
    	// temp code until confidence in mailgun
    	$publicForm->boolSendPHPMail(
    			$dataForm['arr_request'],
    			$arr_request['email'],
    			$publicForm->adminEmail,
    			$publicForm->signUpThankYouSubject
    	);
    	// end temp codee
    	   
    	
    	// this email sends a thank you to to new client registering
    	// commented out, as mailgun only allows email to be sent to one address
    	// until the domain is verified with mailgun
    	
    	$publicForm->boolSendMail(
    			'sign_up_thank_you',
    			$dataForm,
    			$publicForm->adminEmail,
    			$arr_request['email'],
    			$publicForm->signUpThankYouSubject
    	);
    	
    	$page_heading_content = "Get an account - results";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    		$data = array_merge($dataForm, $dataPublic);
    		return view('public/sign_up_results')->with('data', $data);
    }
    
    
    public function postContact(
    		Request $request,
    		PublicForm $publicForm,
    		User $user,
    		CommonCode $cCode,
    		//			CloakedClientId $cloakedClientId,
    		Client $client,
    		Role_user $roleUser,
    		Role $role,
    		PublicPages $publicPages,
    		Contact $contact)
    {
    //		return redirect('contact')
    	//		->withErrors($validator)
    	//		->withInput();
    	//		echo "request secret = ".$request['secret']."<br><br>";
    
    	//		print_r(Input::all());
    	//		echo "<br>";
    	//		echo "request getConten() = ".$request->getContent()."<br>";
    	$validation_rules = $publicForm->getValidationRulesContact();
    	$validation_messages = $publicForm->getCustomMessages();
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
    	$arr_request = $publicForm->getRequestArrayContact($request);
    		//		echo "<pre>";
    		//	print_r($arr_request);
    		//		echo "<pre>";
    	$contact->str_first_name = $arr_request['first_name'];
    	$contact->str_last_name = $arr_request['last_name'];
    	$contact->str_telephone = $arr_request['telephone'];
    	$contact->str_email = $arr_request['email'];
    	$contact->text_message = $arr_request['message'];
    	$contact->save();
    	 
    	$dataForm = $publicForm->getDataArrayPostContact($arr_request);
    	$page_heading_content = "Contact Us - Results";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    	$data = array_merge($dataForm, $dataPublic);
    		// temp code until confidence in mailgun
    	$publicForm->boolSendPHPMail(
    			$dataForm['arr_request'],
    			$arr_request['email'],
    			$publicForm->adminEmail,
    			$publicForm->contactSubject   			    
    			);		
    		// end temp codee
    		//	permanent code
    	if ($publicForm->boolSendMail(
    				'contact',
    				$dataForm,
    				$arr_request['email'],
    				$publicForm->adminEmail,
    				$publicForm->contactSubject
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
    	 
		$int_public_id = $registration->gen_public_id();
		session()->put('int_public_id', $int_public_id);
		$survey_project_id = $survey_project->get_project_id('publish');
    	$int_registration_id = $registration->save_registration(    			
    			$arr_request, $request->ip(), $int_public_id, $survey_project_id);		
    	 
		session()->put('int_registration_id', $int_registration_id);

   
 		return redirect ('message');
    }

       
    
    //this is to test data sent to clients
    // combines with a test cleint, 
    public function testLandingPage(
    		Request $request,
    		PublicForm $publicForm)
    {
//    	$data = $request->all();
		$data = array('test key' => 'test val');
    	
    	$publicForm->boolSendMail(
    			'test_landing_page',
    			$data,
    			$publicForm->adminEmail,
    			$publicForm->adminEmail,
    			'test of info sent to clients'
    	);
    	 
 // no reason to return a view, as page is called through guzzle   	
//    	return view('crm/testLandingPage')->with('data', $data);
    	   
    }
    
}

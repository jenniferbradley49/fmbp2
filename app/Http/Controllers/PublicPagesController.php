<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\PublicPages;

class PublicPagesController extends Controller
{
	// technically, this page includes a form, put in public pages because?
    public function index(PublicPages $publicPages)
    {
    	$page_heading_content = "Welcome";
    // prepare genre sub page

    // end prepare genre sub page
    	
		$data = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		return view('public/index')->with('data', $data);
    }


    public function dialogPage(PublicPages $publicPages)
    {
    	$page_heading_content = "Dialog Page";
		$data = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		return view('public/dialogPage')->with('data', $data);
    }


    public function getPurchase(PublicPages $publicPages, PartialDirector $partialDirector)
    {
    	$page_heading_content = "Purchase";
    	$data = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    	return view('public/purchase')->with('data', $data);
    }
	//
// the next functions enable testing of CRM integration
    public function showLandingPage()
    {
    	return view('crm/landingPage');
    }
    
    public function showZohoForm()
    {
    	return view('crm/zohoForm');   	 
    }
}

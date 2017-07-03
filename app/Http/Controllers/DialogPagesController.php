<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DialogPage;
use App\Http\Requests;

class DialogPagesController extends Controller
{
	public function getDialogForm(DialogPage $dialogPage)
	{
		$data = $dialogPage->getDataArrayGetDialogForm();
		$page_heading_content = "Test dialog form";
//		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
//		$data = array_merge($dataForm, $dataPublic);
		return view('dialog/test_form')->with('data', $data);
	}
	//
}

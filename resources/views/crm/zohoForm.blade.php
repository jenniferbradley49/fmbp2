<!-- Note :
   - You can modify the font style and form style to suit your website. 
   - Code lines with comments “Do not remove this code”  are required for the form to work properly, make sure that you do not remove these lines of code. 
   - The Mandatory check script can modified as to suit your business needs. 
   - It is important that you test the modified form before going live.-->
<div id='crmWebToEntityForm' style='width:600px;margin:auto;'>
   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
   <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads2053056000000108009 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'>

	<!-- Do not remove this code. -->
	<input type='text' style='display:none;' name='xnQsjsdp' value='3d99bbfe18126e89b52ae15af20e487a383c617fd2460dfd954426130f96e736'/>
	<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
	<input type='text' style='display:none;' name='xmIwtLD' value='28d9366a2f8c27117f7a6fdf87a377f2345b920f574cb4b5602f8f5cd1b934b2'/>
	<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

	<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.xyz.com&#x2f;landing' /> 
	<!-- Do not remove this code. -->
	<input type='text' style='display:none;' id='ldeskuid' name='ldeskuid'></input>
	<input type='text' style='display:none;' id='LDTuvid' name='LDTuvid'></input>
	<!-- Do not remove this code. -->
	<style>
		tr , td { 
			padding:6px;
			border-spacing:0px;
			border-width:0px;
			}
	</style>
	<table style='width:600px;background-color:white;color:black'>

	<tr><td colspan='2' style='text-align:left;color:black;font-family:Arial;font-size:14px;'><strong>zohoTest</strong></td></tr>

	<tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>Company<span style='color:red;'>*</span></td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='100' name='Company' /></td></tr>

	<tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>Last Name<span style='color:red;'>*</span></td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='80' name='Last Name' /></td></tr>

	<tr><td colspan='2' style='text-align:center; padding-top:15px;'>
		<input style='font-size:12px;color:#131307' type='submit' value='Submit' />
		<input type='reset' style='font-size:12px;color:#131307' value='Reset' />
	   </td>
	</tr>
   </table>
	<script>
 	 var mndFileds=new Array('Company','Last Name');
 	 var fldLangVal=new Array('Company','Last Name');
		var name='';
		var email='';

 	 function checkMandatory() {
		for(i=0;i<mndFileds.length;i++) {
		 var fieldObj=document.forms['WebToLeads2053056000000108009'][mndFileds[i]];
		 if(fieldObj) {
			if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
			if(fieldObj.type =='file')
				{ 
				alert('Please select a file to upload.'); 
				fieldObj.focus(); 
				return false;
				} 
			alert(fldLangVal[i] +' cannot be empty.'); 
   	  	 	 fieldObj.focus();
   	  	 	 return false;
			}  else if(fieldObj.nodeName=='SELECT') {
  	  	  	if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
				alert(fldLangVal[i] +' cannot be none.'); 
				fieldObj.focus();
				return false;
			  }
			} else if(fieldObj.type =='checkbox'){
 			if(fieldObj.checked == false){
				alert('Please accept  '+fldLangVal[i]);
				fieldObj.focus();
				return false;
			  } 
			} 
			try {
			    if(fieldObj.name == 'Last Name') {
				name = fieldObj.value;
 			   }
			} catch (e) {}
		   }
		}
		trackVisitor();
	}
</script><script type='text/javascript' id='VisitorTracking'>var $zoho= $zoho || {salesiq:{values:{},ready:function(){$zoho.salesiq.floatbutton.visible('hide');}}};var d=document;s=d.createElement('script');s.type='text/javascript';s.defer=true;s.src='https://salesiq.zoho.com/null/float.ls?embedname=leadsunlimited';t=d.getElementsByTagName('script')[0];t.parentNode.insertBefore(s,t);function trackVisitor(){try{if($zoho){var LDTuvidObj = document.forms['WebToLeads2053056000000108009']['LDTuvid'];if(LDTuvidObj){LDTuvidObj.value = $zoho.salesiq.visitor.uniqueid();}var firstnameObj = document.forms['WebToLeads2053056000000108009']['First Name'];if(firstnameObj){name = firstnameObj.value +' '+name;}$zoho.salesiq.visitor.name(name);var emailObj = document.forms['WebToLeads2053056000000108009']['Email'];if(emailObj){email = emailObj.value;$zoho.salesiq.visitor.email(email);}}} catch(e){}}</script>
	</form>
</div>




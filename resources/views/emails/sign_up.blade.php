<!-- resources/views/emails/sign_up.blade.php -->
<br><br>A web user registered, and sent the following information from the contact page:
<br><br>
First name {!! $arr_request['str_first_name'] !!}
<br>
Last name {!! $arr_request['str_last_name'] !!}
<br>
telephone {!! $arr_request['str_telephone'] !!}
<br>
email {!! $arr_request['email'] !!}
<br>

Client URL : {!! $arr_request['str_client_url'] !!}
<br>
Company {!! $arr_request['str_company'] !!}
<br>
CRM {!! $arr_request['str_crm'] !!}
<br>
CRM website {!! $arr_request['str_crm_url'] !!}
<br>
Lead Destination URL {!! $arr_request['str_lead_destination'] !!}
<br>

	
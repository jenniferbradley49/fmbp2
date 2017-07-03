<!-- resources/views/emails/contact.blade.php -->
<br><br>A web user sent the following information from the contact page:
<br><br>
First name {!! $arr_request['first_name'] !!}
<br>
Last name {!! $arr_request['last_name'] !!}
<br>
telephone {!! $arr_request['telephone'] !!}
<br>
email {!! $arr_request['email'] !!}
<br><br>

Message : {!! $arr_request['message'] !!}

	
<!-- resources/views/emails/registrationOne.blade.php -->
<br><br>An author completed the first page / form  of registration, and expressed interest 
in being contacted by publishers.  This user sent the 
following information:
<br><br>
@foreach ($arr_request as $key => $val)
	<br>{{ $key }} = {{ $val }}
@endforeach
<br>


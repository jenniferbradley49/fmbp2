<!-- resources/views/emails/sign_up.blade.php -->
<br><br>A web user completed registration, and expressed interest 
in being contacted by publishers.  This user sent the 
following information:
<br><br>
@foreach ($arr_data as $key => $val)
	<br>{{ $key }} = {{ $val }}
@endforeach
<br>


<br>

	
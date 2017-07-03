@extends('layouts.master_public')

@section('title', 'Logout page')
@section('page_specific_jquery')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Logout</div>
                <div class="panel-body">
                
                You have been logged out from this application.
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.default')

@section('content')
	<div class="jumbotron">
  		<h1>Welcome to larabook</h1>
		<p> Welcome to the premier place to talk about bullshit with others. Why don't you get the fuck off this page and sign up? Are you mad bro? Do yo even lift? If so, don't you think your lifting is non-existence without the juiiiisss</p>
		
		@if (!$currentUser)
		<p>
			{{ link_to_route('register_path','Sign up', null, ['class' => 'btn btn-primary btn-lg']) }}
		 </p>
		 @endif
	</div>
@stop
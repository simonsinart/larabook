@extends('layouts.default')

@section('content')
	<h1>Sign In!</h1>
	<div class="row">
		<div class="col-md-6">
			{{ Form::open(['route' => 'login_path']) }}
				<div class="form-group">
					{{ Form::label('email', 'Email: ') }}
					{{ Form::text('email', null, ['class' => 'form-control', 'required'=>'required']) }}
				</div>

				<div class="form-group">
					{{ Form::label('password', 'Password: ') }}
					{{ Form::password('password', ['class' => 'form-control', 'required' =>'required']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
			<div class="reset">
				{{ link_to('/password/remind', 'Reset Your Password') }}
	 		</div>
		</div>

	</div>
@stop
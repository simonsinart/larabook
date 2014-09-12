@extends('layouts.default')

@section('content')
	<h1>Need to reset your password?</h1>
	
	<div class="row">
		<div class="col-md-6">

			{{ Form::open() }}
				<div class="form-group">
					{{ Form::label('email','Email:') }}
					{{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
				</div>

				<div class="form-group pull-right">
					{{ Form::submit('Reset password', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}

		</div>
	 </div>
@stop
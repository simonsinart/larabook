@extends('layouts.default')

@section('content')
	<h1> All Users </h1>

	@foreach($users->chunk(4) as $userSet)
		<div class="row user">
			@foreach ($userSet as $user)
				<div class="col-md-3 user-block">
					@include('users.partials.avatar', ['size' => 70])
					<div class="user-block-username"> 
						{{ link_to_route('profile_path', $user->username, $user->username) }}
						
					</div>
				 </div>
			@endforeach
		</div>
	@endforeach
	<div class="text-center">
		<div class="pagination"> {{ $users->links() }} </div>
	</div>
@stop
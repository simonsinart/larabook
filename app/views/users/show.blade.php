@extends('layouts.default')

@section('content')

	<div class="row">
		<div class="col-md-4">
			<div class="media">
				<div class="pull-left">
					@include('users.partials.avatar', ['size' => 80])
				</div>

				<div class="media-body">
					<h1 class="meadia-heading"> {{ $user->username }} </h1>
					<ul class="list-inline text-muted">
						<li> {{ $user->present()->statusCount() }} </li>
						<li> {{ $user->present()->followerCount() }} </li>
					</ul>

					@unless($user->is($currentUser))
						@include('users.partials.follow-form')
					@endif
				</div>

			</div>

			@foreach($user->followers as $follower)
				@include('users.partials.avatar', ['size' => 20, 'user' => $follower])
			@endforeach

		</div>

		<div class="col-md-6">
			@include('statuses.partials.statuses', ['statuses' => $user->statuses])
		</div>
	</div>

@stop
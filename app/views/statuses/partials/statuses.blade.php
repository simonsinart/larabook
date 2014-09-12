@if ($user->is($currentUser))
	@include('statuses.partials.publish-status-form')
@endif

@forelse ($statuses as $status)
	@include('statuses.partials.status')
@empty
	<p> This user hasn't posted any statuses. </p>
@endforelse
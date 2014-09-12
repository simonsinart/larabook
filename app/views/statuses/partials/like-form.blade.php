@if($signedIn)
	@if (is_null($status->isLikedByUser($currentUser)))
 		{{ Form::open(['route' => ['like_path',$status->id]]) }}
			{{ Form::hidden('status_id', $status->id) }}
			{{ Form::hidden('value', '1') }}
			<button type="submit" class="btn btn-primary">Like</button>
		{{ Form::close() }}
	@else
		{{ Form::open(['method' => 'DELETE', 'route' => ['dislike_path', $status->likes()->first()->id]]) }}
			<button type="submit" class="btn btn-danger">Dislike</button>
		{{ Form::close() }}
	@endif
@endif
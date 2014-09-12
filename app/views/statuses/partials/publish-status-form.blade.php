
@include('layouts.partials.errors')

<div class="status-post">
	{{ Form::open(['route' => 'statuses_path']) }}
	<div class="form-group">
		{{ Form::textarea('body',null, ['class' => 'form-control', 'rows' => 3,'placeholder' => "Njah, sem vem da ne razmišljaš velik."]) }}
	</div>
	<div class="form-group status-post-submit">
		{{ Form::Submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
	</div>
	{{ Form::close() }}
</div>
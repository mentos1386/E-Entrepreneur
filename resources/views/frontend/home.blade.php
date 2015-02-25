@extends('frontend.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			@foreach($posts as $post)

				<div class="panel panel-default">

					<div class="panel-heading"><a href="{{ route('post.index').'/'.$post['id'] }}"> {{ $post->title }}</a></div>

					<div class="panel-body">
							<p>{{ $post->body }}</p>
					</div>
				</div>

			@endforeach

		</div>
	</div>
</div>
@endsection

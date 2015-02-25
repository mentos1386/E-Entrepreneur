@extends('frontend.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">

				<div class="panel-heading">{{ $post->title }}</div>

				<div class="panel-body">
					<p>{{ $post->body }}</p>
				</div>
				<div class="panel-footer">
					@foreach($post->tag as $tag)
						{{ $tag->name }}
					@endforeach
					@foreach($post->category as $category)
						{{ $category->name }}
					@endforeach
				</div>
			</div>

		</div>
	</div>
</div>
@endsection

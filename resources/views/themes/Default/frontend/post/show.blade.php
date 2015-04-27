@extends('themes.Default.frontend.layouts.master')

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
						<span class="fa fa-tag"> {{ $tag->name }} </span>
					@endforeach
					@foreach($post->category as $category)
						<span class="fa fa-sitemap"> {{ $category->name }} </span>
					@endforeach
				</div>
			</div>

		</div>
	</div>
</div>
@endsection

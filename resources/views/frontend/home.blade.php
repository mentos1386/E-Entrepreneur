@extends('frontend.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			@foreach($posts as $post)

				<div class="panel panel-default">

					<div class="panel-heading">
						<a href="{{ route('post.index').'/'.$post['id'] }}"> {{ $post->title }}</a>

						<p class="pull-right">{{ $post->user->username }}</p>
					</div>

					<div class="panel-body">
							<p>{{ $post->body }}</p>
					</div>
					<div class="panel-footer">
						@foreach($post->tag as $tag)
							<span class="fa fa-tag"> {{ $tag->name }} </span>
						@endforeach
						@foreach($post->category as $category)
							<span style="padding-left: 10px;" class="fa fa-sitemap"> {{ $category->name }} </span>
						@endforeach
					</div>
				</div>

			@endforeach

		</div>
	</div>
</div>
@endsection

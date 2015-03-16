<div class="container">
    <div class="row 150%">
        <div class="12u 12u$(medium)">
            <header class="major">
                <a href="{{ Themes::postUrl($post['id']) }}"><h2><span class="fa fa-link"></span> {{ $post['title'] }}
                    </h2></a>
            </header>
            <p>{{ $post['body'] }}</p>
            <ul class="tags">
                @foreach($post['tag'] as $tag)
                    <li><span class="fa fa-tag"></span> {{ $tag['name'] }}</li>
                @endforeach
            </ul>
            <p style="float:right;">{{ $post['user']['username'] }} <span class="fa fa-user"></span></p>
        </div>
    </div>
</div>

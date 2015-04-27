<div class="container">
    <div class="row 150%">
        <div class="width-100">
            <header class="major">

                <div class="wrap">
                    <h2 style="display:inline-block;">
                        <span class="fa fa-file-text-o"></span>
                        <a href="{{ Themes::postUrl($post['id']) }}">
                            {{ $post['title'] }}
                        </a>
                    </h2>

                    <h2 style="display:inline-block;float:right;">
                        {{ date('j M Y' , strtotime($post['created_at'])) }} | {{ count($post['comment']) }}
                        <span class="fa fa-comments-o"></span>
                    </h2>
                </div>

            </header>
            <p>{{ $post['body'] }}</p>
            <ul class="tags">
                @foreach($post['tag'] as $tag)
                    <li><span class="fa fa-tag"></span>
                        <a href="/tag/{{ $tag['id'] }}">
                            {{ $tag['name'] }}
                        </a>
                    </li>
                @endforeach
                    @foreach($post['category'] as $category)
                        <li><span class="fa fa-sitemap"></span>
                            <a href="/category/{{ $category['id'] }}">
                                {{ $category['name'] }}
                            </a>
                        </li>
                    @endforeach
            </ul>
            <p class="author">{{ $post['user']['username'] }}</p>
        </div>

    </div>
</div>

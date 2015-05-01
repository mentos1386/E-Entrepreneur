<section class="main style{{ $data['style'] }} special">
    <div class="container">
        <header class="major">
            <div class="wrap">
                <h2>{{ $data['header'] }}</h2>
            </div>
        </header>
        <p>{{ $data['sub_header'] }}</p>

        <div class="row 150%">

            @foreach($data['images'] as $item)
                <div class="width-33">
                    <span class="image fit"><img src="{{ $item['url'] }}" alt="{{ $item['title'] }}"/></span>

                    <h3>{{ $item['title'] }}</h3>

                    <p>{{ $item['text'] }}</p>
                    <ul class="actions">
                        <li><a href="
                    @if ($item['btn_url'] == "")
                    {{ $item['btn_custom_url'] }}
                    @else
                            {{ $item['btn_url'] }}
                    @endif
                                    " class="button">{{ $item['btn_text'] }}</a></li>
                    </ul>
                </div>
            @endforeach

        </div>
    </div>
</section>

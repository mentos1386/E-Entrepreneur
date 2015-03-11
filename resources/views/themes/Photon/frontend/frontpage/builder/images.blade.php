<section class="main style1 special">
    <div class="container">
        <header class="major">
            <h2>{{ $data['header'] }}</h2>
        </header>
        <p>{{ $data['sub_header'] }}</p>

        <div class="row 150%">

            @foreach($data['images'] as $item)
                <div class="4u$ 12u$(medium)">
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
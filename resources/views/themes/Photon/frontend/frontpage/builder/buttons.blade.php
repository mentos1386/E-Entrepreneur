<section id="four" class="main style{{ $data['style'] }} special">
    <div class="container">
        <header class="major">
            <h2>{{ $data['header'] }}</h2>
        </header>
        <p>{{ $data['sub_header'] }}</p>
        <ul class="actions uniform">
            @foreach($data['buttons'] as $button)
                @if($button['text'] != "")
                    <li><a href="
                    @if ($button['url'] == "")
                        {{ $button['custom_url'] }}
                    @else
                        {{ $button['url'] }}
                    @endif
                                " class="button {{ $button['special'] }}">{{ $button['text'] }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
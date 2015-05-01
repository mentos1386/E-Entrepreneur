<section class="main style{{ $data['style'] }} special">
    <div class="container">
        <div class="wrap">
            <header class="major">
                <div class="wrap">
                    <h2>{{ $data['header'] }}</h2>
                </div>
            </header>
        </div>
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
                                " class="button {{ $button['special'] }}"> <i
                                    class="fa {{$button['icon']}}"></i> {{ $button['text'] }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
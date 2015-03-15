<section class="main style{{ $data['style'] }}">
    <div class="container">
        <div class="row 150%">

            @if ($data['image'] != '')
                <div class="6u 12u$(medium)">
                    @else
                        <div class="12u$ 12u$(medium)">
                            @endif
                            <header class="major">
                                <h2>{{ $data['title'] }}</h2>
                            </header>
                            <p>{{ $data['text'] }}</p>
                        </div>
                        @if ($data['image'] != '')
                            <div class="6u$ 12u$(medium) important(medium)">
                                <span class="image fit"><img src="{{ $data['image'] }}" alt=""></span>
                            </div>
                        @endif
                </div>
        </div>
</section>
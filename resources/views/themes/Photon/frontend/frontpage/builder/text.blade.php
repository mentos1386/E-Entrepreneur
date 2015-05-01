<section class="main style{{ $data['style'] }}">
    <div class="container">
        <div class="row 150%">

            @if ($data['image'] != '')
                <div class="width-50">
                    @else
                        <div class="width-100">
                            @endif
                            <header class="major">
                                <div class="wrap">
                                    <h2>{{ $data['title'] }}</h2>
                                </div>
                            </header>
                            <p>{{ $data['text'] }}</p>
                        </div>
                        @if ($data['image'] != '')
                            <div class="width-50">
                                <span class="image fit"><img src="{{ $data['image'] }}" alt=""></span>
                            </div>
                        @endif
                </div>
        </div>
</section>
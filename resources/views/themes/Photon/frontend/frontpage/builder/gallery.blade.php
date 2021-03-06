<section class="main style{{ $data['style'] }} special">
    <div class=" container">
        <header class="major">
            <div class="wrap">
                <h2>{{ $data['header'] }}</h2>
            </div>
        </header>
        <p>{{ $data['sub_header'] }}</p>

        <div class="width-100">

            <div class="gallery js-masonry"
                 data-masonry-options='{ "itemSelector": ".item", "columnWidth": ".narrow-1col" }'>
                @foreach($data['images'] as $image)
                    <div class="item {{ $image['size'] }}">
                        <img src="{{ $image['url'] }}" alt="{{ $image['url'] }}"/>

                        <div class="hover">
                            <div class="center">
                                <h3>{{ $image['hover'] }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
<script>
    var $container = $('.gallery');
    // initialize Masonry after all images have loaded
    $container.imagesLoaded(function () {
        $container.masonry();
    });
</script>
<div class="width-25 block store-card">
    <span class="image fit">
        <a class="store-image-thumbnail" href="{{ route('store.index') }}/{{$item['id']}}">
            <img src="
                    @if(isset(json_decode($item['images'], true)[0]['url']))
                        {{ json_decode($item['images'], true)[0]['url'] }}
                    @else
                    http://animecopas.com/images/web/default-image.png
                @endif
                    "
                    alt="{{ $item['title'] }}"/>

            <div class="hover">
                <div class="center">
                    <h3>More Info</h3>
                </div>
            </div>
        </a>
    </span>

    <div class="info">
        <h3 class="store-rating">
            <a href="{{ route('store.index') }}/{{$item['id']}}">{{ $item['name'] }}</a>
        </h3>

        <p>{!! Themes::reviews_ratio($item['reviewRatio'], '1.5em') !!}</p>

        <p>{!! Themes::first_word($item['description'],$item['id'],20) !!}</p>
    </div>

    <ul class="actions store-buttons">
        <li class="width-50 block">
            <a href="{{ route('store.index') }}/{{$item['id']}}" class="button width-100">Details</a>
        </li>
        <li class="buy-button width-50 block">
            @if($item['stock'] > 0)
                <a href="{{ route('store.cart') .'/add/'. $item['id'] }}" class="button special width-100">
                    {{ $item['price'] }}€ | Order
                </a>
            @else
                <div class="button width-100 disabled">
                    Run Out
                </div>
            @endif
        </li>
    </ul>
</div>
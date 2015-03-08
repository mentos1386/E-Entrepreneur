@foreach($menus as $menu)
    @if ($menu['pos'] == 'bottom')
        @foreach($menu['links'] as $link)
            <li><a href="{{ $link['url'] }}" class="icon alt {{ $link['icon'] }}"><span
                            class="label">{{ $link['name'] }}</span></a></li>
        @endforeach
    @endif
@endforeach
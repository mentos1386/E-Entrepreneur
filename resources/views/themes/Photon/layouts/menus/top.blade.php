@foreach($menus as $menu)
    @if ($menu['pos'] == 'top')
        @foreach($menu['links'] as $link)
            <li><a href="{{ $link['url'] }}" class="button">{{ $link['name'] }}</a></li>
        @endforeach
    @endif
@endforeach
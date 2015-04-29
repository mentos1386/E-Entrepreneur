@foreach($menus as $menu)
    @if ($menu['pos'] == 'top')
        @foreach($menu['links'] as $link)
            <li>
                <a href="{{ $link['url'] }}" class="button">
                    <span class="fa {{ $link['icon'] }}"></span> {{ $link['name'] }}
                </a>
            </li>
        @endforeach
    @endif
@endforeach
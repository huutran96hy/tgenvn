@php
    function isActive($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }

    $menuItems = config('menu.admin_menu', []);
@endphp

@foreach ($menuItems as $item)
    <li class="nav-item {{ isset($item['children']) ? 'nav-item-submenu' : '' }}">
        <a href="{{ isset($item['children']) ? '#' : route($item['route']) }}" class="nav-link">
            <i class="{{ $item['icon'] ?? '' }}"></i>
            <span>{{ $item['label'] }}</span>
        </a>

        @if (isset($item['children']) && is_array($item['children']))
            <ul class="nav-group-sub collapse">
                @foreach ($item['children'] as $child)
                    <li class="nav-item">
                        <a href="{{ route($child['route']) }}" class="nav-link {{ isActive($child['route'] . '.*') }}">
                            {{ $child['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach

@php
    function isActive($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }

    $menuItems = config('menu.admin_menu', []);
    $user = Auth::user();

    // Ẩn menu user nếu là content_manager
    if ($user && $user->role === 'content_manager') {
        $menuItems = array_filter($menuItems, function ($item) {
            return $item['route'] !== 'admin.users.index';
        });
    }
@endphp

@foreach ($menuItems as $item)
    @php
        $hasChildren = isset($item['children']) && is_array($item['children']);
        $isActive = false;

        if ($hasChildren) {
            foreach ($item['children'] as $child) {
                if (request()->routeIs($child['route']) || request()->routeIs($child['route'] . '.*')) {
                    $isActive = true;
                    break;
                }
            }
        } else {
            $isActive = request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*');
        }
    @endphp

    <li class="nav-item {{ $hasChildren ? 'nav-item-submenu' : '' }}">
        <a href="{{ $hasChildren ? '#' : route($item['route']) }}" class="nav-link {{ $isActive ? 'active' : '' }}">
            <i class="{{ $item['icon'] ?? '' }}"></i>
            <span>{{ $item['label'] }}</span>
        </a>

        @if ($hasChildren)
            <ul class="nav-group-sub collapse {{ $isActive ? 'show' : '' }}">
                @foreach ($item['children'] as $child)
                    @php
                        $childActive =
                            request()->routeIs($child['route']) || request()->routeIs($child['route'] . '.*');
                    @endphp
                    <li class="nav-item">
                        <a href="{{ route($child['route']) }}" class="nav-link {{ $childActive ? 'active' : '' }}">
                            {{ $child['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach

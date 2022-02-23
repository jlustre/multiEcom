@php
    $menu1 = Session::get('tree') ? Session::get('tree') : array();
@endphp

@forelse($menu1 as $menuitem)
    <li class="nav-item {{ $menuitem['id'] == 1 ? 'menu-open': '' }}">
        <a href="#" class="nav-link {{ $menuitem['isActive'] ? 'active' : '' }}">
            <i class="{{ $menuitem['iconclass'] }}"></i>
            <p>{{ $menuitem['name'] }}<i class="right fas fa-angle-left"></i></p>
        </a>
        @if (isset($menuitem['children']))
            <ul class="nav nav-treeview">
                @forelse ($menuitem['children'] as $child)
                    @php
                        $requestUrl = 'admin/'. $child["routegroup"].'/*';
                    @endphp
                    <li class="nav-item">
                        <a href="{{ $child['url'] ? route($child['url']) : '' }}" 
                        class="nav-link {{ request()->is($requestUrl) ? 'active':'' }}">
                            <i class="{{ $child['iconclass'] }}"></i> 
                            <p>{{ $child['name'] }}</p> 
                        </a> 
                    </li>
                @empty
                @endforelse
            </ul> 
        @endif
    </li>
@empty
    <p>No Menu Available</p>
@endforelse

@props(['icon' => '', 'name' => '', 'route' => '', 'active' => false])

<li class="nav-item">
    <a class="nav-link {{
        $active ? 'active' : ''
    }}" href="{{ $route }}">
        <span data-feather="{{ $icon }}" class="align-text-bottom"></span>
        {{ ucwords(str_replace('-', ' ', $name)) }}
    </a>
</li>

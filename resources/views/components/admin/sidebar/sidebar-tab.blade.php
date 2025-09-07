@props(['active', 'link', 'tabName'])
<li class="menu-item @if($active) active @endif">
    <a href="{{ $link }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Analytics">{{ $tabName }}</div>
    </a>
</li>
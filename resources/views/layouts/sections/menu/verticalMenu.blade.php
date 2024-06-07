@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros')
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">Clinica</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
      <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
    </a>
  </div>
  @endif

  <!-- ! Hide menu divider if navbar-full -->
  @if(!isset($navbarFull))
  <div class="menu-divider mt-0 "></div>
  @endif

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @role('secre') <!-- Mostrar solo para el rol de secre -->
      @foreach ($menuData[0]->menu as $menu)
        {{-- Adding active and open class if child is active --}}
        
        {{-- Menu headers --}}
        @if (isset($menu->menuHeader))
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ $menu->menuHeader }}</span>
          </li>
        @else
          {{-- Active menu method --}}
          @php
            $activeClass = null;
            $currentRouteName = Route::currentRouteName();

            if ($currentRouteName === $menu->slug) {
              $activeClass = 'active';
            } elseif (isset($menu->submenu)) {
              if (gettype($menu->slug) === 'array') {
                foreach($menu->slug as $slug) {
                  if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                    $activeClass = 'active open';
                  }
                }
              } else {
                if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
                  $activeClass = 'active open';
                }
              }
            }
          @endphp

          {{-- Main menu --}}
          <li class="menu-item {{ $activeClass }}">
            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
              @isset($menu->icon)
                <i class="{{ $menu->icon }}"></i>
              @endisset
              <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
            </a>
            {{-- Submenu --}}
            @isset($menu->submenu)
              @include('layouts.sections.menu.submenu', ['menu' => $menu->submenu])
            @endisset
          </li>
        @endif
      @endforeach
    @endrole
  </ul>
</aside>

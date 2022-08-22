@php
use App\Models\GeneralSetting;
$configData = Helper::applClasses();
$footer = GeneralSetting::select('footer_detail','header_logo')->where('id', 1)->first();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="brand-logo">
                        <img src="{{ asset('setting/header/'.$footer->header_logo) }}" alt="">
                    </div>
                    @role('admin')
                        <h2 class="brand-text">NFTs</h2>
                    @endrole
                    @hasexactroles('subadmin')
                        <h2 class="brand-text">NFTs</h2>
                    @endhasexactroles
                    <!--@hasrole('Editor')
    <h2 class="brand-text">Vuexy3</h2>
@endhasrole -->
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @if (isset($menuData[0]))
                @foreach ($menuData[0]->menu as $menu)
                    @if (isset($menu->navheader))
                        <li class="navigation-header">
                            <span>{{ __($menu->navheader) }}</span>
                            <i data-feather="more-horizontal"></i>
                        </li>
                    @else
                        {{-- Add Custom Class with nav-item --}}
                        @php
                            $custom_classes = '';
                            if (isset($menu->classlist)) {
                                $custom_classes = $menu->classlist;
                            }
                        @endphp
                        <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                            @if (auth()->user()->role == 'admin')
                                @if (isset($menu->role) && $menu->role == 'admin')
                                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                        class="d-flex align-items-center margin"
                                        target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                        <i style="height: 16px;" class="{{ $menu->icon }}"></i>
                                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                                        @if (isset($menu->badge))
                                            <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                                            <span
                                                class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                                        @endif
                                    </a>
                                @endif
                            @endif
                            @if (auth()->user()->role == 'subadmin')
                                @if (isset($menu->roles) && $menu->roles == 'subadmin')
                                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                        class="d-flex align-items-center"
                                        target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                        <i style="height: 16px;" class="{{ $menu->icon }}"></i>
                                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                                        @if (isset($menu->badge))
                                            <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                                            <span
                                                class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                                        @endif
                                    </a>
                                @endif
                            @endif

                            @if (isset($menu->submenu))
                                @include('admin/layouts/submenu', ['menu' => $menu->submenu])
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

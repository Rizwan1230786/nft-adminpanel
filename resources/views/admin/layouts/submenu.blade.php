{{-- For submenu --}}
<ul class="menu-content">
  @if(isset($menu))
  @foreach($menu as $submenu)
  <li>
    <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}" style="margin-left: 10px;" class="d-flex align-items-center" target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
      @if(isset($submenu->icon))
      <i style="height: 16px;" class="{{ $submenu->icon }}"></i>
      @endif
      <span class="menu-item text-truncate">{{ __($submenu->name) }}</span>
      @if (isset($submenu->badge))
          <?php $badgeClasses = "badge rounded-pill badge-light-success ms-auto me-1" ?>
          <span class="{{ isset($submenu->badgeClass) ? $submenu->badgeClass : $badgeClasses }}">{{$submenu->badge}}</span>
      @endif
    </a>
    @if (isset($submenu->submenu))
    @include('admin/layouts/submenu', ['menu' => $submenu->submenu])
    @endif
  </li>
  @endforeach
  @endif
</ul>

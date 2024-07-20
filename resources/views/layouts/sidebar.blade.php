<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
<div class="app-brand demo ">
<a href="index.html" class="app-brand-link">
{{-- <span class="app-brand-logo demo">
<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="../../../../www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
</svg>
</span> --}}
<img src="/images/lagunaseal.png" width="30" height="30"/>
<span class="app-brand-text demo menu-text fw-bold">PROC</span>
</a>

<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
<i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
<i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
</a>
</div>

<div class="menu-inner-shadow"></div>



<ul class="menu-inner py-1">
<!-- Dashboards -->
<li class="menu-item {{ $page['name'] == 'Dashboard' ? 'active open' : '' }}">
<a href="/home" class="menu-link">
<i class="menu-icon tf-icons ti ti-home"></i>
<div data-i18n="Dashboards">Home</div>
</a>

</li>
<li class="menu-item {{ $page['name'] == 'Procurement Activities' ? 'active open' : '' }}">
<a href="/procurements/" class="menu-link">
<i class="menu-icon tf-icons ti ti-files"></i>
<div data-i18n="Dashboards">Public Bidding</div>
</a>
</li>

<li class="menu-item {{ $page['name'] == 'Alternative Procurement Activities' ? 'active open' : '' }}">
<a href="/procurements/alternative/" class="menu-link">
<i class="menu-icon tf-icons ti ti-files"></i>
<div data-i18n="Dashboards">Alternative Mode of Procurment</div>
</a>
</li>

<li class="menu-item {{ $page['name'] == 'Categories' ? 'active open' : '' }}">
<a href="javascript:void(0);" class="menu-link menu-toggle">
<i class="menu-icon tf-icons ti ti-list"></i>
<div data-i18n="Layouts">Categories</div>
</a>

<ul class="menu-sub">
<li class="menu-item {{ $page['name'] == 'Procurement Categories' ? 'active open' : '' }}">
<a href="/categories/procurements/" class="menu-link">
<div data-i18n="Collapsed menu">Procurement Activities</div>
</a>
</li>
<li class="menu-item {{ $page['name'] == 'Alternative Categories' ? 'active open' : '' }}">
<a href="/categories/alternative/" class="menu-link">
<div data-i18n="Content navbar">Alternative Mode of Procurement</div>
</a>
</li>
</ul>
</li>

{{-- ARCHIVE --}}
<li class="menu-item {{ $page['name'] == 'Archive Procurement' ? 'active open' : '' }}">
<a href="#" class="menu-link menu-toggle">
<i class='menu-icon tf-icons ti ti-folder'></i>
<div data-i18n="Front Pages">Archives</div>
</a>

<ul class="menu-sub">
<li class="menu-item {{ $page['name'] == 'Archive Procurement' ? 'active open' : '' }}">
<a href="/archives/procurements" class="menu-link">
<div data-i18n="Collapsed menu">Public Bidding</div>
</a>
</li>
<li class="menu-item {{ $page['name'] == 'Archive Alternative' ? 'active open' : '' }}">
<a href="/archives/procurements/alternative" class="menu-link">
<div data-i18n="Content navbar">Alternative Mode of Procurement</div>
</a>
</li>
</ul>
</li>
@if (Auth::user()->type == '1')
{{-- Users --}}
<li class="menu-item {{ $page['name'] == 'Users' ? 'active open' : '' }}">
<a href="/users" class="menu-link">
<i class='menu-icon tf-icons ti ti-users'></i>
<div data-i18n="Front Pages">Users</div>
</a>
</li>
{{-- AUDIT TRAILS --}}
<li class="menu-item {{ $page['name'] == 'Audit Trail' ? 'active open' : '' }}">
    <a href="/audit_trails" class="menu-link">
    <i class='menu-icon tf-icons ti ti-settings'></i>
    <div data-i18n="Front Pages">Audit Trails</div>
    </a>
</li>
@endif
</ul>

</aside>

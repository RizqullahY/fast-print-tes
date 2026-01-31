<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="javascript:void(0)" class="app-brand-link">
              <span class="app-brand-logo demo">
                <!-- ICON -->
              </span>
            <span class="app-brand-text demo menu-text fw-bold">v31.01.2026</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::is('product*') ? 'active open' : '' }}">
            <a href="/product" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Product">Product</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('category*') ? 'active open' : '' }}">
            <a href="/category" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Categories">Categories</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('status*') ? 'active open' : '' }}">
            <a href="/status" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Status">Status</div>
            </a>
        </li>

    </ul>
</aside>

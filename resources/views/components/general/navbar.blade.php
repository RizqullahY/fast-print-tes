<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0)"
                   data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="../../assets/img/avatars/1.png" alt class="rounded-circle"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item mt-0" target='__blank' href="https://github.com/rizqullahy">
                            <div class="d-flex align-items-center">
                                <div class="shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt
                                             class="rounded-circle"/>
                                    </div>
                                </div>
                                <div class="grow">
                                    <h6 class="mb-0">Rizqullah Yusuf</h6>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" target='__blank' href="https://github.com/rizqullahy">
                            <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My
                                                Profile</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0"
               placeholder="Search..." aria-label="Search..."/>
        <i class="ti ti-x search-toggler cursor-pointer"></i>
    </div>
</nav>

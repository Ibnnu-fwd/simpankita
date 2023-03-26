<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 mt-4 d-md-block bg-body-tertiary sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <x-sidebar-menu name="Halaman Utama" icon="home" route="{{ route('admin.dashboard') }}"
                        active="{{ request()->routeIs('admin.dashboard') }}" />

                    <!-- Master Data -->
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between align-items-center" href="#userDropdown"
                            data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="userDropdown">
                            <div class="d-flex align-items-center">
                                <span data-feather="hard-drive" class="align-text-bottom"></span>
                                <span>Master Data</span>
                            </div>
                            <span data-feather="arrow-up-circle"></span>
                        </a>
                        <div class="collapse @if (request()->routeIs('admin.officer.*')) show @endif" id="userDropdown">
                            <ul class="nav flex-column">
                                <x-sidebar-menu name="Petugas" icon="users" route="{{ route('admin.officer.index') }}"
                                    active="{{ request()->routeIs('admin.officer.*') }}" />
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-3">
            <div class="pt-4 mb-3 border-bottom">
                {{ $header }}
            </div>

            {{ $slot }}
        </main>
    </div>
</div>

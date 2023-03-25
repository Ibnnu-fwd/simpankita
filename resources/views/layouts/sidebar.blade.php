<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 mt-4 d-md-block bg-body-tertiary sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <x-sidebar-menu name="Halaman Utama" icon="home" route="{{ route('admin.dashboard') }}"
                    active="{{ request()->routeIs('admin.dashboard') }}" />
                    <x-sidebar-menu name="Petugas" icon="users" route="{{ route('admin.officer.index') }}"
                    active="{{ request()->routeIs('admin.officer.*') }}" />
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="pt-3 mb-3 border-bottom">
                {{ $header }}
            </div>

            {{ $slot }}
        </main>
    </div>
</div>

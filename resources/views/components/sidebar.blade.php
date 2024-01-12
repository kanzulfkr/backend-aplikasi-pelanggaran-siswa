<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Aplikasi Pelanggaran Siswa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">APS</a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="/">General Dashboard</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('user.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Guru</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('siswa.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Siswa</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('violations.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Data Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('validation.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Validasi Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('violations-types.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Jenis Pelanggaran</span></a>
            </li>

    </aside>
</div>
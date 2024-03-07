<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Aplikasi Pelanggaran Siswa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">APS</a>
        </div>
        <ul class="sidebar-menu" {{ $role = auth()->user()->roles }}>
            <li class="nav-item dropdown ">
                <a href="/" class=" nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>User</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('students.index') }}">Siswa</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('teachers.index') }}">Guru</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('parents.index') }}">Wali Murid</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('violations.index') }}" class=" nav-link"><i class="fas fa-file"></i><span>Data Pelanggaran</span></a>
            </li>
            @if ($role == '4'|| $role == '5')
            @else
            <li class="nav-item dropdown">
                <a href="{{ route('validation.index') }}" class="nav-link">
                    <i class="fas fa-file"></i>
                    <span>Validasi Pelanggaran</span>
                    @if(violationsUnvalidated() != null)
                    <sup class="blink" style="color: orange;">{{ violationsUnvalidated() }}</sup>
                    @endif
                </a>
            </li>
            @endif
            <li class="nav-item dropdown ">
                <a href="{{ route('violations-types.index') }}" class=" nav-link"><i class="fas fa-file"></i><span>Jenis Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Kelas</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('class-names.index') }}" class=" nav-link">Daftar Kelas</a>
                    </li>
                    <li>
                        <a href="{{ route('student-classes.index') }}" class=" nav-link">Kelas</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('recapitulation.index') }}" class=" nav-link"><i class="fas fa-print  "></i><span>Rekap</span></a>
            </li>
    </aside>
</div>
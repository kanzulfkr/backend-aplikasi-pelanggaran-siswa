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
            <!-- <li class="nav-item dropdown ">
                <a href="{{ route('teachers.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Guru</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('parents.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Wali Murid</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('students.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Siswa</span></a>
            </li> -->
            <li class="nav-item dropdown ">
                <a href="{{ route('violations.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Data Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('validation.index') }}" class=" nav-link "><i class="fas fa-fire"></i><span class="beep">Validasi Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('violations-types.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Jenis Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('class-names.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Kelas</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('student-classes.index') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Student Class</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('recapitulation') }}" class=" nav-link"><i class="fas fa-fire"></i><span>Rekap</span></a>
            </li>
    </aside>
</div>
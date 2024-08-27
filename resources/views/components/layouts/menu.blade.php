<ul class="metismenu list-unstyled" id="side-menu">

    <li class="menu-title">{{ Auth::user()->roles->name }}</li>

    {{-- Administrator --}}

    @if ($isAdmin)

        <li>
            <a href="{{ route('dashboard.index') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-group-line"></i>
                <span>Operator Sekolah</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('operator.data') }}">Semua Data</a></li>
                <li><a href="{{ route('operator.create') }}">Buat Baru</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('sekolah.data') }}" class="waves-effect">
                <i class="ri-building-2-line"></i>
                <span>Data Sekolah</span>
            </a>
        </li>

        <li>
            <a href="{{ route('laporan.admin.data') }}" class="waves-effect">
                <i class="ri-file-copy-2-line"></i>
                <span>Laporan Sekolah</span>
            </a>
        </li>

    @else

        <li>
            <a href="{{ route('dashboard.index') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('sekolah.edit', Auth::user()->sekolah->id) }}" class="waves-effect">
                <i class="ri-building-2-line"></i>
                <span>Sekolah Saya</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-file-copy-2-line"></i>
                <span>Laporan Sekolah</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('laporan.operator.data') }}">Semua Data</a></li>
                <li><a href="{{ route('laporan.create') }}">Buat Baru</a></li>
            </ul>
        </li>


    @endif

</ul>

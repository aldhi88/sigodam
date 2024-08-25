<ul class="metismenu list-unstyled" id="side-menu">

    <li class="menu-title">{{ Auth::user()->roles->name }}</li>

    {{-- <li>
        <a href="{{ route('tagihan.file') }}" target="_blank" class="waves-effect">
            <i class="ri-dashboard-line"></i>
            <span>File BA</span>
        </a>
    </li> --}}

    {{-- Administrator --}}
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
            <li><a href="#">Semua Data</a></li>
            <li><a href="#">Buat Baru</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-building-2-line"></i>
            <span>Data Sekolah</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="#">Semua Data</a></li>
            <li><a href="#">Buat Baru</a></li>
        </ul>
    </li>

    <li>
        <a href="#" class="waves-effect">
            <i class="ri-file-copy-2-line"></i>
            <span>Laporan Sekolah</span>
        </a>
    </li>





</ul>

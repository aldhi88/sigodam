<div>
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/sigodam.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/sigodam.png')}}" alt="" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm-light.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/sigodam-light.png')}}" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>


        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{ $photo }}"
                        alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ml-1">{{ $user['nickname']  }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('auth.accountSetting') }}"><i class="dripicons-gear align-middle mr-1"></i> Pengaturan Akun</a>
                    {{-- <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle mr-1"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right mt-1">11</span><i class="ri-settings-2-line align-middle mr-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i> Lock screen</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('auth.logout')}}"><i class="dripicons-exit align-middle mr-1 text-danger"></i> Keluar</a>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div> --}}

        </div>
    </div>
</div>

<div>
    {{-- <hr> --}}
    {{-- <h6>Jumlah Sekolah</h6> --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body pb-3">
                    <div class="media">
                        <div class="media-body overflow-hidden">
                            <p class="text-truncate font-size-14 mb-2">Jumlah TK</p>
                            <h4 class="mb-0">{{$dt['sekolah']['jlh_tk']}}</h4>
                        </div>
                        <div class="text-primary">
                            <img src="{{ asset('assets/images/tk.png') }}" style="height: 80px" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>


                <div class="card-body border-top py-3">
                    <div class="text-truncate">
                        <span class="badge badge-soft-success font-size-14"> {{$dt['sekolah']['tk_melapor']}} sekolah </span>
                        <span class="text-muted ml-2">
                            <a href="{{route('laporan.data.admin.pengajuan')}}" class="text-dark go">sudah melapor bulan ini >></a>
                        </span>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body pb-3">
                    <div class="media">
                        <div class="media-body overflow-hidden">
                            <p class="text-truncate font-size-14 mb-2">Jumlah SD</p>
                            <h4 class="mb-0">{{$dt['sekolah']['jlh_sd']}}</h4>
                        </div>
                        <div class="text-primary">
                            <img src="{{ asset('assets/images/sd.png') }}" style="height: 80px" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>


                <div class="card-body border-top py-3">
                    <div class="text-truncate">
                        <span class="badge badge-soft-success font-size-14"> {{$dt['sekolah']['sd_melapor']}} sekolah </span>
                        <span class="text-muted ml-2">
                            <a href="{{route('laporan.data.admin.pengajuan')}}" class="text-dark go">sudah melapor bulan ini >></a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body pb-3">
                    <div class="media">
                        <div class="media-body overflow-hidden">
                            <p class="text-truncate font-size-14 mb-2">Jumlah SLTP</p>
                            <h4 class="mb-0">{{$dt['sekolah']['jlh_sltp']}}</h4>
                        </div>
                        <div class="text-primary">
                            <img src="{{ asset('assets/images/sltp.png') }}" style="height: 80px" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>


                <div class="card-body border-top py-3">
                    <div class="text-truncate">
                        <span class="badge badge-soft-success font-size-14"> {{$dt['sekolah']['sltp_melapor']}} sekolah </span>
                        <span class="text-muted ml-2">
                            <a href="{{route('laporan.data.admin.pengajuan')}}" class="text-dark go">sudah melapor bulan ini >></a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Laporan Sekolah <span class="badge badge-soft-success font-size-14"> Disetujui </span> {{$dt['blnNow']}} {{date('Y')}}</h4>
                    <div class="text-center">
                        <div class="row">

                            <div class="col-md-4">
                                <div>
                                    <div class="mb-3">
                                        <div id="radialchart-1" class="apex-charts"></div>
                                    </div>

                                    <p class="text-muted text-truncate mb-2">Tingkat TK</p>
                                    <h5 class="mb-0">{{$dt['sekolah']['tk_setujui']}} sekolah</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div class="mb-3">
                                        <div id="radialchart-2" class="apex-charts"></div>
                                    </div>

                                    <p class="text-muted text-truncate mb-2">Tingkat SD</p>
                                    <h5 class="mb-0">{{$dt['sekolah']['sd_setujui']}} sekolah</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div class="mb-3">
                                        <div id="radialchart-3" class="apex-charts"></div>
                                    </div>

                                    <p class="text-muted text-truncate mb-2">Tingkat SLTP</p>
                                    <h5 class="mb-0">{{$dt['sekolah']['sltp_setujui']}} sekolah</h5>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('mods.dashboard.atc.home_atc')
</div>

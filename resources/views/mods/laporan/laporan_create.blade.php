<div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-md-end">
                        <div class="col col-md-4">
                            <div class="form-group">
                                <label>Tanggal Laporan</label>
                                <input type="date" wire:model="form.tgl_laporan" class="form-control @error('form.tgl_laporan') is-invalid @enderror">
                                @error('form.tgl_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#a">
                                        <span class="d-block d-sm-none">A</span>
                                        <span class="d-none d-sm-block">A. Murid</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#b">
                                        <span class="d-block d-sm-none">B</span>
                                        <span class="d-none d-sm-block">B. Agama</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#d">
                                        <span class="d-block d-sm-none">C</span>
                                        <span class="d-none d-sm-block">C. Absen</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#e">
                                        <span class="d-block d-sm-none">D</span>
                                        <span class="d-none d-sm-block">D. Waktu</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#c">
                                        <span class="d-block d-sm-none">E</span>
                                        <span class="d-none d-sm-block">E. Usia</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#f">
                                        <span class="d-block d-sm-none">F</span>
                                        <span class="d-none d-sm-block">F. Inventaris</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#g">
                                        <span class="d-block d-sm-none">G</span>
                                        <span class="d-none d-sm-block">G. Dana</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#h">
                                        <span class="d-block d-sm-none">H</span>
                                        <span class="d-none d-sm-block">H. Guru/Pegawai</span>
                                    </a>
                                </li>
                            </ul>

                            <form wire:submit="submit">

                            <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    <div class="tab-pane active" id="a">
                                        @livewire('laporan.laporan-create-murid', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="b">
                                        @livewire('laporan.laporan-create-agama', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="c">
                                        @livewire('laporan.laporan-create-usia', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="d">
                                        @livewire('laporan.laporan-create-absen', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="e">
                                        @livewire('laporan.laporan-create-waktu', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="f">
                                        @livewire('laporan.laporan-create-inventaris', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="g">
                                        @livewire('laporan.laporan-create-dana', ['dt' => $dt])
                                    </div>
                                    <div class="tab-pane fade" id="h">
                                        @livewire('laporan.laporan-create-guru', ['dt' => $dt])
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-primary">Selesai & Simpan Data</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('mods.laporan.atc.laporan_create_atc')
</div>



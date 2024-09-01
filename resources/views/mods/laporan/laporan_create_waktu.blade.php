<div>
    <hr>
    <div class="row mt-2">
        <div class="col">
            <div class="alert alert-secondary mb-0 text-center" role="alert">
                <h5>Kelas Pagi</h5>
                <h5 class="lead">08:00 - 13:00</h5>
                <div class="custom-control custom-checkbox" style="zoom: 120%">
                    <input type="checkbox" wire:model.live="form.data_waktu.data.pagi" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Ya</label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-secondary mb-0 text-center" role="alert">
                <h5>Kelas Sore</h5>
                <h5 class="lead">13:00 - 18:00</h5>
                <div class="custom-control custom-checkbox" style="zoom: 120%">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">Ya</label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-secondary mb-0 text-center" role="alert">
                <h5>Kelas Pagi & Sore</h5>
                <h5 class="lead">08:00 - 18:00</h5>
                <div class="custom-control custom-checkbox" style="zoom: 120%">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">Ya</label>
                </div>
            </div>
        </div>
        {{-- <div class="col">
            <div class="alert alert-info mb-0 text-center" role="alert">
                <h5>Jumlah Hari Absen</h5>
                <span style="font-size: 18px">{{ $form['data_absen']['total'] }} hari</span>
            </div>
        </div> --}}
    </div>
    <hr>
    {{-- <div class="row">
        <div class="col">
            <div class="form-group text-center">
                <label>Sakit</label>
                <input type="text" wire:model.live="form.data_absen.data.sakit" class="form-control text-center only-number @error('form.data_absen.data.sakit') is-invalid @enderror">
                @error('form.data_absen.data.sakit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group text-center">
                <label>Izin</label>
                <input type="text" wire:model.live="form.data_absen.data.izin" class="form-control text-center only-number @error('form.data_absen.data.izin') is-invalid @enderror">
                @error('form.data_absen.data.izin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group text-center">
                <label>Alpa</label>
                <input type="text" wire:model.live="form.data_absen.data.alpa" class="form-control text-center only-number @error('form.data_absen.data.alpa') is-invalid @enderror">
                @error('form.data_absen.data.alpa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div> --}}
</div>

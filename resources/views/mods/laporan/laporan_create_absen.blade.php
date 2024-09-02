<div>
    <div class="row mt-2">
        <div class="col">
            <div class="alert alert-info mb-0 text-center" role="alert">
                <h5>Jumlah <br> Hari Sekolah</h5>
                <span style="font-size: 18px">{{ $dt['hari'] }} hari</span>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-info mb-0 text-center" role="alert">
                <h5>Persentase <br> Sakit</h5>
                <span style="font-size: 18px">{{ number_format($form['data_absen']['data']['sakit']/$dt['hari']*100,2,',',',' )}} %</span>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-info mb-0 text-center" role="alert">
                <h5>Persentasi <br> Izin</h5>
                <span style="font-size: 18px">{{ number_format($form['data_absen']['data']['izin']/$dt['hari']*100,2,',',',' ) }} %</span>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-info mb-0 text-center" role="alert">
                <h5>Persentasi <br> Alpa</h5>
                <span style="font-size: 18px">{{ number_format($form['data_absen']['data']['alpa']/$dt['hari']*100,2,',',',' ) }} %</span>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-info mb-0 text-center" role="alert">
                <h5>Jumlah <br> Hari Absen</h5>
                <span style="font-size: 18px">{{ $form['data_absen']['total'] }} hari</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
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
    </div>
</div>

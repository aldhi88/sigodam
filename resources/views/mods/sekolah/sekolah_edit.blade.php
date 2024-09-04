<div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">


                    <form wire:submit="submit">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input autofocus type="text" wire:model="form.nama_sekolah" class="form-control @error('form.nama_sekolah') is-invalid @enderror">
                                    @error('form.nama_sekolah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Jenis Sekolah</label>
                                    <select wire:model="form.jenis_sekolah" class="form-control @error('form.jenis_sekolah') is-invalid @enderror">
                                        @foreach ($select['jenis'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.jenis_sekolah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>No. Agenda</label>
                                    <input type="text" wire:model="form.no_agenda" class="form-control @error('form.no_agenda') is-invalid @enderror">
                                    @error('form.no_agenda')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Status Sekolah</label>
                                    <select wire:model="form.status_sekolah" class="form-control @error('form.status_sekolah') is-invalid @enderror">
                                        <option value="">= Pilih =</option>
                                        @foreach ($select['status'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.status_sekolah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Nama Jalan</label>
                                    <input type="text" wire:model="form.jalan" class="form-control @error('form.jalan') is-invalid @enderror">
                                    @error('form.jalan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <input type="text" wire:model="form.nama_desa" class="form-control @error('form.nama_desa') is-invalid @enderror">
                                    @error('form.nama_desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Status Desa</label>
                                    <select wire:model="form.status_desa" class="form-control @error('form.status_desa') is-invalid @enderror">
                                        <option value="">= Pilih =</option>
                                        @foreach ($select['desa'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.status_desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Tahun Pendirian</label>
                                    <input type="number" wire:model="form.tahun_pendirian" class="form-control @error('form.tahun_pendirian') is-invalid @enderror">
                                    @error('form.tahun_pendirian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Kategori Gugus</label>
                                    <select wire:model="form.kategori_gugus" class="form-control @error('form.kategori_gugus') is-invalid @enderror">
                                        <option value="">= Pilih =</option>
                                        @foreach ($select['gugus'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.kategori_gugus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Jarak ke Kantor Camat (km)</label>
                                    <input type="number" step="0.01" wire:model="form.jarak_ke_camat" class="form-control @error('form.jarak_ke_camat') is-invalid @enderror">
                                    @error('form.jarak_ke_camat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Status Bangunan</label>
                                    <select wire:model="form.status_bangunan" class="form-control @error('form.status_bangunan') is-invalid @enderror">
                                        <option value="">= Pilih =</option>
                                        @foreach ($select['bangun'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.status_bangunan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select wire:model="form.kecamatan" class="form-control @error('form.kecamatan') is-invalid @enderror">
                                        <option value="">= Pilih =</option>
                                        @foreach ($select['kecamatan'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>KANIN/KANDEP DIKBUD KEC</label>
                                    <select wire:model="form.kanin" class="form-control @error('form.kanin') is-invalid @enderror">
                                        <option value="">= Pilih =</option>
                                        @foreach ($select['kecamatan'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.kanin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Penilik TK/SD/SLTP</label>
                                    <input type="text" wire:model="form.penilik" class="form-control @error('form.penilik') is-invalid @enderror">
                                    @error('form.penilik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group" x-data="{ number: '{{$form['nss']}}' }">
                                    <label>NSS</label>
                                    <input type="text" wire:model="form.nss" class="form-control @error('form.nss') is-invalid @enderror" x-model="number" x-on:input="number = number.replace(/[^0-9.]/g, '')">
                                    @error('form.nss')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group" x-data="{ number: '{{$form['npsn']}}' }">
                                    <label>NPSN</label>
                                    <input type="text" wire:model="form.npsn" class="form-control @error('form.npsn') is-invalid @enderror" x-model="number" x-on:input="number = number.replace(/[^0-9.]/g, '')">
                                    @error('form.npsn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>



                        <br><hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<div>

    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">

                    <form wire:submit="submit">

                        <div class="form-group">
                            <label>Username Login</label>
                            <input autofocus type="text" wire:model="form.username" class="form-control @error('form.username') is-invalid @enderror">
                            @error('form.username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password Login</label>
                            <input type="text" wire:model="form.password" class="form-control @error('form.password') is-invalid @enderror">
                            @error('form.password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Operator</label>
                            <input type="text" wire:model="form.nickname" class="form-control @error('form.nickname') is-invalid @enderror">
                            @error('form.nickname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Sekolah</label>
                            <select wire:model="form.jenis_sekolah" class="form-control @error('form.jenis_sekolah') is-invalid @enderror">
                                <option value="">== Pilih ==</option>
                                @foreach ($jenisSekolah as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>

                            @error('form.jenis_sekolah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" wire:model="form.nama_sekolah" class="form-control @error('form.nama_sekolah') is-invalid @enderror">
                            @error('form.nama_sekolah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <br><hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-light" wire:click="resetForm">Reset Form</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

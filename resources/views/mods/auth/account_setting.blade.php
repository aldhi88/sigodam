<div>

    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">

                    <form wire:submit="submit">

                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input autofocus type="text" wire:model="form.nickname" class="form-control @error('form.nickname') is-invalid @enderror">
                            @error('form.nickname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <h6 class="bg-soft-warning p-1 text-center">UBAH PASSWORD LOGIN</h6>
                        <div class="form-group">
                            <label>Password Lama</label>

                            <input type="text" wire:model="form.old_pass" class="form-control @error('form.old_pass') is-invalid @enderror">
                            @error('form.old_pass')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="text" wire:model="form.password" class="form-control @error('form.password') is-invalid @enderror">
                            @error('form.password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <br><hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

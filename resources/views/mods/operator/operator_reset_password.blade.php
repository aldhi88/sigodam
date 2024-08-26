<div>

    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">

                    <form wire:submit="submit">

                        <div class="form-group">
                            <label>Username Login</label>
                            <input readonly type="text" value="{{$form['username']}}" class="form-control bg-light">
                        </div>

                        <div class="form-group">
                            <label>Reset Password Login</label>
                            <input autofocus placeholder="Password baru" type="password" wire:model="form.password" class="form-control @error('form.password') is-invalid @enderror">
                            @error('form.password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <br><hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                                <button type="button" class="btn btn-danger d-none modal-hide"
                                    data-emit="modalconfirm-prepare"
                                    data-toggle="modal"
                                    data-target="#modalConfirm"
                                    data-json="{{$dtJson}}">Simpan Perubahan</button>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('operator.data') }}" class="btn btn-light" wire:click="resetForm">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    @include('mods.operator.atc.operator_reset_password_atc')

</div>
